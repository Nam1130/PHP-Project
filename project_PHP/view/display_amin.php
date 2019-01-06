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
  <style>
      .icon{
        height: 400px;
        width: 300px;
       
      }
   .a{
    margin: 40px;
   }
   img{
       height: 300px;
   }
    </style>
</head>

<body>

  
  <div class="container">
      
      <div class="row">
          
            
            <nav style = "width:117%;margin-left:-100px;"class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                       
                        <li><a href="#">Trang Chủ</a></li>
                        <li><a href="#">Sản Phẩm</a></li>
                        <li><a href="#">Khách Hàng</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Tìm Kiếm</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Tài khoản</a></li>
                        <li><a href="#">Đăng Xuất</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            
          
      </div>

      <div>
            
            <div style = "" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 a">
                <a href="#" class="thumbnail icon">
                    <img style = " height: 300px;" src="../image/user.png" alt="">
                    <div>
                        <p style = "text-align: center;font-size: 30px;">User</p>
                    </div>
                </a>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 a">
                <a href="product.php" class="thumbnail icon">
                    <img style = " height: 300px;" src="../image/product.png" alt="">
                    <div>
                        <p style = "text-align: center;font-size: 30px;">Sản Phẩm</p>
                    </div>
                </a>
            </div>
            <div style = "margin-right: 30px;" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 a">
                <a href="#" class="thumbnail icon">
                    <img style = " height: 300px;" src="../image/Setting-icon.png" alt="">
                    <div>
                        <p style = "text-align: center;font-size: 30px;">Cài Đặt</p>
                    </div>
                </a>
            </div>
            

      </div>
      




  </div>
  
</body>

</html>