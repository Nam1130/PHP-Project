<?php
error_reporting(1);
    require "../model/database.php";
    $conn = new database();
    $arr = array();
  
   $table = "product";
   
   $arr= $conn->display($table);
    
    print_r($arr);
       



?>
 