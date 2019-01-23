
                        <?php

                       
                        $sql='select product.id,product.prod_name,product.category_id,product.price,image from product, category
                         where  product.category_id = category.id and category.id ='.$idcate;
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
                                                <a href="chitiet.php">
                                                    
                                                </a>
                                            </div>
                                        </div>
                
                                    </div>
                           <?php
                        }

                    ?>
    
   