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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

    <script src="../JavaScript/java.js"></script>


    <link rel="stylesheet" href="../css/responsive.css">
    <style>
        .a{
            margin: 10px;
        }

    </style>
   
<body>

   

    <?php   
     session_start();
         require "../model/users.php";
         require "../model/function.php";
         
         $db = new users;
         if(isset( $_SESSION['id_cus'])){
            $id_cus =  $_SESSION['id_cus'];

         }
         $cate=array(); 
         $sql = "SELECT * FROM customer where id = " .$id_cus;
         $customer = $db->view($sql);
         $cate=array(); 
         $datHang= array();
         $daDatHang = array();
         $sql = "SELECT cat_name FROM category";
         $cate = $db->view($sql);

         $bill = "SELECT product.prod_name, prod_orders.quantity,product.image, product.price from product, orders,prod_orders, bills 
         where bills.order_id =  orders.id and orders.id = prod_orders.order_id and prod_orders.prod_id = product.id and bills.status = 1 and 
          orders.cus_id ='$id_cus' group by prod_orders.prod_id";
         $datHang = $db->view($bill);
         

         $billed = "SELECT product.prod_name, prod_orders.quantity,product.image, product.price from product, orders,prod_orders, bills 
         where bills.order_id =  orders.id and orders.id = prod_orders.order_id and prod_orders.prod_id = product.id and bills.status = 0 and
           orders.cus_id ='$id_cus' group by prod_orders.prod_id";
          $daDatHang= $db->view($billed);
         
        
         
    ?>

    <div id="wapper">
        <div class="container-fluid">


        <div style = "margin-left: -15px;margin-right: -30px;"  class="row fixtop">

          <?php
              require_once "top.php";

          ?>
        
        </div>
        
        <div class="row">
          <div style = "margin-left: 20px;margin-top: 200px;" class="row  container-fluid" background="../image/backdh.jpg">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home">Thông tin cá nhân</a></li>
                <li><a data-toggle="pill" href="#menu1">Đơn hàng</a></li>
                <li><a data-toggle="pill" href="#menu2">Đơn Hàng Đã Đặt</a></li>
               
            </ul>
            
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <div class="infor" style = "margin-left: 50px; margin-top: 50px; background: white; border: 1px solid blanchedalmond;height: 200px;" >
                            <div class="panel-heading">
                                    <h3 class="panel-title" style="text-decoration: underline; color: #005fbf;">Thông tin cá nhân<a style = "font-size: 14px; "> | Chỉnh sửa</a></h3>
                            </div>
                            <div class="panel-body">
                                   
                                    <?php  

                                       foreach ($customer as $key => $value) {
                                            ?>
                                            
                                            <div class="row a">
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <b> Tên đăng nhập: </b>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <?php echo $value['user_name']  ?>
                                                </div>
                                                
                                                
                                            </div>
                                              
                                            <div class="row a">
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <b> Họ và Tên: </b>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <?php echo $value['cus_name']  ?>
                                                </div>
                                                
                                                
                                            </div>
                                              
                                            <div class="row a">
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <b> Địa chỉ: </b>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <?php echo $value['address']  ?>
                                                </div>
                                                
                                                
                                            </div>
                                              
                                            <div class="row a ">
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <b> Email:</b>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <?php echo $value['email']  ?>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                               
                                           
                                            


                                            <?php
                                       }

                                    ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <div style = "margin-right: 50px;height: 200px; margin-top: 50px; background: white; border: 1px solid blanchedalmond;" >
                            <div class="panel-heading">
                                    <h3 class="panel-title" style="text-decoration: underline; color: #005fbf;">Địa chỉ giao hàng<a style = "font-size: 14px;"> | Chỉnh sửa</a></h3>
                            </div>
                            <div class="panel-body">
                                   
                                    <?php  

                                       foreach ($customer as $key => $value) {
                                            ?>
                                            
                                           
                                          
                                            <div class="row a">
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <b> Địa chỉ: </b>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <?php echo $value['address']  ?>
                                                </div>
                                                
                                                
                                            </div>
                                              
                                            <div class="row a ">
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <b> Email:</b>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <?php echo $value['email']  ?>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                               
                                            <div class="row a ">
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <b> Số điện thoại:</b>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <?php echo $value['sdt']  ?>
                                                </div>
                                                
                                                
                                            </div>
                                            


                                            <?php
                                       }

                                    ?>
                            </div>
                        </div>
                    </div>
                    
                   
                    

                </div>
                <div id="menu1" class="tab-pane fade">
                <h3>Đơn Hàng Đang Đặt</h3>
                                       
                                       <div class="table-responsive">
                                           <table class="table table-hover">
                                               <thead>
                                                   <tr>
                                                       <th>Ảnh</th>
                                                       <th>Tên sản phẩm</th>
                                                       <th>Số lượng</th>
                                                       <th>Giá</th>
                                                       <th>Tùy Chỉnh</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                    <?php 
                                                        foreach ($datHang as $key => $value) {
                                                           ?>
                                                           <tr>
                                                                <td> <img style = "width: 60px;height: 60px;" src="<?php echo $value['image']; ?>" class="img-responsive" alt="Image"></td>
                                                                <td><?php echo $value['prod_name']; ?> </td>
                                                                <td><?php echo $value['quantity']; ?> </td>
                                                                <td><?php echo number_format($value['price'])." VND"; ?> </td>
                                                                <td><a href="#"> Quản Lí</a> </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                   <tr>
                                                       
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                       
                                    
            
                </div>
                <div id="menu2" class="tab-pane fade">
                <h3>Đơn Hàng Đã Đặt</h3>
             
                                       
                                       <div class="table-responsive">
                                           <table class="table table-hover">
                                               <thead>
                                                   <tr>
                                                       <th>Ảnh</th>
                                                       <th>Tên sản phẩm</th>
                                                       <th>Số lượng</th>
                                                       <th>Giá</th>
                                                       <th>Tùy Chỉnh</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                    <?php 
                                                        foreach ($daDatHang as $key => $value) {
                                                           ?>
                                                           <tr>
                                                                <td> <img style = "width: 60px;height: 60px;" src="<?php echo $value['image']; ?>" class="img-responsive" alt="Image"></td>
                                                                <td><?php echo $value['prod_name']; ?> </td>
                                                                <td><?php echo $value['quantity']; ?> </td>
                                                                <td><?php echo number_format($value['price'])." VND"; ?> </td>
                                                                <td><a href="#"> Quản Lí</a> </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                   <tr>
                                                       
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                       


                </div>
               
            </div>
          </div>
          

        </div>
        
    

        <div style = "margin-top: 300px;bottom: 0;width: 100%;margin-left: 0px;" class="row">
            <?php require('bottom.php'); ?>
        </div>

        </div><!-- container-fluid -->
        
        </div>
        
    </div>
    
    <!-- wapper -->
  

    <script src="../javaScript/java.js"></script>
    
</body>

</html>