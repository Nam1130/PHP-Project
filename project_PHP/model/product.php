<?php
  require "database.php";
    class product extends database
    {
        public $nameSp="";
        public $status="";
        public $note="";
        public $price=0;
        public $quantity=0;
        public $date="";
        public $id_cate="";
        public $image="";

        public function inserProduct($prod_name,$category_id,$price,$quantity,$status,$imported_date,$note,$image){
            $sql = "INSERT INTO product(prod_name,category_id,price,quantity,status,imported_date,note,image) VALUES (?,?,?,?,?,?,?,?)";

            if($stmt = $this->conn->prepare($sql)){
               
                $stmt->bind_param("siiissss", $this->nameSp, $this->id_cate, $this->price, $this->quantity, $this->status,
                    $this->date, $this->note,$this->image);
                
                
                $this->nameSp = $prod_name;
                $this->id_cate = $category_id;
                $this->price = $price;
                $this->quantity = $quantity;
                $this->status = $status;
                $this->date =$imported_date; 
                $this->note = $note;
                $this->image = $image;
                $stmt->execute();
            }
        }

    }
    
?>