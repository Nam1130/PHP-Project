<!--    <div class="row">
       <div id="content">
    
                        <h2 style="text-align: center">
                            <b style="color: red;font-size: 40px;">SẢN PHẨM BÁN CHẠY</b>
                        </h2>
    
     -->


                        <?php

                       
                        $sql='select * from product, category where  product.category_id = category.id and category.id ='.$idcate;
                        $bc=array(); 
                        $bc=$db->view($sql); 

                        foreach ($bc as $key => $value) {
                           ?>
                                   <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product">
                            
                                        <div class="product-img">
                                            <a href="chitiet.php?idProduct=<?php echo $value['id']; ?>" class="thumbnail">
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
    
    
    
  <!--   </div> content
    
</div> -->