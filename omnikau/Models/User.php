<?php
    include_once 'sqlconnection.php';
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
                $sql = "SELECT * FROM User WHERE email = ?";
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
            var_dump($sql);
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
            $sql = "SELECT * FROM Users_Groups WHERE email = \"$this->email\"";
            //var_dump($sql);
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
                $this->perms = $this->perms . ";" . $row['permission_id'];
            }
        }
    }
?>