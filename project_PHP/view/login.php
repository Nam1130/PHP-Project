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
    .fa-facebook {
    background: #3B5998;
    color: white;
    }
    .fa-google {
    background: #dd4b39;
    color: white;
    }
    .btn,.fa {
        
        padding: 25px;
        font-size: 30px;
        width: 540px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        }
    .row{
         margin-top: 20px;
    }
    .btn,.social{
        margin-left:5px;
    }
    </style>
</head>

<body>

  <div style= " background: rgb(112, 112, 117);" id="wapper">
    <div class="container-fluid">
        
        <div style= " margin-top:20px;margin-bottom:20px;padding:15px;background: white;" class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-md-offset-3">
        <form action="" method="POST" role="form">
            <legend style = " text-align: center;font-size: 30px;">Đăng Nhập</legend>
        
            <div class="form-group">
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
                
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <span id = "error"></span>
                    </div>
                </div>
               
                <label class="pull-right">
                        <a href="#">Quên Mật Khẩu?</a>
                </label>

                </div>
                       
                       <div class="row">
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng Nhập</button>
                       </div>
                       
                    <div class="social-login-content">
                        <div class="social">
                            
                            <div class="row">
                             <a  href="#" class="fa fa-facebook"></a>
                            </div>
                            
                            <div class="row">
                                <a  href="#" class="fa fa-google"></a>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                    <div class="register-link m-t-15 text-center">
                        <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                    </div>
                    </div>
                    
                   
                </div>
            
            
        </form>
        </div>
        
        
        

        
    </div>    
        

    <!-- container-fluid -->
  </div>

</body>

</html>