<?php   
  require "database.php";
 class users  extends database{  
      public $error;  
      public function required_validation($field)  
      {  
           $count = 0;  
           foreach($field as $key => $value)  
           {  
                if(empty($value))  
                {  
                     $count++;  
                     $this->error .= "<p>" . $key . " is required</p>";  
                }  
           }  
           if($count == 0)  
           {  
                return true;     
           }  
      }    
    
      public function register($cus_name, $user_name, $password, $address, $email, $sdt)
      {
         $password = MD5($password);
         $arr = array();
         $sql = 'select email from customer';
         $arr = $this->view($sql);
        // print_r($arr);
         foreach ($arr as $key => $value) {
          //echo  $value['email'];
             if($value['email'] != $email){
               $stmt = $this->conn->prepare("INSERT INTO `customer` (cus_name, user_name,password,address,email,sdt) VALUES(?, ?, ?, ?, ?, ?)") or die($this->conn->error);
               $stmt->bind_param("ssssss", $cus_name, $user_name, $password, $address, $email, $sdt);
               if($stmt->execute())
               {
                 $stmt->close();
                 $this->conn->close();
                 return true;
               }
                 
             }else{
              // echo  $value['email'];
               $this->error = " Email này đã tồn tại";
             }
         }

       
      }


      public function can_login($table_name, $where_condition)  
      {  
           $condition = '';  $kq;
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . " = '".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           
           //echo "$condition";
           $query = "SELECT * FROM ".$table_name." WHERE " . $condition;  
           $result = mysqli_query($this->conn, $query);
           

           if(mysqli_num_rows($result))  
           {  foreach ($result as $key => $value) {

               $_SESSION['id_cus'] =  $value['id'];
               $_SESSION['cus_name'] =  $value['cus_name'];
               
           }
                $kq =  1;  
                
           }  
           else  
           {  
                $kq = 0;
                $this->error = "Wrong Data";  
                
           }
           return $kq;
      }

   }
?>  


     
