<?php  
session_start();
require "../model/card.php";
$db = new card;
$arr =array();
$totalPrice=0;
 if(isset( $_SESSION['id_cus'])){
    $id_cus =  $_SESSION['id_cus'];
    $sql = "SELECT prod_orders.quantity,product.price  from product,orders,prod_orders
    where product.id = prod_orders.prod_id and prod_orders.order_id = orders.id 
     and prod_orders.status = 1 and cus_id =".$id_cus;
    $arr = $db->view($sql);
    foreach ($arr as $key => $value) {
       $totalPrice += $value['quantity'] * $value['price']; 
    }
    $_SESSION['tongtien'] = $totalPrice;
    echo  number_format ($totalPrice).' VND';

 }

 ?>