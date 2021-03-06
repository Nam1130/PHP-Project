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
  .error {
        color: #FF0000;
        
       margin-left: 50px;
    }
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
   .row{
       margin: 15px;
   }
    </style>
</head>

<body>

    <?php
        session_start();
        require "../model/function.php";
        require "../model/product.php";
        $product = new product;
        
        $idProduct = $_GET['idProduct'];
    
        
        $nameSpErr = $note1Err = $priceErr = $slErr = $statusErr=$dateErr=$idCateErr = "";
        $nameSp  = $status = $note1 = $cate_name  = "";
        $price = $sl = 0;
        $date;
        $id_cate ;
        $err = array(); 
    
          //xuất dữ liệu cần update
          if (isset($_GET['idProduct']))
          {
              $idProduct = $_GET['idProduct'];
              $sql = "SELECT * FROM product WHERE id  = " . $idProduct;
              $array = $product->view($sql);
    
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
             
          }
    
        //upload ảnh
        if(isset($_FILES["fileToUpload"])){
            
            $link_image = image();
           $_SESSION['image'] = $link_image;
    
         }
    
         
        
       //check thông tin
             if(isset($_POST['update'])) 
             { 
                
                
                 if (empty($_POST["nameSp"])) {
                     $nameSpErr = "Nhập Tên sản phẩm";
                 } else {
                     $nameSp = trim(($_POST["nameSp"]));
                    
                 }
                
                 if (empty($_POST["price"])) {
                     $priceErr = "Nhập Giá";
                 } else {
                     $price = ($_POST["price"]);
                 }
    
    
                 if (empty($_POST["id_cate"])) {
                     $idCateErr = "Nhập id thể loại";
                 } else {
                     $id_cate = ($_POST["id_cate"]);
                    
                 }
    
                 if (empty($_POST["sl"])) {
                    $slErr = "Nhập số lượng";
                } else {
                    $sl = ($_POST["sl"]);
                   
                }
               
                if (empty($_POST["status"])) {
                    $statusErr = "Nhập Tình Trạng";
                } else {
                    $status = ($_POST["status"]);
                }
    
    
                if (empty($_POST["note1"])) {
                   
                } else {
                    $note1 = ($_POST["note1"]);
                }
              
                if (empty($_POST["date"])) {
                    $dateErr = "Nhập ngày";
                } else {
                    $date = ($_POST["date"]);
                 
                }
    
    
                if(empty($nameSpErr) && empty($priceErr)&& empty($idCateErr)&&empty($slErr) && empty($statusErr)&& empty($dateErr)&& isset($_SESSION['image'])){
                   
                        $link_image = $_SESSION['image'];
                        $sql = "UPDATE product SET prod_name = '$nameSp', category_id = $id_cate, price =$price, quantity = $sl, status = '$status', imported_date = '$date', note = '$note1', image = '$link_image' WHERE id = $idProduct";
                        $product->excute($sql);
                        echo "<script type='text/javascript' >"; 
                        echo "{";
                            echo "alert('Cập nhật thành công');"; 
                          
                        echo "}";
                    echo "</script>"; 
                    
                }else{
                    $err = "Cập nhật thất bại! Cần điền đầy đủ thông tin";
                }
             };
    
           
            // trở về trang chủ
            if (isset($_POST['back']))
            {
                header('Location: product.php');
    
            }
        
       
    ?>


  
<div class="container">
      
    <div class="row">
          
            
    <nav class="navbar navbar-default" role="navigation">
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
                       
                        <li><a href="display_amin.php">Trang Chủ</a></li>
                        <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản Phẩm <b class="caret"></b></a>
                             <ul class="dropdown-menu">
                                 <li><a href="add_product.php">Thêm mới sản phẩm</a></li>
                                 <li><a href="product.php">Xem sản phẩm</a></li>
                             </ul>
                         </li>
                       
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

    
            
    <div style = "margin-top: 10px;" class="container">
     
    <div class="panel panel-danger">
          
          <div class="panel-body">

          
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                
              
                    <a href="#" class="thumbnail">
                        <?php
                            if (empty($err)) {
                                ?>
                                <img style= " width: 200px; height: 300px;" src="<?php echo $link_image; ?>">
                                <?php
                            }
                        ?>
                          <form method="post" enctype="multipart/form-data" action="">
                   
                
                            <div class="form-group">
                            <input style= " width: 75px;margin-left: 90px;" type="file" name="fileToUpload" id="fileToUpload" size="35">
                            </div>
                        
                            <input style= "margin-left: 90px;" type="submit" value="Upload" name="upload">
                        </form>
                    </a>
                    <?php
                         if (!empty($err)) {
                        ?>
                         <b> <?php echo  $err['fileUpload']; ?> </b>
                        
                        <?php
                         }
                    ?>
                   
                   
                    
                
                  
                
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <form action="" method="POST" role="form">
                        <legend></legend>
                    
                        <div class="form-group">
                           
                            
                            <div class="row">
                                
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Tên sản phẩm:
                                </div>
                                
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    
                                    <input type="text" name="nameSp"  class="form-control" value=" <?php echo $nameSp;  ?>"  >
                                    
                                </div>
                                
                            </div>
                              
                            <div class="row">
                                
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Mã thể loại:
                                </div>
                                
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    
                                   
                                   <select name="id_cate" id="id_cate" class="form-control" required="required">
                                     <?php
                                       
                                         $sql = "SELECT * FROM category WHERE id  = " . $id_cate;
                                         $arrCate = $product->view($sql);
                                        foreach ($arrCate as $key => $value) {
                                        ?>
                                            <option value= "<?php echo $value['id']; ?>"><?php echo $value['cat_name']; ?></option>
                                        <?php
                                        }
                                        $sql = "SELECT * FROM category WHERE id  != " . $id_cate;
                                        $arrCate = $product->view($sql);
                                        foreach ($arrCate as $key => $value) {
                                        ?>
                                            <option value= "<?php echo $value['id']; ?>"><?php echo $value['cat_name']; ?></option>
                                        <?php
                                        }

                                     ?>
                                    
                                   </select>
                                  
                                    
                                </div>
                                
                            </div>
                              
                            <div class="row">
                                
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Giá:
                                </div>
                                
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    
                                    <input type="number" name="price" class="form-control" value="<?php echo $price; ?>"  >
                                    
                                </div>
                                
                            </div>
                              
                            <div class="row">
                                
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Số lượng:
                                </div>
                                
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    
                                    <input type="number" name="sl"  class="form-control" value="<?php echo $sl; ?>"  >
                                    
                                </div>
                                
                            </div>
                              
                            <div class="row">
                                
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Tình trạng: 
                                </div>
                                
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    
                                    <input type="number" name="status" id="status" class="form-control" value="<?php echo $status; ?>"  >
                                    
                                </div>
                                
                            </div>
                              
                            <div class="row">
                                
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Ngày thêm:
                                </div>
                                
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    
                                    <input type="date" name="date"  class="form-control" value="<?php echo $date; ?>"  >
                                    
                                </div>
                                
                            </div>
                              
                            <div class="row">
                                
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Ghi chú:
                                </div>
                                
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    
                                    <input type="text" name="note1"  class="form-control" value="<?php echo $note1; ?>"  >
                                    
                                </div>
                                
                            </div>
                           
                        </div>
                    
                        
                    
                        <button style = "margin-left: 200px;" type="submit" name = "update"class="btn btn-primary">Sữa sản phẩm</button>
                        <button style = "margin-left: 350px;margin-top: -55px; width: 130px;" type="submit" name = "back"class="btn btn-primary">Quay lại</button>
                    </form>
            </div>
            
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                
                <div class="row error">
                    <?php echo $nameSpErr.'<br>';?>
                </div>
                <div class="row error">
                    <?php echo $priceErr;?>
                </div>
                <div class="row error">
                    <?php echo $slErr;?>
                </div>
                <div class="row error">
                    <?php echo $statusErr;?>
                </div>
               
                <div class="row error">
                    <?php echo $dateErr;?>
                </div>
                <div class="row error">
                    <?php echo $idCateErr;?>
                </div>
              
            </div>

          
               
               
               
          </div>
         
    </div>
    
 </div>
            

</div>
      





  
</body>

</html>