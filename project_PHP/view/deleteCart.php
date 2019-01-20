<?php  
session_start();
    require "../model/card.php";
    $db = new card;
    $id = $_POST["id"];  
    if(isset($_SESSION['id_cus'])){
        $cus_id =  $_SESSION['id_cus'];
    } 

    $selectOder ='SELECT order_id from prod_orders,orders where order_id = orders.id and prod_id= '.$id.'  and cus_id = '.$cus_id.'';
    $oder = $db->view($selectOder);
    foreach ($oder as $key => $value) {
       $order_id = $value['order_id'];
    }
   
    $sql = "DELETE FROM prod_orders  WHERE order_id = $order_id and prod_id=$id";
    
    if($db->excute($sql))  
    {  
        echo 'Data Delete';  
    }  
  
?>