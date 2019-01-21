<?php
  $conn = mysqli_connect("localhost", "root", "", "db");
  
  if(mysqli_connect_errno())
  {
    echo "Failed to connect: " . mysqli_connect_error();
  }  
  
  
  
?>



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
</head>

<body style="background-color: white;">


     <?php

          session_start();
         require "../model/card.php";
         $db=new card; 
         $arr=array(); 
         $arr=$db->display("slides"); 
            
         $dhMy=array(); 
         $sql = "SELECT name FROM provided WHERE address  =  'Mĩ'";
         $dhMy = $db->view($sql);

         $dhDuc=array(); 
         $sql = "SELECT name FROM provided WHERE address  =  'Đức'";
         $dhDuc = $db->view($sql);

         $dhThuySy=array(); 
         $sql = "SELECT name FROM provided WHERE address  =  'Thụy Sỹ'";
         $dhThuySy = $db->view($sql);

         $dhNhat=array(); 
         $sql = "SELECT name FROM provided WHERE address  =  'Nhật'";
         $dhNhat = $db->view($sql);


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

            </div>  //header

            <div class="row">          
                
            </div>


            <div class="row">

               <div id="content">

                    <h2 style="text-align: center">
                        <b style="color: red;font-size: 40px;">KẾT QUẢ TÌM KIẾM</b>
                    </h2>

                    <?php

                //error_reporting(0);

                    $output = ' ';

                    if($_POST['term'] !== "" )
                      { 
                         $searchq = $_POST['term']; 
                          
                          $q = mysqli_query($conn, "SELECT * FROM product WHERE prod_name LIKE '%$searchq%'") or die (mysqli_error($conn));   
                          $c = mysqli_num_rows($q);
                          if($c == 0)
                            {
                              $output = 'No search results for <b>"' . $searchq . '"</b>'; 
                            echo  'NO data found';
                          }  
                          
                          else 
                          {
                              while($row = mysqli_fetch_array($q))
                              {
                                $prod_name = $row['prod_name']; 
                                $price = $row['price']; 
                                $image = $row['image'];
                                
                                $idSp = $row['id'];
                                $cateId = $row['category_id'];

                                 ?>
                                 
                                 $output .= ' <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 product">
                                 <div class="product-img">
                                        <a style = "height: 286px;" href="chitiet.php?idProduct=<?php echo $idSp; ?>&idcate= <?php  echo $cateId; ?>" class="thumbnail">
                                            <img src="<?php echo $image; ?>" class="img-responsive hvr-pulse" alt="Image">
                                        </a>
                                    </div>

                                 
                        
                                   
                                    <div class="caption">
                                        <h3><?php echo $prod_name?> </h3>
                                        <div class="cost"><?php echo $price;?></div>
                                          <div class="bt-cost">

                                              <button type="button" href="chitiet.html" data-toggle="modal" data-target="#myModal" class="btn btn-success"> 
                                                  Mua Ngay</button>
                                                  
                                          </div>
                                        </div>

                                    </div>';<?php
                                
                                
                
                              }


                          }                   
                      }   
                       else
                            {
                              
                            }
                      print("$output");
                      mysqli_close($conn);
                       

                    ?>
              </div>
            </div>

            <div class="row">

 <button type="button" onclick="window.location.href='chitiet.php'" data-toggle="modal" data-target="#myModal" class="btn btn-success" >
                                                  Mua Ngay</button>
                 
            </div>

                
            <div class="row">

                <?php include('bottom.php'); ?>
            </div>

        </div>
  </div> 


</body> 

</html>