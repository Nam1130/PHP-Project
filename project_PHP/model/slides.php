<?php
  require "database.php";
    class slides extends database
    {
        public $name="";
        public $link="";
        public $status="";
      

        public function inserSlides($name,$link,$status){
            $sql = "INSERT INTO slides(name,link,status) VALUES (?,?,?)";
            if($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("siiissss", $this->name, $this->link, $this->status);
                $this->name = $name;
                $this->link = $link;
                $this->status = $status;
               
                $stmt->execute();
            }
        }

    }
    
?>