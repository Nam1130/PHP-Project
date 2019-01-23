<?php  
session_start();
require "../model/card.php";
$db = new card;
$id = $_POST['id'];  
$quantity = $_POST['quantity'];
if(isset($_SESSION['id_cus'])){
    $cus_id =  $_SESSION['id_cus'];
} 

    $selectOder ='SELECT order_id from prod_orders,orders where order_id = id and prod_id='.$id.' and cus_id ='.$cus_id;
    $order = $db->view($selectOder);
    foreach ($order as $key => $value) {
       $id_order = $value['order_id'];
    }
    

    $sql = "UPDATE prod_orders set quantity = $quantity where order_id= $id_order and prod_id=$id" ;
   
    if($db->excute($sql))  
    {  
        echo 'Data Updated';  
    }  

?>