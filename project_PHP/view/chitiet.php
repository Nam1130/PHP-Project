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
                $nameSp= $value['prod_name']; 
                $id_cate= $value['category_id']; 
                $price= $value['price']; 
                $sl= $value['quantity']; 
                $status= $value['status']; 
                $date= $value['imported_date']; 
                $note1= $value['note']; 
                $link_image= $value['image']; 
                
            }

            $sql = "SELECT cat_name FROM category,product WHERE category.id = product.id and product.id  = " . $idProduct;
            $array2 = $db->view($sql);
            foreach ($array2 as $key => $value) {
                $cat_name= $value['cat_name']; 
                
            }
           
           

           
        }
        if(isset($_POST['addCard'])) 
        { 
            $_SESSION['card'] = $array;
            $db->orders($cus_id,$date,$status);
            
        }
       

   ?>

    <div id="wapper">
        <div class="container-fluid">


        <div class="row fixtop">


        <div class="row">
            <div id="header">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 logo">

                    <!-- <img style="margin: 20px 0px 20px 20px;" src="..\image\tissot-logo.png" class="img-responsive" alt="Image"> -->
                    <a href="../index.php"><img style="margin: 20px 0px 20px 20px;" src="..\image\tissot-logo.png" class="img-responsive"
                            alt="Image">
                    </a>
                </div>

                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="row">
                        <div class="bar">
                            <a style="width: 30%;" href="#news">Vị Trí <i class="glyphicon glyphicon-map-marker hvr-grow a"></i></a>
                            <a  style="width: 40%;"data-toggle="modal" data-target="#modal-idform"><span id="tk">Tài Khoản</span>  <i class="glyphicon glyphicon-user  hvr-grow a"></i></a>
                            <a style="width: 30%;" href="displayCart.html">Giỏ Hàng <i class="glyphicon glyphicon-shopping-cart  hvr-grow a1"
                                    onclick="displayProduct()"></i><i id="cart2">0</i>
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
                                    <input style="margin-left: 5px;" type="text" class="  search-query form-control"
                                        placeholder="Search" />
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
                                                                <h4 href="#">Hãng Bán Chạy</h4>
                                                            </li>

                                                            <li><a href="#">Casio</a></li>
                                                            <li><a href="#">Citizen</a></li>
                                                            <li><a href="#">Seiko</a></li>
                                                            <li><a href="#">Op</a></li>
                                                            <li><a href="#">Sakagen</a></li>
                                                            <li><a href="#">Op</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                <li style="width: 200%;" class="media">
                                                    <div class="media-body">

                                                        <ul class="unstyled">
                                                            <li>
                                                                <h4 href="#">Đồng Hồ Cao Cấp</h4>
                                                            </li>

                                                            <li><a href="#">Patek Philipe</a></li>
                                                            <li><a href="#">Sarcar</a></li>
                                                            <li><a href="#">Zenith</a></li>
                                                            <li><a href="#">Rolex</a></li>
                                                            <li><a href="#">Sakagen</a></li>
                                                            <li><a href="#">Op</a></li>
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

                                                            <li><a href="#">Oris</a></li>
                                                            <li><a href="#">Titoni</a></li>
                                                            <li><a href="#">Longines</a></li>
                                                            <li><a href="#">CC Watches</a></li>
                                                            <li><a href="#">Cover</a></li>
                                                            <li><a href="#">Rado</a></li>
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

                                                            <li><a href="#">Casio</a></li>
                                                            <li><a href="#">Citizen</a></li>
                                                            <li><a href="#">Orients</a></li>
                                                            <li><a href="#">Seiko</a></li>

                                                        </ul>
                                                    </div>
                                                </li>
                                            </div>


                                        </div>
                                    </ul>

                                </div>

                            </li>
                            <li><a href="Man-watch.html">Đồng Hồ Nam</a></li>
                            <li><a href="#">Đồng Hồ Nữ</a></li>
                            <li><a href="#">Đồng Hồ Đôi</a></li>
                            <li class="menu2"><a href="#">Phụ kiện</a>
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
            </div><!-- /.navbar-collapse -->



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
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Thương Hiệu</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>Casio</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Số Hiệu Sản Phẩm</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> AE-1000W-1BVDF</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Xuất Xứ</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>Nhật Bản</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Giới Tính</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>Nam</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Kính</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>Resin Glass (Kính Nhựa)</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Máy</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> Quartz (Pin)</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Bảo Hành Quốc Tế</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> 2 Năm</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Bảo Hành</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>Tại Hải Triều</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Đường Kính Mặt Số</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>44mm</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span> <b>Bề Dày Mặt Số</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>14mm</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Niềng</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>Nhựa</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Dây Đeo</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> Dây Cao Su</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Màu Mặt Số</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>Đen</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Chống Nước</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span>10 ATM</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                                        <span><b>Chức Năng</b></span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                                        <span> Lịch – Bộ Bấm Giờ – Giờ Kép – Đèn Led</span>
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
                            <b>SẢN PHẨM BÁN CHẠY</b>
                        </h2>


                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product">

                            <div class="product-img">
                                <a href="chitiet.html" class="thumbnail">
                                    <img src="../image/12.png" class="img-responsive hvr-pulse" alt="Image">

                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT CHRONO</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success">Mua
                                        Ngay</button>
                                    <a href="chitiet.html">
                                        
                                    </a>
                                </div>
                            </div>

                        </div>

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
                                                <img class="media-object" src="../image/12.png" alt="Image">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading" name="namProduct">Đồng Hồ Tissot </h4>
                                                <p>Thông tin sản phẩm</p>
                                                <p><b> Mã Số Sản Phẩm:</b><i name="code">EFV-540L-1AVUDF</i> </p>
                                                <p><b>Phân Loại:</b> Đồng Hồ Nam</p>
                                                <p style="color: red;font-size: 20px;"><b name="price">2.562000</b> ₫</p>
                                                <p>Mẫu Casio EFV-540L-1AVUDF vẻ ngoài tạo nên dáng lịch lãm với phần
                                                    dây
                                                    đeo bằng da tông đen quý phái, đồng hồ kiểu dáng 6 kim mang đến một
                                                    phong
                                                    cách độc đáo đầy nam tính khi đi kèm chức năng Chronograph.</p>

                                                <div style="width: 50%; " class="input-group"> <span class="input-group-btn">
                                                        <button id="minus" type="button" onclick="minus(0)" class="btn btn-default btn-number"
                                                            data-type="minus" data-field="quant[1]">
                                                            <span class="glyphicon glyphicon-minus"></span> </button>

                                                    </span> <input name="quant[3]" class="form-control input-number"
                                                        value="1" type="text" id="sl"> <span class="input-group-btn">


                                                        <button id="plus" type="button" onclick="plus(0)" class="btn btn-default btn-number"
                                                            data-type="plus" data-field="quant[3]"> <span class="glyphicon glyphicon-plus"></span>
                                                        </button> </span>
                                                </div>
                                                <br>
                                                <button type="button" class="btn btn-danger btpro">Mua ngay</button>
                                                <button type="button" onclick="addProduct(0)" class="btn btn-danger btpro">Thêm
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
                        <div style="width: 100%;" class="modal" id="myModal2">
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
                                                <img class="media-object" src="../image/12.png" alt="Image">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading" name="namProduct">Đồng Hồ Tissot 8.5</h4>
                                                <p>Thông tin sản phẩm</p>
                                                <p><b> Mã Số Sản Phẩm:</b><i name="code">EFV-540L-2AVUDF</i> </p>
                                                <p><b>Phân Loại:</b> Đồng Hồ Nam</p>
                                                <p style="color: red;font-size: 20px;"><b name="price">2.562000 </b>₫</p>
                                                <p>Mẫu Casio EFV-540L-1AVUDF vẻ ngoài tạo nên dáng lịch lãm với phần
                                                    dây
                                                    đeo bằng da tông đen quý phái, đồng hồ kiểu dáng 6 kim mang đến một
                                                    phong
                                                    cách độc đáo đầy nam tính khi đi kèm chức năng Chronograph.</p>

                                                <div style="width: 50%; " class="input-group"> <span class="input-group-btn">
                                                        <button id="minus" type="button" onclick="minus(1)" class="btn btn-default btn-number"
                                                            data-type="minus" data-field="quant[1]">
                                                            <span class="glyphicon glyphicon-minus"></span> </button>

                                                    </span> <input name="quant[3]" class="form-control input-number"
                                                        value="1" type="text" id="sl"> <span class="input-group-btn">


                                                        <button id="plus" type="button" onclick="plus(1)" class="btn btn-default btn-number"
                                                            data-type="plus" data-field="quant[3]"> <span class="glyphicon glyphicon-plus"></span>
                                                        </button> </span>
                                                </div>
                                                <br>
                                                <button type="button" class="btn btn-danger btpro">Mua ngay</button>
                                                <button type="button" onclick="addProduct(1)" class="btn btn-danger btpro">Thêm
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


                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/2.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT EVERYT</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" data-toggle="modal" data-target="#myModal2" class="btn btn-success">Mua
                                        Ngay</button>
                                    <a href="chitiet.html">
                                        
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/4.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT SWISSM</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/5.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT TRADIT</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/6.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT V8ALP</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/7.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT TISSOT</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/8.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT HERITA</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/10.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT TISSOT</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/11.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT VISODT</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/12.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT AUTOMA</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/6.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT 5</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3  product">
                            <div class="product-img">
                                <a href="#" class="thumbnail">
                                    <img src="../image/7.png" class="img-responsive hvr-pulse" alt="Image">
                                </a>
                            </div>
                            <div class="caption">
                                <h3>TISSOT 7</h3>
                                <div class="cost">Giá: 4.5000000</div>
                                <div class="bt-cost">

                                    <button type="button" class="btn btn-success">Mua Ngay</button>
                                    

                                </div>
                            </div>

                        </div>





                    </div> <!-- content -->

                </div>
            </div>
        </div>

        <div style="bottom: 0;background-color: burlywood" class="row">
            <!-- footer -->

            <div style="margin-top: 15px;" id="footer">
                <div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        Partner: <a>Webtretho</a>| <a>Tinh tế</a>| <a>Haravan</a>|<br><br>
                        Forum software by XenFo 2010-2015 XenFo 2010-2015 XenFo <br>
                        Giấy phép MXH số 493/GP-BTTT do Bộ TTTT cấp ngày 25/09/2015

                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        Cty CP TM và DV Tin Học Nam Vinh <br>

                        Trụ sở:114 Đường số 2 Cư Xá Đô Thành P.4,Q.3,Tp.HCM <br>
                        ĐKKD số: 4102048497. Đăng ký ngày: 26/03/2007 <br>
                        Cơ quan cấp ĐKKD: Sở Kế Hoạch & Đầu Tư Tp. HCM <br>
                        Tel: ‎‎0903.94.5050 - ‎0937.56 77 <br>
                        Email: 123@nhatnguyet.vn <br>

                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        Liên hệ quảng cáo : 0902.111.357 (Mr. Nam), <br>
                        0937.56 77 (Mr. Vinh) <br>
                        Email: qc@nhatnguyet.vn <br>
                        
                       
                        


                    </div>
                </div>

            </div> <!-- footer -->

        </div>

    </div><!-- container-fluid -->
    </div>
 
</body>

</html>