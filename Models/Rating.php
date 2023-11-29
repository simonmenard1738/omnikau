<?php
    include_once 'sqlconnection.php';

    class Rating{
        public int $rating_id = -1;
        public int $transaction_id = -1;
        public int $stars = -1;
        
        function __construct($transaction_id, $stars){
            $this->transaction_id = $transaction_id;
            $this->stars = $stars;
        }

        function upload(){
            global $conn;
            $sql = "INSERT INTO ratings (transaction_id,stars) VALUES ($this->transaction_id,$this->stars)";
            echo $sql;
            $conn->query($sql);
        }
    }
?>