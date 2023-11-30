<?php
    include_once 'sqlconnection.php';
    include_once 'Models/Contact.php';
    class User{
        public String $email = "";
        public String $username = "";
        public String $password = "";
        public String $school_name = "";
        public String $program_name = "";
        public int $avg_rating = 0;
        public bool $active = true;
        public bool $admin = false;
        public String $perms = "";

        function __construct($email = "-1") {
            global $conn;

            if ($email != '-1') {
                $sql = "SELECT * FROM user WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                $this->email = $email;
                $this->username = $row['username'];
                $this->password = $row['password'];
                $this->school_name = $row['school_name'];
                $this->program_name = $row['program_name'];
                $this->avg_rating = $row['avg_rating'];
                $this->active = $row['active'];
                $stmt->close();
            }
        }

        function update(){
            global $conn;
            $sql = "UPDATE user SET username='$this->username',school_name='$this->school_name',program_name='$this->program_name'
            WHERE email = '$this->email'";

            $res = $conn->query($sql);
            if($res){
                $_SESSION['user'] = $this;
            }else{
                $_SESSION['alert'] = "Update failed.";
            }
            //var_dump($conn->error);
        }

        function updatePassword(){
            global $conn;
            $sql = "UPDATE user SET password = '$this->password' WHERE email = '$this->email'";
            $res = $conn->query($sql);
            if($res){
                $_SESSION['user'] = $this;
            }else{
                $_SESSION['alert'] = "Update failed.";
            }
        }

        function delete(){
            global $conn;
            $sql = "UPDATE user SET active = 0 WHERE email = '$this->email'";
            $conn->query($sql);
        }

        function upload(){
            global $conn;
            $sql = "INSERT INTO user (email, username, password, school_name, program_name) 
            VALUES (\"$this->email\", \"$this->username\", \"$this->password\", 
            \"$this->school_name\", \"$this->program_name\");";
            try{
                $result = $conn->query($sql);
                $_SESSION['user'] = $this;
            }catch(mysqli_sql_exception $e){
                $_SESSION['alert'] = $e->getMessage();
            }
            
            
            //do error handling
        }

        function setPermissions(){
            global $conn;
            $sql = "SELECT * FROM users_groups WHERE email = \"$this->email\"";
            //var_dump($sql);
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
                $this->perms = $this->perms . ";" . $row['permission_id'];
            }
        }

        function getContactInfo(){
            global $conn;
            $list = array();
            $sql = "SELECT * FROM contact WHERE email = '$this->email'";
            $res = $conn->query($sql);
            
            while($row = $res->fetch_assoc()){
                $contact = new Contact();
                $contact->contact_type = $row['contact_type'];
                $contact->email = $row['email'];
                $contact->contact_info = $row['contact_info'];
    
                array_push($list, $contact);
            }
    
            return $list;
        } 

        function getPostings(){
            global $conn;
            include_once "Models/Posting.php";
            $list = array();
            $sql = "SELECT * FROM postings WHERE seller_email = '".$this->email."'";
            $res = $conn->query($sql);

            while($row = $res->fetch_assoc()){
                $posting = new Posting();
                $posting->posting_id = $row['posting_id'];
                $posting->title = $row['title'];
                $posting->description = $row['description'];
                $posting->price = $row['price'];
                $posting->seller_email = $row['seller_email'];
                $posting->date_posted = $row['date_posted'];
                $posting->visits = $row['visits'];
                $posting->is_sold = $row['is_sold'];
                $posting->post_type = $row['post_type'];

                array_push($list, $posting);
            }

            return $list;
        }

        function getAvgRating(){
            global $conn;
            $stars = 0;
            $total = 0;
            $sql = "SELECT stars FROM ratings WHERE transaction_id IN (
                SELECT transaction_id FROM transactions WHERE posting_id IN (SELECT posting_id FROM postings WHERE seller_email = '$this->email')
            )";
            $res = $conn->query($sql);
            if($res->num_rows!=0){
                while($row = $res->fetch_assoc()){
                    $total = $total+1;
                    $stars = $stars + $row['stars'];
                }
                return $stars/$total;
            }else{
                return false;
            }
            
        }

        function hasUnrated(){
            global $conn;
            $sql = "SELECT * FROM transactions WHERE rated = 0 AND buyer_email = '$this->email'";
            $res = $conn->query($sql);
            
            return $res->num_rows>0 ? true : false;
        }

        function getTransactions($unread = true){
            include_once 'Models/Transaction.php';
            return Transaction::getUserTransactions($this->email, $unread);
        }
    
    }
?>