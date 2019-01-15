<!DOCTYPE html>
<html>


<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Man-Watches</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="../JavaScript/java.js"></script>
    <script src="../JavaScript/check_error.js"></script>

 
    <link rel="stylesheet" href="../css/responsive.css">
    <style type="text/css">

    </style> 
<body style="background-color: aliceblue; margin-left: 1%; margin-right:2%;">

    <script>
        var tk = sessionStorage.getItem('ten');
        window.onload = function () {
            // do stuff to load your form fields 
            document.getElementById("tk").innerHTML = tk;
        } 
    </script>
   

   <?php
   session_start();

        require "../model/card.php";
        require "../model/function.php";
        
        $db = new card;
        if (isset($_GET['idProduct']))
        {
            $idProduct = $_GET['idProduct'];
            $sql = "SELECT * FROM product WHERE id  = " . $idProduct;
            $array = $db->view($sql);
  
            foreach ($array as $key => $value) {
                $prod_id= $value['id']; 
                $nameSp= $value['prod_name']; 
                $id_cate= $value['category_id']; 
                $price= $value['price']; 
                $sl= $value['quantity']; 
                $status= $value['status']; 
                $date= $value['imported_date']; 
                $note1= $value['note']; 
                $link_image= $value['image']; 
                
            }

            $sql = "SELECT cat_name FROM category,product WHERE category.id = product.category_id and product.id  = " . $idProduct;
            $array2 = $db->view($sql);
            foreach ($array2 as $key => $value) {
                $cat_name= $value['cat_name']; 
                
            }

            $sql = "SELECT * FROM details WHERE id  = " . $idProduct;
            $array = $db->view($sql);
  
            foreach ($array as $key => $value) {
                $codeSp= $value['product_code']; 
                $brand= $value['brand']; 
                $origin= $value['origin']; 
                $forGen= $value['forGen']; 
                $glass= $value['glass']; 
                $machine= $value['machine']; 
                $guarantee= $value['guarantee']; 
                $guarantee_place= $value['guarantee_place'];
                $diameter= $value['diameter'];
                $surface_thickness= $value['surface_thickness'];
                $braces= $value['braces'];
                $strap= $value['strap'];
                $color= $value['color'];
                $waterproof= $value['waterproof'];
                $function= $value['function'];
                
            }                    
           
          
        }

        $id_cus =  $_SESSION['id_cus'];
         $sql = 'select prod_orders.prod_id,prod_orders.quantity from
          product,prod_orders,orders where product.id = prod_orders.prod_id 
         and prod_orders.status = 1 and prod_orders.order_id = orders.id and orders.cus_id ='. $id_cus;
         $arr = $db->view($sql);


        if(isset($_POST['addCard'])) 
        { 
            foreach ($arr as $key => $value) {
               if($value['prod_id']==$idProduct){
                //    $sql = "update prod_orders set quantity = ".$value['quantity'] + 1;
                //     $db->excute($sql);
               }elseif($value['prod_id']!=$idProduct){
                    $db->orders($_SESSION['id_cus'], date('Y-m-d'),1);
                
                    $sql  = 'select max(id) from orders';
                    $order = $db->view($sql);
                    foreach ($order as $key => $value) {
                        $order_id = $value['max(id)'];
                    }
                    $_SESSION['card']= array(
        
                            'prod_id' => $prod_id,
                            'order_id' =>$order_id,
                            'sl' => 1,
                            'id_cus'=>$_SESSION['id_cus']
                        );
                    $db->prod_orders($prod_id, $order_id,1,1);
               }
            }


            
            
        }
       
        $dhMy=array(); 
         $sql = "SELECT name FROM provided WHERE address  =  'Mĩ'";
         $dhMy = $db->view($sql);

         $dhDuc=array(); 
         $sql = "SELECT name FROM provided WHERE address  =  'Đức'";
         $dhDuc = $db->view($sql);

         $dhThuySy=array(); 
         $sql = "SELECT name FROM provided WHERE address  =  'Thụy Sỹ'";
         $dhThuySy = $db->view($sql);

         $dhNhat=array(); 
         $sql = "SELECT name FROM provided WHERE address  =  'Nhật'";
         $dhNhat = $db->view($sql);


         $cate=array(); 
         $sql = "SELECT cat_name FROM category";
         $cate = $db->view($sql);


   ?>

    <div id="wapper">
        <div class="container-fluid">
        <div style = "width: 100%;margin-left: -15px;margin-right: -30px;"  class="row fixtop">


<div class="row">
  <div style = "margin-left: -20px; width: 100%;" id="header">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 logo">

      <!-- <img style="margin: 20px 0px 20px 20px;" src="image\tissot-logo.png" class="img-responsive" alt="Image"> -->
      <a href="#"><img style="margin: 20px 0px 20px 20px;" src="image\tissot-logo.png" class="img-responsive" alt="Image">
      </a>
    </div>

    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      <div class="row">
        <div class="bar">
          <a style="width: 30%;" href="#news">Vị Trí <i class="glyphicon glyphicon-map-marker hvr-grow a"></i></a>
          <a style="width: 40%;"  href="view/login.php"><span id="tk">Xin chào <?php   ?></span>  <i class="glyphicon glyphicon-user  hvr-grow a"></i></a>
          <a style="width: 30%;" href="displayCart.php">Giỏ Hàng <i class="glyphicon glyphicon-shopping-cart  hvr-grow a1"
                    onclick="displayProduct()"></i><i id="cart">0</i>
            </a>

        </div>
      </div>
      <div class="row">

        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 offset-1">
          <div class="row">
            <div class="search">
              <div class="input-group">
                <input type="text" class="  search-query form-control" placeholder="Search" />
                <span class="input-group-btn">
                            <button style="float: left" class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                </button>
                </span>
              </div>
            </div>
          </div>
          <!--row -->

        </div>


      </div>

    </div>

  </div>
  <!-- header -->
</div>


<div style="margin-left: 5px; margin-right: 3px;" class="row">
  <div class="row">
    <div class="row na1">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <nav style="background-color: aliceblue;" class="navbar navbar-default" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <button style="float: left;margin-left: 12px" type="button" class="navbar-toggle glyphicon glyphicon-shopping-cart">
            </button>
            <button style="float: left;" type="button" class="navbar-toggle glyphicon glyphicon-user">
            </button>
            <button style="float: left;" type="button" class="navbar-toggle glyphicon glyphicon-map-marker">
            </button>

          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav menu">
              <li class="search2">
                <div class="input-group">
                  <input style="margin-left: 5px;" type="text" class="  search-query form-control" placeholder="Search" />
                  <span class="input-group-btn">
                                <button style="margin-right: 5px;" class="btn btn-danger" type="button">
                                    <span class=" glyphicon glyphicon-search"></span>
                  </button>
                  </span>
                </div>
              </li>
              <li class="menufull"><a href="javascript:void(0)">Thương Hiệu</a>

                <div class="row">

                  <ul style="width: 1050%;" class="nav navbar-nav menu-sub-full">
                    <div class="row-fluid">

                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <li style="width: 200%;" class="media">
                          <div class="media-body">

                            <ul class="unstyled">
                              <li>
                                <h4 href="#">Đồng Hồ Mĩ</h4>
                              </li>
                              <?php   
                                foreach ($dhMy as $key => $value) {
                                  ?>
                                       <li><a href="#"><?php  echo $value['name'] ;?> </a></li>
                                  <?php
                                }
                              
                              ?>

                             
                              
                            </ul>
                          </div>
                        </li>
                      </div>
                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <li style="width: 200%;" class="media">
                          <div class="media-body">

                            <ul class="unstyled">
                              <li>
                                <h4 href="#">Đồng Hồ Đức</h4>
                              </li>
                              <?php   
                                foreach ($dhDuc as $key => $value) {
                                  ?>
                                       <li><a href="#"><?php  echo $value['name'] ;?> </a></li>
                                  <?php
                                }
                              
                              ?>
                                
                            </ul>
                          </div>
                        </li>
                      </div>
                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <li style="width: 200%;" class="media">
                          <div class="media-body">

                            <ul class="unstyled">
                              <li>
                                <h4 href="#">Đồng Hồ Thụy Sỹ</h4>
                              </li>
                              <?php   
                                foreach ($dhThuySy as $key => $value) {
                                  ?>
                                       <li><a href="#"><?php  echo $value['name'] ;?> </a></li>
                                  <?php
                                }
                              
                              ?>
                                
                            </ul>
                          </div>
                        </li>
                      </div>
                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <li style="width: 200%;" class="media">
                          <div class="media-body">

                            <ul class="unstyled">
                              <li>
                                <h4 href="#">Đồng Hồ Nhật</h4>
                              </li>

                              <?php   
                                foreach ($dhNhat as $key => $value) {
                                  ?>
                                       <li><a href="#"><?php  echo $value['name'] ;?> </a></li>
                                  <?php
                                }
                              
                              ?>

                            </ul>
                          </div>
                        </li>
                      </div>


                    </div>
                  </ul>

                </div>

              </li>
                            <?php   
                                foreach ($cate as $key => $value) {
                                  ?>
                                       <li><a href="#"><?php  echo $value['cat_name'] ;?> </a></li>
                                      
                                  <?php
                                }
                              
                              ?>
                <ul class="nav navbar-nav menu-sub">
                  <li><a href="#">Dây Da ZRC</a></li>
                  <li><a href="#">Dây Da Hir</a></li>
                  <li><a href="#">Hộp Đồng Hồ</a></li>
                </ul>

              </li>
              <li class="menu2"> <a>Liên Hệ</a>
                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a> -->

                <ul class="nav navbar-nav menu-sub">
                  <li><a href="#">Thông Tin LH</a></li>
                  <li><a href="#">Góp ý</a></li>

                </ul>

              </li>

            </ul>

          </div>
        </nav>
      </div>
      <!-- /.navbar-collapse -->



    </div>
  </div>
</div>


</div>

        </div>

            <div style="margin-top: 180px; margin-left: 2%; margin-right: 2%" class="row chitiet">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="page-header">
                            <center>
                                <h3 style="color: #999999">CASIO NAM – QUARTZ (PIN) – KÍNH NHỰA – DÂY CAO SU
                                    (AE-1000W-1BVDF)</small></h3>
                                  
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                            <!-- slide -->
                            <div style="position: relative" id="contain">

                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <!-- Wrapper for slides -->
                                    <div style="position: relative; " class="carousel-inner">

                                        <div class="item active">
                                            <img src="<?php echo $link_image;   ?>  " class="img-responsive" alt="Image" style="height: auto; margin-left: 15px;width:70%; ">
                                            <!-- <img src="..\image\sp.png" class="d-block w-100" style="height: auto; margin-left: 15px;width:100%; "> -->
                                        </div>

                                        <div class="item">
                                            <img src="..\image\chitiet1.png" class="img-responsive" alt="Image" style="height: auto; margin-left: 15px;width:100%;">
                                            <!-- <img src="..\image\chitiet1.png" class="d-block w-100"style="height: auto; margin-left: 15px;width:100%;"> -->
                                        </div>

                                        <div class="item">
                                            <img src="..\image\chitiet2.png" class="img-responsive" alt="Image" style="height: auto; margin-left: 15px;width:100%;">
                                            <!-- <img src="..\image\chitiet2.png" class="d-block w-100"style="height: auto; margin-left: 15px;width:100%;"> -->
                                        </div>
                                        <ol class="carousel-indicators ">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>

                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- slide -->
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ttin">
                            <div class="row">
                                <h1>THÔNG TIN SẢN PHẨM</h1>
                            </div>
                            <div class="row">
                                <h4>Mã Số Sản Phẩm: AE-1000W-1BVDF</h4>
                            </div>
                            <div class="row">
                                <h4>Phân Loại: <?php  echo $cat_name; ?></h4>
                            </div>
                            <div class="row">
                                <h3><?php   echo $price; ?> ₫</h3>
                            </div>
                            <div class="row">
                                <p><?php echo $note1; ?> </p>
                            </div>
                            <div class="row">
                                
                                <form action="" method="POST" role="form">
                                    <button type="submit" name = "addCard"class="btn btn-lg btn-danger" style="width: 90%">THÊM VÀO GIỎ</button>
                                </form>
                                
                               
                              
                            </div>
                            <div class="row">
                                <p>Gọi đặt mua:<a href=""> 1900.6777</a>(7:30-21:30)</p>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                            <div class="panel panel-danger">

                                <div class="panel-body">
                                    <h3>Thương Hiệu</h3>
                                    <img src="..\image\Casio-Logo.png" class="img-responsive" alt="Image">
                                </div>

                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img src="..\image\chung-nhan1.png" class="media-object" style="width:60px">
                                </div>
                                <div class="media-body">
                                    Hoàn Lại Tiền Gấp 10 Lần Nếu Phát Hiện Hàng Giả - Hàng Nhái. </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img src="..\image\bao-hanh-5-nam1.png" class="media-object" style="width:60px">
                                </div>
                                <div class="media-body">
                                    Chế Độ Bảo Hành Lên Đến 5 Năm! Hoàn Toàn An Tâm - Xem Thêm </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img src="..\image\1-doi-12.png" class="media-object" style="width:60px">
                                </div>
                                <div class="media-body">
                                    Sai Kích Cỡ? Không Ưng Ý? Đổi Hàng Trong 7 Ngày . </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img src="..\image\thay-pin-mien-phi1.png" class="media-object" style="width:60px">
                                </div>
                                <div class="media-body">
                                    Thay Pin Miễn Phí Suốt Đời - Không Còn Lo Hết Pin Nữa. </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img src="..\image\cod1.png" class="media-object" style="width:60px">
                                </div>
                                <div class="media-body">
                                    Nhận Hàng & Trả Tiền - Ngay Tại Nhà Bạn. Hoàn Toàn Miễn Phí.</div>
                            </div>





                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Đặc điểm nổi bật</a>
                    </li>
                    <li role="presentation">
                        <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Chế đội bảo hành và hậu mãi</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                       <!--  <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div> -->
                        <div class="modal-body">
                            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Thương Hiệu</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> <?php  echo $brand; ?> </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Số Hiệu Sản Phẩm</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> <?php  echo $codeSp; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Xuất Xứ</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $origin; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Giới Tính</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $forGen; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Kính</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $glass; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Máy</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> <?php  echo $machine; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Bảo Hành Quốc Tế</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> <?php  echo $guarantee; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Bảo Hành</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $guarantee_place; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Đường Kính Mặt Số</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $diameter; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span> <b>Bề Dày Mặt Số</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $surface_thickness; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Niềng</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $braces; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Dây Đeo</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $strap; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Màu Mặt Số</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $color; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Chống Nước</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span><?php  echo $waterproof; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Chức Năng</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> <?php  echo $function; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4 casio">
                                <img src="..\image\Gioi-Thieu-Casio.png" class="img-responsive" alt="Image">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h2>QUYỀN LỢI KHI MUA TẠI ĐỒNG HỒ HẢI TRIỀU:</h2>
                                    <p>Cam kết bán hàng chính hãng – Đền bù gấp 10 nếu phát hiện hàng Fake hoặc Replica<br>
                                        Thay pin - Không Còn Lo Hết Pin Nữa.<br>
                                        1 đổi 1 trong 7 ngày nếu có bất kỳ lỗi nào do nhà sản xuất<br>
                                        Giao hàng & Thu tiền (COD) miễn phí toàn quốc (Quý khách chỉ trả tiền khi nhận
                                        được hàng)<br>
                                        Đổi hàng hoàn toàn miễn phí nếu quý khách thấy không ưng ý với sản phẩm nhận
                                        được.</p>


                                    <h2>HƯỚNG DẪN MUA HÀNG:</h2>
                                    <p>Do đặc thù mặt hàng đồng hồ cao cấp nên chúng tôi khuyến khích Quý khách tới
                                        tham quan và mua sắm tại hệ thống đại lý cửa hàng của Đồng Hồ Hải Triều.</p>

                                    <h2>Hệ Thống Chi Nhánh</h2>
                                    <p>Trường hợp quý khách ở xa (khu vực không có hệ thống cửa hàng của Hải Triều),
                                        không có thời gian tới cửa hàng, hay theo yêu cầu của quý khách - Để đảm bảo sự<br>
                                        thuận tiện nhất cho quá trình mua hàng của Quý khách, Đồng Hồ Hải Triều sẽ áp
                                        dụng hình thức giao hàng và thu tiền tận nhà (COD) (Quý khách chỉ phải trả tiền
                                        khi<br>nhận được hàng)</p>

                                    <h2>Gọi Ngay: 1900.6777</h2>
                                    <p>Đối với những khách hàng có nhu cầu gửi tặng bạn bè, người thân - Hải Triều chấp
                                        nhận hình thức Thanh Toán Chuyển Khoản 100% giá trị sản phẩm. Đồng hồ sẽ được<br>
                                        giao tới tận tay người nhận sau xác nhận chuyển tiền hoàn thành. Thông Tin
                                        Chuyển Khoản.<br>

                                        Xem Thông Tin Chuyển Khoản</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
                 <div class="row">

                    <div id="content">
        
                                <h2 style="text-align: center">
                                    <b style="color: red;font-size: 40px;">SẢN PHẨM BÁN CHẠY</b>
                                </h2>
                                <?php include('bestSeller.php'); ?>
                    </div>
                     
                </div>


                </div>
            </div>
        </div>

        

        <div class="row">
                <?php include('bottom.php'); ?>
        </div>

    </div><!-- container-fluid -->
    </div>
 
</body>

</html>