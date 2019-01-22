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
    .icon {
      height: 400px;
      width: 300px;
    }
    
    .a {
      margin: 40px;
    }
    
    img {
      height: 300px;
    }
    
    .row {
      margin: 15px;
    }
    
    .error {
      color: #FF0000;
      margin-left: 50px;
    }
  </style>
</head>

<body>

    <?php
        require "../model/card.php";
        
        $order_id;

        if (isset($_GET['order_id']))
        {
            $order_id = $_GET['order_id'];
        }
        
        $db = new card;
        if (isset($_GET['order_id']))
        {
            $order_id = $_GET['order_id'];

              $sql = "SELECT prod_orders.prod_id,orders.id,orders.cus_id,product.prod_name, product.price, prod_orders.quantity,customer.cus_name from customer, product, orders,prod_orders, bills 
                where bills.order_id =  orders.id and orders.id = prod_orders.order_id and prod_orders.prod_id = product.id and  orders.id =' $order_id' and  orders.cus_id= customer.id group by prod_orders.prod_id";
 
                           
              $arr = $db->view($sql);

              $msql = "SELECT customer.id,customer.cus_name, bills.order_id from customer, orders, bills where customer.id = orders.cus_id and bills.order_id = '$order_id' and orders.id = bills.order_id";
              $arrs = $db->view($msql);

              foreach ($arrs as $key => $value2) {
                $cas_name= $value2['cus_name'];
                $order = $value2['order_id'];
                $cus = $value2['id'];  
                
            }

        }
    ?>



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
  </div>
  <!-- /.navbar-collapse -->
</nav>


</div>
  <div class="container">
   

    <div>
      <p style="text-align: center;font-size: 40px;color: blue;"><b>Chi tiết đơn đặt hàng</b></p>
      <div>

        <div>
          <!-- hiển thị sản phẩm -->
          <div>
            <div class="row">

              <div class="row">
                <h3>Mã đơn hàng: <?php echo $order; ?> </h3>
                <h3>Khách hàng: Mã số: <?php echo $cus; ?> - Tên: <?php echo $cas_name; ?></h3>


              </div>
              <table class="table table-hover table-bordered">


                <thead>
                  <tr> 
                   
                    
                    <th>Mã Sản phẩm</th>
                    <th>Tên Số lượng</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Tùy chỉnh</th>

                  </tr>
                </thead>
                <tbody>
                    <?php 

                        foreach ($arr as $key => $value) {
                            ?>
                                <tr>
                                  <td>
                                    <?php echo $value['prod_id']; ?>
                                  </td>
                                  <td>
                                     <?php echo $value['prod_name']; ?>
                                  </td>
                                  <td>
                                     <?php echo $value['quantity']; ?>
                                  </td>
                                  <td>
                                     <?php echo  number_format($value['price'])." VND"; ?>
                                  </td>
                                  <td> 
                                      <a href="edit_bill.php?order_id=<?php echo $value['id']; ?>">Chỉnh sữa</a> | 
                                      <a href="order.php?order_id=<?php echo $value['id']; ?>">Xóa</a> 
                                  </td>
                                </tr>
                            <?php
                        }

                    ?>
                  
                 

                </tbody>
              </table>

            </div>

          </div>

        </div>


      </div>
    </div>
 
  </div>

</body>

</html>