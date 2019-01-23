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
         $db = new card;
         $cate=array(); 
         $sql = "SELECT cat_name FROM category";
         $cate = $db->view($sql);


        ?>

    

    <div id="wapper">
        <div class="container-fluid">
                <div style = "width: 100%;margin-left: -15px;margin-right: -30px;"  class="row fixtop">

                    <?php
                        require_once "top.php";

                    ?>
                </div>
                
                <div class="row">
                    
                    
                    <div style = "margin-top: 200px;" class="panel panel-success">
                          <div class="panel-heading">
                                <h3 class="panel-title"><h3  style = "text-align: center;">Đặt Hàng Thành Công! </h3></h3>
                          </div>
                          <div  style = "text-align: center;height: ;" class="panel-body">
                              <h4>Cảm ơn quý khách đã mua hàng tại <b> TITISSOT</b></h4>
                              Mọi chi tiết xin liên hệ Sdt: 0902.111.357 hoặc Email:  titissot@gmail.vn 
                                
                              
                              <img style = "margin-left: 350px;" src="image/nhanhang.PNG" class="img-responsive" alt="Image">
                              
                          </div>
                          <a  style = "margin-left: 550px; margin-top: 30px; padding-bottom: 30px;" href="index.php" >
                              
                              <button type="submit" class="btn btn-success">Tiếp tục mua hàng</button>
                              
                          </a>
                    </div>
                    
                </div>
                
            


                <div style = " margin-bottom: 0px;" class="row">
                    <?php include('bottom.php'); ?>
                </div>
            

  
               


        </div><!-- container-fluid -->
    </div>
    <!-- wapper -->
  

    <script src="java.js"></script>
    
</body>

</html>