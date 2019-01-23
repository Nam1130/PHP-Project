<?php  
 session_start();
 require "../model/product.php";
 $db = new product;
 $id = $_POST['id']; 
 $output = '';  
 $sp =array();
 $details =array();
 
    $product = "SELECT * FROM product where id = ".$id;
    $sp = $db->view($product);
    foreach ($sp as $key => $value) {
        $image = $value['image'];
        $name = $value['prod_name'];
        $price = $value['price'];
        $note = $value['note'];

    }
 //  print_r($arr);
  //in chi tiết
    $chitiet = "SELECT product_code,brand FROM details where prod_id =".$id;
    
    $details = $db->view($chitiet);
    foreach ($details as $key => $value) {
        $code = $value['product_code'];
        $brand = $value['brand'];
    }
    

  
 
  $output .= ' <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="'.$image.'" alt="Image">
        </a>
        <div class="media-body">
            <h4 class="media-heading" name="namProduct">Đồng Hồ '.$name.'  </h4>
            <p>Thông tin sản phẩm</p>
            <p><b> Mã Số Sản Phẩm:</b><i name="code">'.$code.'</i> </p>
            <p><b>Phân Loại:</b> Đồng Hồ Nam</p>
            <p style="color: red;font-size: 20px;"><b name="price">'.number_format($price).'</b>  ₫</p>
            <p> '.$note.' </p>

           
                 <div   style="width: 50%;" class="input-group">
                    <span class="input-group-btn">
                        <button id="minus" type="button" onclick="minus(0)" class="btn btn-default btn-number"data-type="minus" data-field="quant[1]">
                        <span class="glyphicon glyphicon-minus"></span> </button> 
                    </span>

                    <input name="quant[3]" id="'.$id.'" class="quantity form-control input-number" value= "1" type="number"> 
                            
                    <span class="input-group-btn">
                        <button id="plus" type="button" onclick="plus(0)" class="btn btn-default btn-number"
                            data-type="plus" data-field="quant[3]"> <span class="glyphicon glyphicon-plus"></span>
                        </button> 
                    </span>
                </div>
     
            <br>
            <button type="button" class="btn btn-danger btpro">Mua ngay</button>
            
            <a href="#"style = "width: 40%; " data-role="addCart" data-id="'.$id.'" name = "addCard" class="btn  btn-danger">THÊM VÀO GIỎ</a>
                            





        </div>
        </div> ' ;  
  echo $output;  

 ?>