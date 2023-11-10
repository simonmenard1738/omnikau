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
                $sql = "SELECT * FROM Users WHERE email=$email";
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
    }
?>