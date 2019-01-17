<?php  
 session_start();
 require "../model/card.php";
 $db = new card;
 $output = '';  
 $arr =array();
 if(isset( $_SESSION['id_cus'])){
    $id_cus =  $_SESSION['id_cus'];

    $sql = 'select product.id, product.prod_name,product.price,prod_orders.quantity from
    product,prod_orders,orders where product.id = prod_orders.prod_id 
   and prod_orders.status = 1 and prod_orders.order_id = orders.id and orders.cus_id ='. $id_cus;
   $arr = $db->view($sql);
  

 }
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tùy chỉnh</th>
                </tr>';  
    $count =0; 
    foreach ($arr as $key=> $value) { 
        $count++;
        $a = $count - 1;
           $output .= '  
                <tr>  
                     <td id ="id" class="id" data-id1="'.$value["id"].'">'.$value['id'].'</td>  
                     <td >'.$value["prod_name"].'</td>  
                     <td class="price" data-id2="'.$value["id"].'">'.number_format($value["price"]).'</td>  
                     <td 
                         <div style="width: 50%; " class="input-group"> <span class="input-group-btn">
                                <button id="minus" type="button" onclick="minus('.$a.')" class="btn btn-default btn-number"
                                    data-type="minus" data-field="quant[1]">
                                    <span class="glyphicon glyphicon-minus"></span> </button>

                            </span> <input name="quant[3]" id = "quantity"  data-id5="'.$value["quantity"].'" class="form-control input-number" value= "'.$value["quantity"].'"
                                type="number" id="sl" > <span class="input-group-btn">


                                <button id="plus" type="button" onclick="plus('.$a.')" class="btn btn-default btn-number"
                                    data-type="plus" data-field="quant[3]"> <span class="glyphicon glyphicon-plus"></span>
                                </button> </span>
                        </div>
                     
                     </td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$value["id"].'" class="btn btn-xs btn-danger btn_delete">x</button> |
                      <button type="button" name="upload_btn" data-id4="'.$value["id"].'" class="btn btn-xs btn-danger btn_upload"><span class="glyphicon glyphicon-refresh"></span></button></td>  
                      
                </tr>  ';  
    }  

 $output .= '</table>  </div>';  
 echo $output;  


 ?>