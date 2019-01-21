<!DOCTYPE html>
<html>

<head>
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

<body style="background-color: white;">

    <?php
    session_start();
         require "../model/slides.php";
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

         
       

         $cate=array(); 
         $sql = "SELECT cat_name FROM category";
         $cate = $db->view($sql);

         if(isset($_SESSION['cus_name'])){
           $cus_name = $_SESSION['cus_name'];
         }


    ?>


    <div id="wapper">
        <div class="container-fluid">

        <div style = "width: 100%;margin-left: -15px;margin-right: -30px;"  class="row fixtop">


         <?php
               require_once "top.php";

          ?>

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
                                 <div  id="<?php echo $value['id']; ?>" class="col-xs-6 col-sm-3 col-md-3 col-lg-3 product">
                        
                                    <div class="product-img">
                                        <a style = "height: 286px;" href="chitiet.php?idProduct=<?php echo $value['id']; ?>&idcate=<?php  echo $value['category_id']; ?>" class="thumbnail">
                                            <img data-target="image" src="<?php echo $value['image'];?>" class="img-responsive hvr-pulse" alt="Image">
                                            
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h3 data-target="prod_name"><?php echo $value['prod_name'];?> </h3>
                                        <div data-target="price" class="cost"><?php echo number_format($value['price']).' VNĐ';?></div>
                                        <div class="bt-cost">

                                           
                                                <a style = "width: 70%;" href="#" data-role="view" data-id="<?php echo $value['id'] ;?>" data-toggle="modal" data-target="#myModal" class="btn btn-success">Mua Ngay</a>
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
                         <?php include('bestSeller.php'); ?>    
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
                                <div id = "modal" class="modal-body">  

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                   
   

</body>
        <script>
                    

            $(document).on('click','a[data-role=view]',function(){
                    var id  = $(this).data('id');
                   
                    muaNgay(id);
            });
                    function muaNgay(id)  
                    {  
                        $.ajax({  
                            url:"modal_muaNgay.php",  
                            method:"POST",  
                            data:{id:id},  
                            dataType:"text",  
                            success:function(data){  
                                $('#modal').html(data);  
                            }  
                         });  
                     }

        </script>
</html>