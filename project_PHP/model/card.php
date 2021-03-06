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

        public $order_id_bill='';
        public $imported_date_bill = "";
        public $price_bill = "";
        public $address_bill = "";
        public $status_bill = "";

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

        public function orders($id,$cus_id,$date,$status){
            $sql = "INSERT INTO orders(id,cus_id,date,status) VALUES (?,?,?,?)";

            if($stmt = $this->conn->prepare($sql)){
               
                $stmt->bind_param("iiss",$this->order_id_bill, $this->cus_id, $this->date, $this->status);
                
                $this->order_id_bill = $id;
                $this->cus_id = $cus_id;
                $this->date = $date;
                $this->status = $status;
                
                $stmt->execute();
            }
        }

        public function bills($order_id_bill,$imported_date_bill,$price_bill,$address_bill,$status_bill){
            $sql = "INSERT INTO bills(order_id,imported_date,price,address,status) VALUES (?,?,?,?,?)";

            if($stmt = $this->conn->prepare($sql)){
               
                $stmt->bind_param("isisi", $this->order_id_bill, $this->imported_date_bill, $this->price_bill,$this->address_bill,$this->status_bill);
                
                
                $this->order_id_bill = $order_id_bill;
                $this->imported_date_bill = $imported_date_bill;
                $this->price_bill = $price_bill;
                $this->address_bill = $address_bill;
                $this->status_bill = $status_bill;
                
                $stmt->execute();
            }
        }


    }
    
?>