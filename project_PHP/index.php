<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dong Ho Max Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="JavaScript/java.js"></script>
	<script src="JavaScript/check_error.js"></script>


    <link rel="stylesheet" href="css/responsive.css">

<body style="background-color: white;">

    <?php
    session_start();
         require "model/slides.php";
         $db=new slides; 
         $arr=array(); 
         $arr=$db->display("slides"); 

         $sql = 'select * from product 
         order by imported_date limit 12';

         $new=array(); 
         $new=$db->view($sql); 
      


         $sql = 'select  *, sum(prod_orders.quantity) from product, prod_orders where product.id= prod_orders.prod_id
         GROUP BY prod_orders.prod_id
         ORDER BY Sum(prod_orders.quantity) DESC
         limit 12';
         $bc=array(); 
         $bc=$db->view($sql); 
        $a = $_SESSION['card'];
         //print_r($a);

         
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



            <div class="row">
                <!-- slide -->
                <div style="position: relative" id="contain">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->

                        <!-- Wrapper for slides -->
                        <div style="position: relative; margin-top: 170px;" class="carousel-inner">

                            <?php
                                  
                                  foreach ($arr as $key => $value) {
                                      if($key == 0){
                                          ?>
                                             <div class="item active">
                                                <img src=" <?php echo $value['link'];?> " class="d-block w-100" style="width:100%;">
                                               
                                                <div class="carousel-caption">
                                                    <h2> <?php echo $value['name'];  ?> </h2>
                                                </div>
                                            </div>
                                           

                                          <?php
                                      }else{
                                          ?>
                                             <div class="item">
                                                <img src="<?php echo $value['link'];?> " class="d-block w-100" style="width:100%;">
                                                <div class="carousel-caption">
                                                    <h2><?php echo $value['name'];  ?> </h2>
                                                </div>
                                            </div>

                                          <?php
                                      }
                                  }
  
                            

                            ?>
                            <ol class="carousel-indicators ">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
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


            <div class="row">
                <div id="content">

                    <h2 style="text-align: center">
                        <b style="color: red;font-size: 40px;">SẢN PHẨM MỚI</b>
                    </h2>

                    <?php
                        foreach ($new as $key => $value) {
                           ?>
                                 <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 product">
                        
                                    <div class="product-img">
                                        <a style = "height: 286px;" href="view/chitiet.php?idProduct=<?php echo $value['id']; ?>" class="thumbnail">
                                            <img src="<?php echo $value['image'];?>" class="img-responsive hvr-pulse" alt="Image">
                                            
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h3><?php echo $value['prod_name'];?> </h3>
                                        <div class="cost"><?php echo $value['price'].' VNĐ';?></div>
                                        <div class="bt-cost">

                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success">Mua
                                                Ngay</button>
                                            <a href="chitiet.html">
                                                
                                            </a>
                                        </div>
                                    </div>

                                </div>

                           <?php
                        }

                    ?>

                </div> <!-- content -->

            </div>
            <div class="row">
                    <div id="content">
                        <h2 style="text-align: center">
                            <b style="color: red;font-size: 40px;">SẢN PHẨM BÁN CHẠY</b>
                        </h2>
                         <?php include('view/bestSeller.php'); ?>    
                    </div> <!-- content -->
            </div>

            <div class="row">
                <?php include('view/bottom.php'); ?>
            </div>
            



        </div><!-- container-fluid -->
    </div>
    <!-- wapper -->
    <div style="width: 100%;" class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 style="text-align: center;" class="modal-title">Thông Tin Chi Tiết</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">  

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="image/12.png" alt="Image">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading" name="namProduct">Đồng Hồ Tissot  </h4>
                                            <p>Thông tin sản phẩm</p>
                                            <p><b> Mã Số Sản Phẩm:</b><i name="code">EFV-540L-1AVUDF</i> </p>
                                            <p><b>Phân Loại:</b> Đồng Hồ Nam</p>
                                            <p style="color: red;font-size: 20px;"><b name="price">2.562000</b>  ₫</p>
                                            <p>Mẫu Casio EFV-540L-1AVUDF vẻ ngoài tạo nên dáng lịch lãm với phần dây
                                                đeo bằng da tông đen quý phái, đồng hồ kiểu dáng 6 kim mang đến một
                                                phong
                                                cách độc đáo đầy nam tính khi đi kèm chức năng Chronograph.</p>

                                            <div style="width: 50%; " class="input-group"> <span class="input-group-btn">
                                                    <button id="minus" type="button" onclick="minus(0)" class="btn btn-default btn-number"
                                                        data-type="minus" data-field="quant[1]">
                                                        <span class="glyphicon glyphicon-minus"></span> </button>

                                                </span> <input name="quant[3]" class="form-control input-number" value="1"
                                                    type="text" id="sl" > <span class="input-group-btn">


                                                    <button id="plus" type="button" onclick="plus(0)" class="btn btn-default btn-number"
                                                        data-type="plus" data-field="quant[3]"> <span class="glyphicon glyphicon-plus"></span>
                                                    </button> </span>
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-danger btpro">Mua ngay</button>
                                            <button type="button"name ="addCard" onclick="addProduct(0)" class="btn btn-danger btpro">Thêm
                                                vào giỏ</button>






                                        </div>
                                    </div>

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                   
                  

</body>

</html>