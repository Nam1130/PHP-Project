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

    .btn {
        
        padding: 25px;
        font-size: 30px;
        width: 500px;
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
    .error{
        color:red;
    }
    </style>
</head>

<body>
<?php  
  
  require "../model/users.php";
      $data = new users;
      $success_message = '';
      $home_url = 'login.php';
     

 if(isset($_POST["submit"])){
   
     $cus_name     =     mysqli_real_escape_string($data->conn, $_POST['cus_name']) ; 
     $user_name    =     mysqli_real_escape_string($data->conn, $_POST['user_name']);
     $password     =     mysqli_real_escape_string($data->conn, $_POST['password']);
     $address      =     mysqli_real_escape_string($data->conn, $_POST['address']);
     $email        =     mysqli_real_escape_string($data->conn, $_POST['email']);
     $sdt          =     mysqli_real_escape_string($data->conn, $_POST['phone']);

     $result = $data->register($cus_name, $user_name, $password, $address,  $email, $sdt);
    
    
}

 ?>

  <div style= " background: rgb(112, 112, 117);" id="wapper">
    <div class="container-fluid">
        
        <div style= " margin-top:20px;margin-bottom:20px;padding:15px;background: white;" class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-md-offset-3">
        <form action="" method="POST" role="form">
            <legend style = " text-align: center;font-size: 30px;">Đăng Kí</legend>
        
            <div class="form-group">
                 
                 <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span id="errname">Họ Và Tên:</span>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="cus_name" id="input_name" class="form-control" value="" >
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span id="errname">Tên Đăng Nhập:</span>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="user_name" id="input_name" class="form-control" value="" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span id="errname">Email:</span>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="email" name="email" id="input_name" class="form-control" value="" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span id="errpass">Mật khẩu:</span>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="Password" name="password" id="input_pass" class="form-control" value="" >
                
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span id="errname">Địa Chỉ:</span>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="address" id="input_name" class="form-control" value="" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <span id="errname">Số Điện Thoại:</span>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="number" name="phone" id="input_name" class="form-control" value="" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 error">
                        <span ><?php echo $data->error;  ?></span>
                    </div>
                </div>
               
              <?php
              
              if(isset($result)){
                if($result){

                    $success_message = "Post Inserted";
                    echo "<div class='alert alert-info'>";
                        echo "Đăng Kí Thành Công. <a href='{$home_url}'>Mời Đăng Nhập</a>.";
                    echo "</div>";
                    }else{
                    echo "<div class='alert alert-danger' role='alert'>Đăng kí thất bại, vui lòng thử lại.</div>";
                }

              }
               
            ?>

                </div>
                       
                       <div class="row">
                            <button type="submit"name = "submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng Kí</button>
                       </div>
                       
                    <div class="row">
                    <div class="register-link m-t-15 text-center">
                        <p>Already have account ?  <a href="login.php"> Sign in</a></p>
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