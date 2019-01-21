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
        case 'category':
            header('Location: ../../view/category/view_category.php');
            break;
        default:
            # code...
            break;
    }



?>
 
 <?php
include("database.php");
if(isset($_POST["search-data"])){
 
 $searchVal = trim($_POST["search-data"]);
 $dao = new database();
 echo $dao->searchData($searchVal);
}

?>