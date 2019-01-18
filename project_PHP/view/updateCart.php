<?php  
session_start();
    require "../model/card.php";
    $db = new card;
    $id = $_POST["id"];  
    $quantity = $_POST["quantity"]; 
    if(isset( $_SESSION['id_cus'])){
        $id_cus =  $_SESSION['id_cus'];
    } 

    $selectOder ='SELECT order_id from prod_orders,orders where order_id = id and prod_id=$id  and cus_id = $cus_id';

    $sql = "UPDATE prod_orders set quantity = $quantity where order_id=$selectOder and prod_id=$id" ;
   
    if($db->excute($sql))  
    {  
        echo 'Data Updated';  
    }  

?>