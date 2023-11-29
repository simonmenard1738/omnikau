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

        function update($data, $id){
            global $conn;
            $sql = "UPDATE user SET email =$this->email,school_name=$this->school_name,program_name=$this->program_name
            WHERE email = $id";

            $conn->query($sql);

            //var_dump($conn->error);
        }

        function updatePassword($data){
            global $conn;
            $sql = "UPDATE user SET password = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bind_param("ss", $data['password'], $this->email);
            $stmt->execute();

            if ($stmt->errno) {
                //var_dump($stmt->error);
            }
            $stmt->close();
        }

        function delete(){
            global $conn;
            $sql = "DELETE FROM user WHERE email = $this->email";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $this->email);

            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                //var_dump($conn->error);
                $stmt->close();
                return false;
            }
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
            $sql = "SELECT stars FROM ratings WHERE posting_id = (
                SELECT posting_id FROM posting WHERE seller_email = $this->seller_email
            )";
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