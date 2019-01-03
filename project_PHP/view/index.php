<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dong Ho Max Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="java.js"></script>
	<script src="check_error.js"></script>


    <link rel="stylesheet" href="responsive.css">

<body style="background-color: white;">
    <script>
        var tk =  sessionStorage.getItem('ten');
        window.onload = function () {
            // do stuff to load your form fields 
            if(tk =="namdang"|| tk == "vinhtran"){
              
                document.getElementById("tk").innerHTML = tk;
            }else{
                document.getElementById("tk").innerHTML = 'Tài Khoản';
            }


           
        }
      </script>


    <div id="wapper">
        <div class="container-fluid">

            <div class="row fixtop">

                <?php
                    include('top.php');
                ?>

            </div>






            <div class="row">
                <!-- slide -->
                <div style="position: relative" id="contain">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->

                        <!-- Wrapper for slides -->
                        <div style="position: relative; margin-top: 170px;" class="carousel-inner">

                            <div class="item active">
                                <img src="image\slide1.jpg" class="d-block w-100" style="width:100%;">
                                <div class="carousel-caption">
                                    <h2>TISSOT TRADITION 5.5</h2>
                                </div>
                            </div>

                            <div class="item">
                                <img src="image\slide2.jpg" class="d-block w-100" style="width:100%;">
                                <div class="carousel-caption">
                                    <h2>TISSOT CHRONO XL 3.5</h2>
                                </div>
                            </div>

                            <div class="item">
                                <img src="image\slide3.jpg" class="d-block w-100" style="width:100%;">
                                <div class="carousel-caption">
                                    <h2>TISSOT T-TOUCH</h2>
                                </div>
                            </div>
                            <div class="item">
                                <img src="image\slide4.jpg" class="d-block w-100" style="width:100%;">
                                <div class="carousel-caption">
                                    <h2>TISSOT T-RACE 2.5</h2>
                                </div>
                            </div>
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
                        <b>SẢN PHẨM MỚI</b>
                    </h2>


                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 product">
                        
                        <div class="product-img">
                            <a href="chitiet.html" class="thumbnail">
                                <img src="image/12.png" class="img-responsive hvr-pulse" alt="Image">
                                
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
                                            <img class="media-object" src="image/12.png" alt="Image">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading" name="namProduct">Đồng Hồ Tissot 8.5</h4>
                                            <p>Thông tin sản phẩm</p>
                                            <p><b> Mã Số Sản Phẩm:</b><i name="code">EFV-540L-2AVUDF</i> </p>
                                            <p><b>Phân Loại:</b> Đồng Hồ Nam</p>
                                            <p style="color: red;font-size: 20px;"><b name="price">2.562000 </b>₫</p>
                                            <p>Mẫu Casio EFV-540L-1AVUDF vẻ ngoài tạo nên dáng lịch lãm với phần dây
                                                đeo bằng da tông đen quý phái, đồng hồ kiểu dáng 6 kim mang đến một
                                                phong
                                                cách độc đáo đầy nam tính khi đi kèm chức năng Chronograph.</p>

                                            <div style="width: 50%; " class="input-group"> <span class="input-group-btn">
                                                    <button id="minus" type="button" onclick="minus(1)" class="btn btn-default btn-number"
                                                        data-type="minus" data-field="quant[1]">
                                                        <span class="glyphicon glyphicon-minus"></span> </button>

                                                </span> <input name="quant[3]" class="form-control input-number" value="1"
                                                    type="text" id="sl" > <span class="input-group-btn">


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


                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3  product">
                        <div class="product-img">
                            <a href="#" class="thumbnail">
                                <img src="image/2.png" class="img-responsive hvr-pulse" alt="Image">
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
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3  product">
                        <div class="product-img">
                            <a href="#" class="thumbnail">
                                <img src="image/4.png" class="img-responsive hvr-pulse" alt="Image">
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
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3  product">
                        <div class="product-img">
                            <a href="#" class="thumbnail">
                                <img src="image/5.png" class="img-responsive hvr-pulse" alt="Image">
                            </a>
                        </div>
                        <div class="caption">
                            <h3>TISSOT TRADITT</h3>
                            <div class="cost">Giá: 4.5000000</div>
                            <div class="bt-cost">

                                <button type="button" class="btn btn-success">Mua Ngay</button>
                                 

                            </div>
                        </div>

                    </div>
                   





                </div> <!-- content -->

            </div>
            <div class="row">
                    <div id="content">
    
                        <h2 style="text-align: center">
                            <b>SẢN PHẨM BÁN CHẠY</b>
                        </h2>
    
    
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product">
                            
                            <div class="product-img">
                                <a href="chitiet.html" class="thumbnail">
                                    <img src="image/12.png" class="img-responsive hvr-pulse" alt="Image">
                                    
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
                                                <img class="media-object" src="image/12.png" alt="Image">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading" name="namProduct">Đồng Hồ Tissot 8.5</h4>
                                                <p>Thông tin sản phẩm</p>
                                                <p><b> Mã Số Sản Phẩm:</b><i name="code">EFV-540L-2AVUDF</i> </p>
                                                <p><b>Phân Loại:</b> Đồng Hồ Nam</p>
                                                <p style="color: red;font-size: 20px;"><b name="price">2.562000 </b>₫</p>
                                                <p>Mẫu Casio EFV-540L-1AVUDF vẻ ngoài tạo nên dáng lịch lãm với phần dây
                                                    đeo bằng da tông đen quý phái, đồng hồ kiểu dáng 6 kim mang đến một
                                                    phong
                                                    cách độc đáo đầy nam tính khi đi kèm chức năng Chronograph.</p>
    
                                                <div style="width: 50%; " class="input-group"> <span class="input-group-btn">
                                                        <button id="minus" type="button" onclick="minus(1)" class="btn btn-default btn-number"
                                                            data-type="minus" data-field="quant[1]">
                                                            <span class="glyphicon glyphicon-minus"></span> </button>
    
                                                    </span> <input name="quant[3]" class="form-control input-number" value="1"
                                                        type="text" id="sl" > <span class="input-group-btn">
    
    
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
                                    <img src="image/2.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/4.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/5.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/6.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/7.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/8.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/10.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/11.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/12.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/6.png" class="img-responsive hvr-pulse" alt="Image">
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
                                    <img src="image/7.png" class="img-responsive hvr-pulse" alt="Image">
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
    

            
            <div class="row">
                <?php include('bottom.php'); ?>
            </div>
            



        </div><!-- container-fluid -->
    </div>
    <!-- wapper -->

    <div class="modal fade modalform" id="modal-idform">
        <div class="modal-dialog modal-xs">
            <div class="modal-content" style="background-color: #d4ffaa">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="background-color: #d4ffaa">ĐĂNG NHẬP</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab" style="background-color: #d4ffaa">ĐĂNG KÍ</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" style="background-color: #d4ffaa">
                        <div role="tabpanel" class="tab-pane active" id="home"><div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">ĐĂNG NHẬP</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <span id="errname">Tên Đăng Nhập:</span>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" name="" id="input_name" class="form-control" value="" required="required" pattern="" title="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <span id="errpass">Mật khẩu:</span>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="Password" name="" id="input_pass" class="form-control" value="" required="required" pattern="" title="">
                                    <!-- <button><span id="glyphicon glyphicon-eye-open"></span></button> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <span id = "error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary"  onclick="Check_Login()">ĐĂNG NHẬP</button>
                        </div></div>
                        <div role="tabpanel" class="tab-pane" id="tab"><div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">ĐĂNG KÍ</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <span id="errorName">Tên Đăng Nhập:</span>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" name="" id="nameNew" class="form-control" value="" required="required" pattern="" title="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <span id="errorPhone">Sdt</span>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="number" name="" id="phone" class="form-control" value="" required="required" pattern="" title="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <span id="errorEmail">Email:</span>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="Email" name="" id="email" class="form-control" value="" required="required" title="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <span id="errorBirth-day">Ngày Sinh:</span>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <p id="errorDay">Ngày:</p>
                                            <select class="input" name="" id="day" class="form-control" data-toggle="dropdown" required="required">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>														
                                            </select>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <p id="errorMonth">Tháng:</p>
                                            <select class="input" name="" id="month" class="form-control" data-toggle="dropdown" required="required">
                                                <option value="Tháng 1">Tháng 1</option>
                                                <option value="Tháng 2">Tháng 2</option>
                                                <option value="Tháng 3">Tháng 3</option>
                                                <option value="Tháng 4">Tháng 4</option>
                                                <option value="Tháng 5">Tháng 5</option>
                                                <option value="Tháng 6">Tháng 6</option>
                                                <option value="Tháng 7">Tháng 7</option>
                                                <option value="Tháng 8">Tháng 8</option>
                                                <option value="Tháng 9">Tháng 9</option>
                                                <option value="Tháng 10">Tháng 10</option>
                                                <option value="Tháng 11">Tháng 11</option>
                                                <option value="Tháng 12">Tháng 12</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <p id="errorYear">Năm:</p>
                                            <select class="input" name="" id="year" class="form-control" data-toggle="dropdown" required="required">
                                                <option value="1980">1980</option>
                                                <option value="1981">1981</option>
                                                <option value="1982">1982</option>
                                                <option value="1983">1983</option>
                                                <option value="1984">1984</option>
                                                <option value="1985">1985</option>
                                                <option value="1986">1986</option>
                                                <option value="1987">1987</option>
                                                <option value="1989">1989</option>
                                                <option value="1990">1990</option>
                                                <option value="1991">1991</option>
                                                <option value="1992">1992</option>
                                                <option value="1993">1993</option>
                                                <option value="1994">1994</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                                <option value="1999">1999</option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                                <option value="2005">2005</option>
                                                <option value="2006">2006</option>
                                                <option value="2007">2007</option>
                                                <option value="2008">2008</option>
                                                <option value="2009">2009</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <span id="errorAddress">Địa Chỉ:</span>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" name="" id="add" class="form-control" value="" required="required" pattern="" title="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <span id="errorPassword">Mật Khẩu:</span>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="Password" name="" id="pass" class="form-control" value="" required="required" pattern="" title="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <span id="errorPassword-confirm">Xác Nhập Mật Khẩu:</span>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="Password" name="" id="pass-confirm" class="form-control" value="" required="required" pattern="" title="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" onclick="Check_New_User()" class="btn btn-primary">Đăng Kí</button>
                        </div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>