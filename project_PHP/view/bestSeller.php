<!--    <div class="row">
       <div id="content">
    
                        <h2 style="text-align: center">
                            <b style="color: red;font-size: 40px;">SẢN PHẨM BÁN CHẠY</b>
                        </h2>
    
     -->


                        <?php

                        $sql = 'select  *, sum(prod_orders.quantity) from product, prod_orders where product.id= prod_orders.prod_id
                             GROUP BY prod_orders.prod_id
                             ORDER BY Sum(prod_orders.quantity) DESC
                             limit 12';
                        $bc=array(); 
                        $bc=$db->view($sql); 

                        foreach ($bc as $key => $value) {
                           ?>
                                   <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product">
                            
                                        <div class="product-img">
                                            <a href="chitiet.php?idProduct=<?php echo $value['id']; ?>&idcate=<?php  echo $value['category_id']; ?>" class="thumbnail">
                                                <img src="<?php echo $value['image'];?>" class="img-responsive hvr-pulse" alt="Image">
                                                
                                            </a>
                                        </div>
                                        <div class="caption">
                                            <h3><?php echo $value['prod_name'];?></h3>
                                            <div class="cost"><?php echo number_format($value['price']).' VNĐ';?></div>
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
    
    
    
  <!--   </div> content
    
</div> -->