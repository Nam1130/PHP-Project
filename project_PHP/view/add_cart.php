<?php  
session_start();
require "../model/card.php";
$db = new card;
$id = $_POST['id'];  
$quantity = $_POST['quantity'];
if(isset($_SESSION['id_cus'])){
    $id_cus =  $_SESSION['id_cus'];
} 

 //oder id
 if(isset($_SESSION['id_oder'])){
    $order_id = $_SESSION['id_oder'];
}  
// kiểm tra sản phẩm trùng giỏ hàng khồng
$sql = 'select prod_orders.prod_id,prod_orders.quantity from
 product,prod_orders,orders where product.id = prod_orders.prod_id 
and prod_orders.status = 1 and prod_orders.order_id = orders.id and orders.cus_id ='. $id_cus;
$arr = $db->view($sql);
$arrId = array();
foreach ($arr as $key => $value) {
    $arrId[] = $value['prod_id'];
}

//lấy số lượng sản phẩm này trong giỏ hàng
$quan;
$sql = 'select prod_orders.quantity from
product,prod_orders,orders where product.id = prod_orders.prod_id 
and prod_orders.status = 1 and prod_orders.order_id = orders.id and orders.cus_id ='. $id_cus.'. and prod_orders.prod_id ='.$id;
$quantityArr = $db->view($sql);
foreach ($quantityArr as $key => $value) {
$quan = $value['quantity'];
}



foreach ($arr as $key => $value) {
   $arrId[] = $value['prod_id'];
}


// thêm vào giỏ hàng
if (!in_array($id, $arrId)) {
    $db->orders($order_id, $id_cus , date('Y-m-d'),1);
    $db->prod_orders($id, $order_id,$quantity,1);
    
    $_SESSION['card']= array(

            'prod_id' => $id,
            'order_id' =>$order_id,
            'sl' => $quantity,
            'id_cus'=> $id_cus 
        );
   
}else{
   $quan = $quan +$quantity;
    $sql = "UPDATE prod_orders SET quantity = '$quan' WHERE prod_id = $id";
    $db->excute($sql);
}


    



   
    // if($db->excute($sql))  
    // {  
    //     echo 'Data Updated';  
    // }  

?>