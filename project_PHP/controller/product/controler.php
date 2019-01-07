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
        case 'update':
            header('Location: ../../view/edit_product.php?idProduct=5');
            break;
        
        default:
            # code...
            break;
    }


?>
 