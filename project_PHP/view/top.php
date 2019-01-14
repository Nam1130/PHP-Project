<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="JavaScript/java.js"></script>
  <script src="JavaScript/check_error.js"></script>


  <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php
 session_start();  
 echo $_SESSION['name']; 
 
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
                  <a style="width: 30%;" href="displayCart.html">Giỏ Hàng <i class="glyphicon glyphicon-shopping-cart  hvr-grow a1"
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
              </div>
              <!-- /.navbar-collapse -->



            </div>
          </div>
        </div>


      </div>




    </div>
    <!-- container-fluid -->
  </div>

</body>

</html>