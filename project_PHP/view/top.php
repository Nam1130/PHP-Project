<div class="row">
            <div style = "margin-left: -20px; width: 100%;" id="header">
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 logo">

                <!-- <img style="margin: 20px 0px 20px 20px;" src="image\tissot-logo.png" class="img-responsive" alt="Image"> -->
                <a href="index.php"><img style="margin: 20px 0px 20px 20px;" src="image\tissot-logo.png" class="img-responsive" alt="Image">
                </a>
              </div>

              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="row">
                  <div class="bar">
                    <a style="width: 30%;" href="#news">Vị Trí <i class="glyphicon glyphicon-map-marker hvr-grow a"></i></a>
                    <a style="width: 40%;"  href="login.php"><span id="tk">Xin chào <?php  echo $_SESSION['name'] ?></span>  <i class="glyphicon glyphicon-user  hvr-grow a"></i></a>
                    <a style="width: 30%;" href="displayCart.php">Giỏ Hàng <i class="glyphicon glyphicon-shopping-cart  hvr-grow a1"
                              onclick="displayProduct()"></i><i id="cart">0</i>
                      </a>

                  </div>
                </div>
                <div class="row">

                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 offset-1">
                    <div class="row">
                      <div class="search">
                          <form action="searchres.php" method="post">
                              <input type="text" placeholder="Search" name="term"/>

                              <span class="input-group-btn">
                                  <button style="float: left" class="btn btn-danger" type="submit" ">

                                    <span class=" glyphicon glyphicon-search"></span>

                                  </button>
                              </span>
                          </form>
                      </div>

                    </div>
                    <!--row -->

                  </div>


                </div>

              </div>

            </div>
            <!-- header -->
          </div>


          <div style="margin-left: 5px; margin-right: 3px;" class="row">
            <div class="row">
              <div class="row na1">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                  <nav style="background-color: aliceblue;" class="navbar navbar-default" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <button style="float: left;margin-left: 12px" type="button" class="navbar-toggle glyphicon glyphicon-shopping-cart">
                      </button>
                      <button style="float: left;" type="button" class="navbar-toggle glyphicon glyphicon-user">
                      </button>
                      <button style="float: left;" type="button" class="navbar-toggle glyphicon glyphicon-map-marker">
                      </button>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                      <ul class="nav navbar-nav menu">
                        <li class="search2">
                          <div class="input-group">
                            <input style="margin-left: 5px;" type="text" class="  search-query form-control" placeholder="Search" name="term" id="term" />
                            <span class="input-group-btn">
                                          <button style="margin-right: 5px;" class="btn btn-danger" type="submit">
                                              <span class=" glyphicon glyphicon-search"></span>
                            </button>
                            </span>


                            <?php
                                if(isset($_POST["submit"]))  {

                                   include('search.php');
                                }  

                            ?>
                          </div>
                        </li>
                        <li class="menufull"><a href="javascript:void(0)">Thương Hiệu</a>

                          <div class="row">

                            <ul style="width: 1050%;" class="nav navbar-nav menu-sub-full">
                              <div class="row-fluid">

                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                  <li style="width: 200%;" class="media">
                                    <div class="media-body">

                                      <ul class="unstyled">
                                        <li>
                                          <h4 href="#">Đồng Hồ Mĩ</h4>
                                        </li>
                                        <?php   
                                          foreach ($dhMy as $key => $value) {
                                            ?>
                                                <li><a href="#"><?php  echo $value['name'] ;?> </a></li>
                                            <?php
                                          }
                                        
                                        ?>

                                      
                                        
                                      </ul>
                                    </div>
                                  </li>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                  <li style="width: 200%;" class="media">
                                    <div class="media-body">

                                      <ul class="unstyled">
                                        <li>
                                          <h4 href="#">Đồng Hồ Đức</h4>
                                        </li>
                                        <?php   
                                          foreach ($dhDuc as $key => $value) {
                                            ?>
                                                <li><a href="#"><?php  echo $value['name'] ;?> </a></li>
                                            <?php
                                          }
                                        
                                        ?>
                                          
                                      </ul>
                                    </div>
                                  </li>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                  <li style="width: 200%;" class="media">
                                    <div class="media-body">

                                      <ul class="unstyled">
                                        <li>
                                          <h4 href="#">Đồng Hồ Thụy Sỹ</h4>
                                        </li>
                                        <?php   
                                          foreach ($dhThuySy as $key => $value) {
                                            ?>
                                                <li><a href="#"><?php  echo $value['name'] ;?> </a></li>
                                            <?php
                                          }
                                        
                                        ?>
                                          
                                      </ul>
                                    </div>
                                  </li>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                  <li style="width: 200%;" class="media">
                                    <div class="media-body">

                                      <ul class="unstyled">
                                        <li>
                                          <h4 href="#">Đồng Hồ Nhật</h4>
                                        </li>

                                        <?php   
                                          foreach ($dhNhat as $key => $value) {
                                            ?>
                                                <li><a href="#"><?php  echo $value['name'] ;?> </a></li>
                                            <?php
                                          }
                                        
                                        ?>

                                      </ul>
                                    </div>
                                  </li>
                                </div>


                              </div>
                            </ul>

                          </div>

                        </li>
                                      <?php   
                                          foreach ($cate as $key => $value) {
                                            ?>
                                                <li><a href="Man.php"><?php  echo $value['cat_name'] ;?> </a></li>
                                                
                                            <?php
                                          }
                                        
                                        ?>
                          <ul class="nav navbar-nav menu-sub">
                            <li><a href="#">Dây Da ZRC</a></li>
                            <li><a href="#">Dây Da Hir</a></li>
                            <li><a href="#">Hộp Đồng Hồ</a></li>
                          </ul>

                        </li>
                        <li class="menu2"> <a>Liên Hệ</a>
                          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a> -->

                          <ul class="nav navbar-nav menu-sub">
                            <li><a href="#">Thông Tin LH</a></li>
                            <li><a href="#">Góp ý</a></li>

                          </ul>

                        </li>

                      </ul>

                    </div>
                  </nav>
                </div>
                <!-- /.navbar-collapse -->



              </div>
            </div>
          </div>
