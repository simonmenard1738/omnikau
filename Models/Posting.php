<?php
    include_once 'sqlconnection.php';
    class Posting{
        public int $posting_id = -1;
        public String $description = "";
        public int $price = 0;
        public String $seller_email = "";
        public String $date_posted = "";
        public int $visits = 0;
        public int $is_sold = 0;
        public String $post_type = "";

        function __construct($posting_id = -1){
            

            if($posting_id>-1){
                global $conn;
                $sql = "SELECT * FROM Postings WHERE id=$posting_id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $this->posting_id = $row['posting_id'];
                $this->description = $row['description'];
                $this->price = $row['price'];
                $this->seller_email = $row['seller_email'];
                $this->date_posted = $row['date_posted'];
                $this->visits = $row['visits'];
                $this->is_sold = $row['is_sold'];
                $this->post_type = $row['post_type'];
            }
            
        }

        static function listPostings($whereCondition=-1, $sortCondition=-1){
            global $conn;
            $list = array();
            
            $sql = $whereCondition!=-1 ? "SELECT * FROM Postings WHERE $whereCondition" : "SELECT * FROM Postings";
            if($sortCondition!=-1){
                $sql = $sql . " ORDER BY $sortCondition";
            } 

            var_dump($sql);

            $result = $conn->query($sql);

            while($row = ($result->fetch_assoc())){
                $posting = new Posting();
                $posting->posting_id = $row['posting_id'];
                $posting->description = $row['description'];
                $posting->price = $row['price'];
                $posting->seller_email = $row['seller_email'];
                $posting->date_posted = $row['date_posted'];
                $posting->visits = $row['visits'];
                $posting->is_sold = $row['is_sold'];
                $posting->post_type = $row['post_type'];
                array_push($list,$posting);
            }
            return $list;
        }

        function upload(){
            global $conn;
            $sql = "INSERT INTO Postings (description,price,seller_email,date_posted,visits,is_sold,post_type) 
            VALUES ($this->description, $this->price, $this->seller_email, 
            $this->date_posted, $this->visits, $this->is_sold, $this->post_type)";
            $result = $conn->query($sql);
        }

        function update(){
            global $conn;
            $sql = "UPDATE Postings SET description=$this->description,price=$this->price,seller_email=$this->seller_email,
            date_posted=$this->date_posted,visits=$this->visits,is_sold=$this->is_sold,post_type=$this->post_type 
            WHERE posting_id = $this->posting_id";
        }
    }
?>