<?php
    include_once 'sqlconnection.php';
    class User{
        public String $email = "";
        public String $username = "";
        public String $school_name = "";
        public String $program_name = "";
        public int $avg_rating = 0;
        public bool $active = true;

        function __construct($email = "-1"){
            if($email!='-1'){
                global $conn;
                //echo $email;
                $sql = "SELECT * FROM user WHERE email=$email";
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();

                $this->email = $email;
                $this->username = $row['username'];
                $this->password = $row['password'];
                $this->school_name = $row['school_name'];
                $this->program_name = $row['program_name'];
                $this->avg_rating = $row['avg_rating'];
                $this->active = $row['active'];
            }
        }

        function update(){
            global $conn;
            $sql = "UPDATE user SET email =$this->email,school_name=$this->school_name,program_name=$this->program_name
            WHERE email = $this->email";

            $conn->query($sql);

            var_dump($conn->error);
        }

        function updatePassword(){
            global $conn;
            $sql = "UPDATE user SET password =$this->password
            WHERE email = $this->email";

            $conn->query($sql);

            var_dump($conn->error);
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
                var_dump($conn->error);
                $stmt->close();
                return false;
            }
        }
    }
?>