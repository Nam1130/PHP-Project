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
    

<body style="background-color: aliceblue;">

<?php   
     require "../model/product.php";
     $db=new product; 
     $cate=array(); 
    $sql = "SELECT cat_name FROM category";
    $cate = $db->view($sql);

    

?>

    <script>
        var tk =  sessionStorage.getItem('ten');
        window.onload = function () {
            // do stuff to load your form fields 
            document.getElementById("tk").innerHTML = tk;
        }
      </script>

    <div id="wapper">
        <div class="container-fluid">

            <div class="row fixtop">
                <?php
                require_once "top.php";

            ?>


               
            </div>
            <div class="row">
                <div class="row" style="margin-top: 140px;">
                    <div class="container">
                        <div class="page-header">
                            <center>
                                <h1>Đồng Hồ Nam<br><small>Sức Mạnh Cho Phái Mạnh.</small></h1>
                            </center>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                <center><img src="..\image\beck.jpg" class="img-responsive" alt="Image"></center>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">

                                <center>
                                    <h1>Thương Hiệu Đồng Hồ Nam</h1>
                                </center>

                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 thuonghieu">
                                    <div class="row">
                                        <button type="button" class="btn btn-default">CASIO</button>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-default">SEIKO</button>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-default">OP</button>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 thuonghieu">
                                    <div class="row">
                                        <button type="button" class="btn btn-default">TITAN</button>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-default">SKAGEN</button>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-default">TIMEX</button>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 thuonghieu">
                                    <div class="row">
                                        <button type="button" class="btn btn-default">X-MEN</button>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-default">DOXA</button>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="btn btn-default">POLICE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>





            <div class="row">
                    <div id="content">
    
                        <h2 style="text-align: center">
                            <b>SẢN PHẨM </b>
                        </h2>
    
                            
                        <?php

                       
                                $sql='select product.id,product.prod_name,product.category_id,product.price,image from product, category  where  product.category_id = category.id and category.id =1';
                                $bc=array(); 
                                $bc=$db->view($sql); 

                                foreach ($bc as $key => $value) {
                                ?>
                                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product">
                                    
                                                <div class="product-img">
                                                    <a href="chitiet.php?&idcate=1&idProduct=<?php echo $value['id']; ?>" class="thumbnail">
                                                        <img src="<?php echo $value['image'];?>" class="img-responsive hvr-pulse" alt="Image">
                                                        
                                                    </a>
                                                </div>
                                                <div class="caption">
                                                    <h3><?php echo $value['prod_name'];?></h3>
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
                    <?php include('bottom.php'); ?>
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
                                                <img class="media-object" src="../image/12.png" alt="Image">
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
</body>

</html>