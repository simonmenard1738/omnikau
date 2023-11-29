<?php
    include_once 'sqlconnection.php';

    class Transaction{
        public int $transaction_id = -1;
        public String $buyer_email = "-1";
        public int $posting_id = -1;
        public int $rated = -1;
        public String $title = "-1";
        
        function __construct($buyer_email,$posting_id,$rated,$upload = false){
            global $conn;
            $this->buyer_email = $buyer_email;
            $this->posting_id = $posting_id;
            $this->rated = $rated;

            if($upload){
                $this->upload();
            }
        }

        function upload(){
            global $conn;
            $sql = "INSERT INTO transactions (buyer_email, posting_id, rated) VALUES ('$this->buyer_email',$this->posting_id,$this->rated)";
            $conn->query($sql);
        }

        static function getUserTransactions($email, $unread = true){
            global $conn;
            $sql = $unread ? "SELECT * FROM transactions WHERE buyer_email = '$email' AND rated = 0" : "SELECT * FROM transactions WHERE buyer_email = '$email' AND rated = 0";
            $res = $conn->query($sql);
            $list = array();
            while($row = $res->fetch_assoc()){
                $transaction = new Transaction($row['buyer_email'], $row['posting_id'], $row['rated']);
                $transaction->posting_id = $row['posting_id'];
                $sql = "SELECT title FROM postings WHERE posting_id = $transaction->posting_id";
                $subres = $conn->query($sql);
                $posting = $subres->fetch_assoc();
                $transaction->title = $posting['title'];
                array_push($list, $transaction);
            }
            return $list;
        }

        static function setRated($id){
            global $conn;
            $sql = $unread ? "UPDATE transactions SET rated = 1 WHERE transaction_id = $id";
            $conn->query($sql);
        }

        
    }
?>