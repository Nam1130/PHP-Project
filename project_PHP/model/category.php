<?php
  require "database.php";
    class category extends database
    {
        public $cat_name="";
        public $note="";
        public function inserCategory($category,$note){
            $sql = "INSERT INTO category(cat_name,note) VALUES (?,?)";

            if($stmt = $this->conn->prepare($sql)){
               
                $stmt->bind_param("ss", $this->cat_name, $this->note);
                $this->cat_name = $category;
                $this->note = $note;
                $stmt->execute();
            }
        }

    }
    
?>