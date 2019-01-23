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
        $db=new card; 
        $arr=array(); 
        $arr=$db->display("bills");

        $bc=new card; 
        $arrs=array(); 
        $arrs=$bc->display("prod_orders"); 


//xoa
      
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
      <p style="text-align: center;font-size: 40px;color: blue;"><b>Danh sách đơn đặt hàng</b></p>
      <div>

        <div>
          <!-- hiển thị sản phẩm -->
          <div>
            <div class="row">

              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Giá</th>
                    <th>Tình trạng</th>
                    <!-- //<th>Tùy chỉnh</th> -->

                  </tr>
                </thead>
                <tbody>
                  <?php $count=0; foreach ($arr as $key=> $value) { 
                    $count ++; ?>
                  <tr>
                    <td>
                      <?php echo $count; ?>
                    </td>
                    <td>
                       <a href="billDetails.php?order_id=<?php echo $value['order_id']; ?>"><?php echo $value['order_id']; ?></a> 
                     
                    </td>
                    <td>
                      <?php echo $value[ 'imported_date']; ?>
                    </td>
                    <td>
                      <?php echo number_format($value[ 'price'])." VND"; ?>
                    </td>
                    <td>
                      <?php echo $value[ 'status']; ?>
                    </td>
                    <!-- <td> 
                        <a href="edit_bill.php?idBill=<?php echo $value['id']; ?>">Chỉnh sữa</a> | 
                        <a href="order.php?idBill=<?php echo $value['id']; ?>">Xóa</a> 
                    </td> -->
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