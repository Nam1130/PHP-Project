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

<body style="background-color: aliceblue;">

    <script>
        var list2 = sessionStorage.getItem('list1');
        var arrlist = JSON.parse(list2);

        var sl = sessionStorage.getItem('SLpage2');
        var leng = 0;

        var tk =  sessionStorage.getItem('ten');
        

    </script>

    <?php   
     session_start();
         require "../model/card.php";
         require "../model/function.php";
         
         $db = new card;
         if(isset( $_SESSION['id_cus'])){
            $id_cus =  $_SESSION['id_cus'];

            $sql = 'select product.id, product.prod_name,product.price,prod_orders.quantity from
            product,prod_orders,orders where product.id = prod_orders.prod_id 
           and prod_orders.status = 1 and prod_orders.order_id = orders.id and orders.cus_id ='. $id_cus;
           $arr = $db->view($sql);
  
         }
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

            
    <div style = "margin-top: 0px;" class="container">
        <div class="row xemGioHang">

          <div class="row">


              <div style="width: 100%;" class="container-fluid">
                  <h1 class="title">
                      <span>Giỏ Hàng</span>
                  </h1>
              </div>
          </div>


         


          <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-md-offset-1">

                  <div id="live_data"></div>
                              

                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

                  <div style="width: 100%" class="panel panel-danger tinhtien">

                      <div class="panel-body">

                          <div style="border-bottom: 1px solid blue" class="row">
                              <i style=>Thành tiền</i>
                              <i style="float: right;color: red">00 VND</i> <i class="tien" style="float: right;color: red">0</i>
                          </div>
                          <div class="row">
                              <i style=>Tổng</i>
                              <i style="float: right;">00 VND</i> <i class="tien" style="float: right;color: black">0</i>
                          </div>

                          <div class="row">
                              <button style="margin-top: 10%; margin-left: 20%; width: 60%;" type="button" class="btn btn-danger"> Đặt Hàng</button>
                          </div>




                      </div>
                  </div>

              </div>

          </div>

    


  </div>


<div class="row">
        <div id="content">

            <h2 style="text-align: center">
                <b>CÓ THỂ BẠN QUAN TÂM</b>
            </h2>

            <?php include('bestSeller.php'); ?>



        </div> <!-- content -->

    </div>



</div>


  </div>
            


            <div class="row">
                <?php include('bottom.php'); ?>
            </div>
            



        </div><!-- container-fluid -->
    </div>
    <!-- wapper -->
  <script>
       function fetch_data()  
      {  
           $.ajax({  
                url:"tableCart.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      } 
     fetch_data();

     function edit_data(id, quantity)  
      {  
           $.ajax({  
                url:"updateCart.php",  
                method:"POST",  
                data:{id:id, quantity:quantity},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }
      $(document).on('click', '.btn_upload', function(){  
         
           var id = $('#id').data("id1");  
           var quantity = $('#quantity').data("id5"); 

           alert(id);  
           edit_data(id,quantity);  
      });
  
  </script>

    <script src="java.js"></script>
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