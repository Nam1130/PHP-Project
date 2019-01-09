<?php   
  require "database.php";
 class Users  extends database{  
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
        // $pass = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->con->prepare("INSERT INTO `customer` (cus_name, user_name,password,address,email,sdt) VALUES(?, ?, ?, ?, ?, ?)") or die($this->con->error);
        $stmt->bind_param("ssssss", $cus_name, $user_name, $password, $address, $email, $sdt);
        if($stmt->execute())
        {
          $stmt->close();
          $this->con->close();
          return true;
        }
      }


         public function can_login($table_name, $where_condition)  
      {  
           $condition = '';  
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . " = '".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           
           echo "$condition"; 
           $query = "SELECT * FROM ".$table_name." WHERE " . $condition;  
           $result = mysqli_query($this->con, $query); 

           if(mysqli_num_rows($result))  
           {  
                return true;  
           }  
           else  
           {  
                $this->error = "Wrong Data";  
           }  
      }   

   }  
?>  


     
