<?php
  require "database.php";
    class card  extends database
    {
        public $prod_id="";
        public $order_id="";
        public $quantity=0;
        public $date="";
        public $cus_id="";
        public $status="";

        public function prod_orders($prod_id,$order_id,$quantity,$status){
            $sql = "INSERT INTO prod_orders(prod_id,order_id,quantity,status) VALUES (?,?,?,?)";

            if($stmt = $this->conn->prepare($sql)){
               
                $stmt->bind_param("iiii", $this->prod_id, $this->order_id, $this->quantity, $this->status);
                
                
                $this->prod_id = $prod_id;
                $this->order_id = $order_id;
                $this->quantity = $quantity;
                $this->status = $status;
                
                $stmt->execute();
            }
        }



        public function orders($cus_id,$date,$status){
            $sql = "INSERT INTO orders(cus_id,date,status) VALUES (?,?,?)";

            if($stmt = $this->conn->prepare($sql)){
               
                $stmt->bind_param("iss", $this->cus_id, $this->date, $this->status);
                
                
                $this->cus_id = $cus_id;
                $this->date = $date;
                $this->status = $status;
                
                $stmt->execute();
            }
        }

    }
    
?>