<?php
    include_once 'sqlconnection.php';

    class Contact{
        public String $contact_type = "";
        public String $email = "";
        public String $contact_info = "";
        
        function __construct($contact_type = "-1", $email = "-1"){
            if($contact_type != "-1" || $email != "-1"){
                global $conn;
                $sql = "SELECT * FROM contact WHERE contact_type = $contact_type AND email = $email";
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();

                $this->contact_type = $contact_type;
                $this->email = $email;
                $this->contact_info = $row['contact_info'];
            }
        }
    }
?>