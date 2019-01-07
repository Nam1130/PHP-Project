<?php
error_reporting(1);
//     require "../model/database.php";
//     $conn = new database();
//     $arr = array();
  
//    $table = "product";
   
//    $arr= $conn->display($table);
    
    //print_r($arr);

    if (isset($_GET['action'])){
        $acc = $_GET['action'];
       
    }else{
        echo "No";
    }
       
    switch ($acc) {
        case 'display':
            header('Location: ../../view/product.php');
            break;
        
        default:
            # code...
            break;
    }


?>
 