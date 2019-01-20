<?php  
 session_start();
 require "../model/card.php";
 $db = new card;
 $output = '';  
 $arr =array();
 if(isset( $_SESSION['id_cus'])){
    $id_cus =  $_SESSION['id_cus'];

    $sql = 'select product.id,product.image, product.prod_name,product.price,prod_orders.quantity from
    product,prod_orders,orders where product.id = prod_orders.prod_id 
   and prod_orders.status = 1 and prod_orders.order_id = orders.id and orders.cus_id ='. $id_cus;
   $arr = $db->view($sql);
  

 }
 $output .= '  
      <div class="table-responsive">  
           <table class="table">  
                <tr>  
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th style = "width: 45%;" >Số lượng</th>
                    <th>Tùy chỉnh</th>
                </tr>';  
    $count =0; 
    foreach ($arr as $key=> $value) { 
        $count++;
        $a = $count - 1;
           $output .= '  
                <tr  >  
                     <td>
                        <img style= "width: 100px;height: 150px;" src="'.$value['image'].'" class="img-responsive" alt="Image">
                     </td>  
                     <td >'.$value["prod_name"].'</td>  
                     <td class="price">'.number_format($value["price"]).' VND</td>  
                     <td >
                         <div id="'.$value['id'].'"  style="width: 70%;" class="input-group">
                            <span class="input-group-btn">
                                <button id="minus" type="button" onclick="minus('.$a.')" class="btn btn-default btn-number"data-type="minus" data-field="quant[1]">
                                <span class="glyphicon glyphicon-minus"></span> </button> 
                            </span>

                                <input name="quant[3]"id = "quantity" class="quantity form-control input-number" value= "'.$value["quantity"].'" type="number"> 
                                    
                                 <span class="input-group-btn">
                                    <button id="plus" type="button" onclick="plus('.$a.')" class="btn btn-default btn-number"
                                        data-type="plus" data-field="quant[3]"> <span class="glyphicon glyphicon-plus"></span>
                                    </button> 
                                </span>
                        </div>
                     
                     </td>  
                     <td>
                     <a href="#" data-role="delete" data-id=" '.$value['id'].'"class="btn btn-xs btn-danger btn_delete"><span class="glyphicon glyphicon-trash"></span></a>
                     | <a href="#" data-role="update"  data-id=" '.$value['id'].'"class="btn btn-xs btn-success btn_upload"><span class="glyphicon glyphicon-refresh"></span></a>
                     </td>  
                      
                </tr>  ';  
    }  

 $output .= '</table>  </div>';  
 echo $output;  


 ?>