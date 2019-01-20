<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gio Hang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

    <script src="../JavaScript/java.js"></script>


    <link rel="stylesheet" href="../css/responsive.css">
    <style>
        .tt{
            margin: 15px;
        }

    </style>

<body style="background-color: aliceblue;">


    <?php   
     session_start();
         require "../model/card.php";
         require "../model/function.php";
        
         $nameErr = $emailErr = $addressErr = $sdtErr=$err = '';
        $name = $email = $address = $sdt='';

         
         $db = new card;
         $error=array();
         if(isset( $_SESSION['id_cus'])){
            $id_cus =  $_SESSION['id_cus'];
            //giỏ hàng
            $sql = 'select product.id,product.image, product.prod_name,product.price,prod_orders.quantity,prod_orders.order_id from
            product,prod_orders,orders where product.id = prod_orders.prod_id 
           and prod_orders.status = 1 and prod_orders.order_id = orders.id and orders.cus_id ='. $id_cus;
           $arr = $db->view($sql);

            // hóa đơn 
           

           // thông tin người nhận

           $sql = "SELECT * FROM customer WHERE id  = " .  $id_cus ;
           $array = $db->view($sql);
 
           foreach ($array as $key => $value) {
               $cus_name= $value['cus_name']; 
               $address= $value['address']; 
               $email= $value['email']; 
               $sdt= $value['sdt'];
               
           }
  
         }
         $cate=array(); 
         $sql = "SELECT cat_name FROM category";
         $cate = $db->view($sql);



         // kiểm tra thông tin
         if(isset($_POST['thanhtoan'])) 
         { 
            
             if (!empty($_POST["cus_name"])) {
                $name = trim(($_POST["cus_name"]));
             }else{
                 $err = "Không Được Bỏ Trống";
             }
             if (!empty($_POST["email"])) {
                $email = trim(($_POST["email"]));
             }else{
                $err = "Không Được Bỏ Trống";
            }
             if (!empty($_POST["address"])) {
                $address = trim(($_POST["address"]));
             }else{
                $err = "Không Được Bỏ Trống";
            }
             if (!empty($_POST["phone"])) {
                $sdt = trim(($_POST["phone"]));
             }else{
                $err = "Không Được Bỏ Trống";
            }

            if(empty($err)){
                
                $db->bills( $id_cus,date('Y-m-d'),$_SESSION['tongtien'], $address,1);
                //update status spham da dat hang
                foreach ($arr as $key => $value) {
                    $id_product = $value['id'];
                    $id_order = $value['order_id'];
                    //tình trạng sản phẩm sau khi đặt hàng
                    $sql = "UPDATE prod_orders set status = 0 where prod_id = '$id_product' and order_id = '$id_order' and status = 1";
                    $db->excute($sql);

                    //update tình trang oder sau khi đặt hàng
                    $sql = "UPDATE orders set status = 0 where id = '$id_order' and cus_id = '$id_cus' and status = 1";
                    $db->excute($sql);
                }
                header('Location:index.php');
            }else{
                $err = "Điền đầy đủ thông tin !";
            }
        }

        
         
    ?>

    <div id="wapper">
        <div class="container-fluid">
                <div style = "width: 100%;margin-left: -15px;margin-right: -30px;"  class="row fixtop">

                    <?php
                        require_once "top.php";

                    ?>
                </div>

            
                    <?php
                            echo "<div class='alert alert-info'>";
                            echo  $err;
                            echo "</div>";
                    ?>
                    
                    <div style = "margin-top: 200px;" class="row">
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-md-offset-1">
                            <form action="" method="POST" role="form">
                                    
                                <h4 style="text-align: center;" class="modal-title">Thông Tin Người Nhận</h4>
                                    <div class="form-group">
                                            <div class="row tt">
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <span id="errname">Họ Và Tên:</span>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <input type="text" name="cus_name" id="input_name" class="form-control" value="<?php echo $cus_name; ?>" >
                                                </div>
                                            </div>
                                        
                                            <div class="row tt">
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <span >Email:</span>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <input type="email" name="email" id="input_name" class="form-control" value="<?php echo $email; ?>">
                                                </div>
                                            </div>


                                            <div class="row tt">
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <span >Địa Chỉ:</span>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <input type="text" name="address" id="input_name" class="form-control" value="<?php echo $address; ?>">
                                                </div>
                                            </div>
                                            <div class="row tt">
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <span >Số Điện Thoại:</span>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <input type="text" name="phone" id="input_name" class="form-control" value="<?php echo $sdt; ?>">
                                                </div>
                                            </div>
                                            <div class="row tt">
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <span >Thanh Toán:</span>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Thanh toán khi nhận hàng</option>
                                                    <option>Thẻ tín dụng</option>
                                                   
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="margin: 20px;" class="row tt">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 error">
                                                    <b style = "color: red;text-align: center;font-size: 20px;" id = "total" class="pull-left">Tổng Tiền: <?php echo  number_format($_SESSION['tongtien'])." VND"; ?> </b>
                                                </div>
                                            </div>

                                    </div>
                                
                                    
                                    <button style="margin-left: 400px; margin-bottom: 20px;;" name="thanhtoan" type="submit" class="btn btn-danger">Thanh Toán Khi Nhận hàng</button>
                                    
                                </form>
                                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                                    <!-- Nhập địa chỉ email người nhận tiền (người bán) -->
                                    <input type="hidden" name="business" value="oke9925@gmail.com">

                                    <!-- tham số cmd có giá trị _xclick chỉ rõ cho paypal biết là người dùng nhất nút thanh toán -->
                                    <input type="hidden" name="cmd" value="_xclick">

                                    <!-- Thông tin mua hàng. -->
                                    <input type="hidden" name="item_name" value="HoaDonMuaHang">
                                    <!--Trị giá của giỏ hàng, vì paypal không hỗ trợ tiền việt nên phải đổi ra tiền $-->

                                    <input type="hidden" name="amount" value="<?php echo round($_SESSION['tongtien']/25000,2); ?>">
                                    <!--Loại tiền-->
                                    <input type="hidden" name="currency_code" value="USD">
                                    <!--Đường link mình cung cấp cho Paypal biết để sau khi xử lí thành công nó sẽ chuyển về theo đường link này-->
                                    <input type="hidden" name="return" value="http://localhost/demothanhtoanonline/thanhcong.html">
                                    <!--Đường link mình cung cấp cho Paypal biết để nếu  xử lí KHÔNG thành công nó sẽ chuyển về theo đường link này-->
                                    <input type="hidden" name="cancel_return" value="http://localhost/demothanhtoanonline/loi.html">
                                    <!-- Nút bấm. -->
                                    <input style = "margin-top: -100px;margin-left:150px;" type="submit" name="submit" class="btn btn-danger" value="Thanh Toán Tại Paypal">
                                    </form>

                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            
                            <div  style = "margin-left: 40px; width: 300px;" class="panel panel-danger">
                                  <div class="panel-body">
                                            <?php
                                            foreach ($arr as $key => $value) {
                                                ?>
                                                    
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img style = "width: 100px;" class="media-object" src="<?php echo $value['image'];  ?>" alt="Image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 style = "color: red;" class="media-heading"><?php  echo $value['prod_name'];  ?></h4>
                                                            <p><b>Giá:</b>  <?php echo number_format ($value['price']);  ?> VND</p>
                                                            <p><b>Số Lượng:</b> <?php  echo $value['quantity'];  ?></p>
                                                        </div>
                                                    </div>
                                                    

                                                <?php
                                            }

                                        ?>
                                  </div>
                            </div>
                            
                            

                        </div>


                    </div>
                    



                    <div style = " bottom: 0px" class="row">
                        <?php include('bottom.php'); ?>
                    </div>
            

  
               


        </div><!-- container-fluid -->
    </div>
    <!-- wapper -->
  

    <script src="java.js"></script>
    
</body>

</html>