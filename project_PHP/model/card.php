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

        public function prod_orders($prod_id,$order_id,$quantity){
            $sql = "INSERT INTO oders(prod_id,order_id,quantity) VALUES (?,?,?)";

            if($stmt = $this->conn->prepare($sql)){
               
                $stmt->bind_param("iii", $this->prod_id, $this->order_id, $this->quantity);
                
                
                $this->prod_id = $prod_id;
                $this->order_id = $order_id;
                $this->quantity = $quantity;
                
                $stmt->execute();
            }
        }


        public function orders($cus_id,$date,$status){
            $sql = "INSERT INTO oders(cus_id,date,status) VALUES (?,?,?)";

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