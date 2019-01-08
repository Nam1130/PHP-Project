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
         session_start();
        $namedm = $note = "";
        $nameErr = $success="";
        require "../../model/category.php";
        $db=new category; 
        $arr=array(); 
        $arr=$db->display("category"); 

        //xóa category
        if (isset($_GET['idCateDelete']))
        {
              $delete = $_GET['idCateDelete'];
              $sql = "DELETE  FROM category WHERE id  = " . $delete;
              $db->excute($sql);
              $arr=array();
              $arr=$db->display("category"); 
          }


//sữa category
        if (isset($_GET['idCate']))
        {
              $idCate = $_GET['idCate'];
              $_SESSION['idCate']= $idCate;
              $sql = "SELECT * FROM category WHERE id  = " . $idCate;
              $array = $db->view($sql);
    
              foreach ($array as $key => $value) {
                  $namedm= $value['cat_name']; 
                  $note= $value['note']; 
              }
        }

//sữa danh mục
        if(isset($_POST['updateDm']))
        { 
            if (!empty(trim($_POST["note"]))) {
                $note =trim($_POST["note"]);
            }
            if (empty(trim($_POST["namedm"]))) {
                $nameErr = "Vui lòng chọn danh mục sản phẩm muốn sữa!";
            }else {
                if(isset($_SESSION['idCate'])){
                  $idCate = $_SESSION['idCate'];
                  $namedm = ($_POST["namedm"]);
                  $sql = "UPDATE category SET cat_name = '$namedm',note = '$note' WHERE id = $idCate";
                  $db->excute($sql);
                  
                  $nameErr="";
                  unset($_SESSION['idCate']);
                  header('Location:view_category.php');
                  $success = "Sữa danh mục thành công";
                }else{
                  $nameErr = "Vui lòng chọn danh mục sản phẩm muốn sữa!";
                }
               

            }
        }

//thêm danh mục
      if(isset($_POST['addDm']))
      { 
        if (!empty(trim($_POST["note"]))) {
          $note =trim($_POST["note"]);
        }
        if (empty(trim($_POST["namedm"]))) {
          $nameErr = "Vui lòng nhập tên danh mục!";
        }else {
              $namedm = ($_POST["namedm"]);
              $db->inserCategory($namedm,$note);
              $nameErr="";
              header('Location:view_category.php');
              $success = "Thêm danh mục thành công";
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
      <p style="text-align: center;font-size: 40px;color: blue;"><b>Admin</b></p>
    </div>

       
       <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
          <div class="row">
                 <!-- hiển thị category -->
          
          <div style ="margin-top:20px;" class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">Danh Sách Danh Mục</h3>
              </div>
              <div class="panel-body">
              <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên danh mục</th>
                      <th>Ghi chú</th>
                      <th>Tùy chỉnh</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=0; foreach ($arr as $key=> $value) { $count ++; ?>
                    <tr>
                      <td>
                        <?php echo $count; ?>
                      </td>
                      <td>
                        <?php echo $value[ 'cat_name']; ?>
                      </td>
                      <td>
                        <?php echo $value[ 'note']; ?>
                      </td>
                      <td> 
                          <a href="view_category.php?idCate=<?php echo $value['id']; ?>">Chỉnh sữa</a> | 
                          <a href="view_category.php?idCateDelete=<?php echo $value['id']; ?>">Xóa</a> 
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
       
         
         <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                    
                    <div style ="margin-top:35px;" class="panel panel-success">
                        <div class="panel-heading">
                          <h3 class="panel-title">Sữa Danh Mục</h3>
                        </div>
                        <div class="panel-body">
                        <form action="view_category.php" method="POST" role="form">
                     
                    
                          <div class="form-group">
                            
                              <div class="row">
                                  
                                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                      Tên Danh Mục:
                                  </div>
                                  
                                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                      
                                      <input type="text" name="namedm"  class="form-control" value=" <?php echo $namedm;?>"  >
                                      
                                  </div>
                                                    
                              </div>
                              <div class="row">
                                  
                                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                      Ghi Chú:
                                  </div>
                                  
                                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                      
                                      <input type="text" name="note"  class="form-control" value=" <?php echo $note;  ?>"  >
                                      
                                  </div>
                                                    
                              </div>
                          </div>
                        
                          <div class="row error">
                                <?php echo $nameErr;?>
                          </div>
                          <div class="row error">
                                <?php echo $success;?>
                          </div>
                         
                          <button style="margin-left: 170px;margin-top:15px;" type="submit" name ="addDm" class="btn btn-primary">Thêm Danh Mục</button>
                     <button style="margin-left: 360px;margin-top: -50px;" type="submit" name ="updateDm" class="btn btn-primary">Sữa Danh Mục</button>
                   </form>
                        </div>
                    </div>
                    
                    
                   
                    
         </div>
         
           

          

        


    </div>
    



</body>

</html>