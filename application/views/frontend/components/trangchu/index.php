<section id="menu-slider"> 
   <div class="slider">
        <div class="container">
           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 list-menu pull-left">
            <div class="widget" style="margin: 0px ; min-height: 0px;">
            <p>Danh mục sản phẩm</p>
            <?php
            $listcat = $this->Mcategory->category_menu(0);
            $html_menu='<ul class="main-ul">';
            foreach ($listcat as $menu) {
                $parentid = $menu['id'];
                $submenu = $this->Mcategory->category_menu($parentid);
                $html_menu.='<li>';
                $html_menu.="<a href='san-pham/".$menu['link']." ' title=' ".$menu['name']."'>";
                $html_menu.=$menu['name'];
                if(!empty($submenu)){
                    $html_menu.='<i class="fa fa-angle-right pull-right" aria-hidden="true">';
                }
                $html_menu.='</i>';
                $html_menu.="</a>";
                if(count($submenu))
                {
                    $html_menu.='<ul class="sub">';
                    foreach ($submenu as $menu1){
                        $html_menu.='<li>';
                        $html_menu.="<a href='san-pham/".$menu1['link']." ' title=' ".$menu1['name']." '> ".$menu1['name']."</a>";
                        $html_menu.="</li>";    
                    }
                    $html_menu.="</ul>";
                }
                $html_menu.="</li>";
            }
            $html_menu.="</ul>";
            echo $html_menu;
            ?>  
            </div>              
            </div>
         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 slider-main pull-left">
            <?php 
            $this->load->view('frontend/modules/slider');
            ?>
        </div>
    </div>
</div> 
<div class="banner-product">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img src="public/images/sp1.jpg">
            </div>
        </div>
    </div>
<div class="container" style="margin-top: 20px;">
    <div class="sale-title">
        <span class="bg">SẢN PHẨM KHUYẾN MÃI HOT</span>
    </div>
</div>
<div class="container" style="margin-bottom: 10px;">
    <div class="owl-carousel owl-carousel-product owl-theme" style="border: 1px solid #FCC52B;">
        <?php 
        $product_sale = $this->Mproduct->product_sale(10);
        foreach ($product_sale as $row) :?>
            <div class="item" style="margin: 0px;">
                <div class="products-sale">
                    <div class="lt-product-group-image"> 
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" >
                            <img style="height: 300px" class="img-p"src="public/images/products/<?php echo $row['avatar'] ?>" alt="">
                            <span class="text-tra-gop-0"><i class="fas fa-bolt"></i> Trả góp 0%</span>
                        </a>

                        <?php if($row['sale'] > 0) :?>
                            <div class="giam-percent">
                                <span class="text-giam-percent">-<?php echo $row['sale'] ?>%</span>
                            </div>
                        <?php endif; ?>
                          
                    </div>
                    <div class="lt-product-group-info">
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" style="text-align: left;">
                            <h3><?php echo $row['name'] ?></h3>
                        </a>
                        <div class="price-box">
                            <?php if($row['sale'] > 0) :?>

                                <p class="old-price">
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price"><?php echo(number_format($row['price_sale'])); ?>₫</span>
                                </p>
                                <?php else: ?>
                                 <p class="old-price">
                                    <span class="price" style="color: #fff"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>

                            <?php endif;?>
                             <div class="hidenitem">
                                 <a href="<?php echo $row['alias'] ?>">
                                <p class="iconstar"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fa fa-star"></i></p>
                              
                                <p class="trangthai"> <?php if($row['number'] - $row['number_buy']==0 || $row['status'] == 0) echo 'Hết hàng'; else echo 'Còn hàng' ?></p>
                                </a>
                             </div>
                        </div>
                          
                        <div class="clear"></div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container" style="margin-top: 20px;">
    <div class="sale-title">
        <span>SẢN PHẨM BÁN CHẠY</span>
    </div>
</div>
<div class="container" style="margin-bottom: 20px;">
    <div class="owl-carousel owl-carousel-product owl-theme" style="border: 1px solid #FCC52B;">
        <?php 
        $product_sale = $this->Mproduct->product_selling(10);
        foreach ($product_sale as $row) :?>
            <div class="item" style="margin: 0px;">
                <div class="products-sale">
                    <div class="lt-product-group-image">
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" >
                            <img style="height: 280px" class="img-p"src="public/images/products/<?php echo $row['avatar'] ?>" alt="">
                            <span class="text-tra-gop-0"><i class="fas fa-bolt"></i>Trả góp 0%</span>
                        </a>
                        <?php if($row['sale'] > 0) :?>
                            <div class="giam-percent">
                                <span class="text-giam-percent">-<?php echo $row['sale'] ?>%</span>
                            </div>
                        <?php endif; ?>
                         
                    </div>
                    <div class="lt-product-group-info">
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" style="text-align: left;">
                            <h3><?php echo $row['name'] ?></h3>
                        </a>
                        <div class="price-box">
                            <?php if($row['sale'] > 0) :?>

                                <p class="old-price">
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price"><?php echo(number_format($row['price_sale'])); ?>₫</span>
                                </p>
                                <?php else: ?>
                                 <p class="old-price">
                                    <span class="price" style="color: #fff"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                            <?php endif;?>
                            <div class="hidenitem">
                                 <a href="<?php echo $row['alias'] ?>">
                                <p class="iconstar"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
                              
                                <p class="trangthai"> <?php if($row['number'] - $row['number_buy']==0 || $row['status'] == 0) echo 'Hết hàng'; else echo 'Còn hàng' ?></p>
                                </a>
                             </div>
                        </div>
                           
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>

</section>
<div id="content">
    <div class="container">
        <?php 
        $listCategory=$this->Mcategory->category_list(0,'10');
        foreach ($listCategory as $rowCategory):
            // row dien thoai
            $subCategory=$this->Mcategory->category_list($rowCategory['id'],'10');
            // Id dien thoai
            $catId=$this->Mcategory->category_id($rowCategory['link']);
            // list id dt ss, apple,...
            $listCatId=$this->Mcategory->category_listcat($catId);
            // list dt ss, apple
            $listProducts=$this->Mproduct->product_home_limit($listCatId,10);
            if((count($listProducts) >= 3)):?>
                <div class="list-product">
                    <div class="list-header-z">
                        <h2><a href="<?php echo  $rowCategory['link']?>"><?php echo  $rowCategory['name']?> nổi bật</a></h2>
                        <ul class="sub-category">
                            <?php foreach ($subCategory as $rowSubCategory) :?>
                                <li>
                                    <a href="san-pham/<?php echo $rowSubCategory['link'] ?>" 
                                        title="<?php echo $rowSubCategory['name'] ?>"
                                        class="ws-nw overflow ellipsis"
                                        >
                                        <?php echo $rowSubCategory['name'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="product-container">
                        <?php foreach ($listProducts as $sp) :?>
                            <div class="p-box-5">
                                <div class="product-lt">
                                    <div class="lt-product-group-image">
                                        <a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" >
                                            <img style="height: 280px" class="img-p"src="public/images/products/<?php echo $sp['avatar'] ?>" alt="">
                                            <span class="text-tra-gop-0"><i class="fas fa-bolt"></i> Trả góp 0%</span>
                                        </a>

                                        <?php if($sp['sale'] > 0) :?>
                                            <div class="giam-percent">
                                                <span class="text-giam-percent">-<?php echo $sp['sale'] ?>%</span>
                                            </div>
                                        <?php endif; ?>
                                         
                                    </div>

                                    <div class="lt-product-group-info">
                                        <a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" style="text-align: left;">
                                            <h3><?php echo $sp['name'] ?></h3>
                                        </a>
                                        <div class="price-box">
                                            <?php if($sp['sale'] > 0) :?>

                                                <p class="old-price">
                                                    <span class="price"><?php echo(number_format($sp['price'])); ?>₫</span>
                                                </p>
                                                <p class="special-price">
                                                    <span class="price"><?php echo(number_format($sp['price_sale'])); ?>₫</span>
                                                </p>
                                                <?php else: ?>
                                                 <p class="old-price">
                                                    <span class="price" style="color: #fff"><?php echo(number_format($sp['price'])); ?>₫</span>
                                                </p>
                                                <p class="special-price">
                                                    <span class="price"><?php echo(number_format($sp['price'])); ?>₫</span>
                                                </p>
                                            <?php endif;?>
                                            <div class="hidenitem">
                                             <a href="<?php echo $row['alias'] ?>">
                                            <p class="iconstar"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
                                          
                                            <p class="trangthai"> <?php if($row['number'] - $row['number_buy']==0 || $row['status'] == 0) echo 'Hết hàng'; else echo 'Còn hàng' ?></p>
                                            </a>
                                         </div>
                                        </div>
                                 
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</div>

<div class="home-blog">
    <div class="container">
        <div class="row-p">
            <div class="text-center">
                <h2 class="sectin-title title title-blue">Tin tức công nghệ</h2>
            </div>
        </div>
        <div class="blog-content">
            <?php  
            $listBaiViet=$this->Mcontent->content_list_home(6, 'all');
            foreach ($listBaiViet as $rowPost) :?>
                <div class="col-xs-12 col-12 col-sm-6 col-md-3 col-lg-3" >
                    <div class="latest">
                        <a href="tin-tuc/<?php echo $rowPost['alias'] ?>">
                            <div class="tempvideo">
                                <img width="90%" src="public/images/posts/<?php echo $rowPost['img'] ?>">
                            </div>
                            <h3 style="color: #999;"><?php echo $rowPost['title'] ?></h3>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="adv">
    <section id="service" style="margin: 20px;">
        <div class="container">
            <div class="row">
                <div id="service_home" class="clearfix">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                        <div class="service_item">
                            <div class="icon icon_product">
                                <img src="public/images/char_1.png" alt="">
                            </div>
                            <div class="description_icon">
                                <span class="large-text">
                                    Miễn phí giao hàng
                                </span>
                                <span class="small-text">
                                    Cho hóa đơn từ 100,000,000 đ
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                        <div class="service_item">
                            <div class="icon icon_product">
                                <img src="public/images/char_2.png" alt="">
                            </div>
                            <div class="description_icon">
                                <span class="large-text">
                                    Giao hàng trong ngày
                                </span>
                                <span class="small-text">
                                    Với tất cả đơn hàng
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                        <div class="service_item">
                            <div class="icon icon_product">
                                <img src="public/images/char_3.png" alt="">
                            </div>
                            <div class="description_icon">
                                <span class="large-text">
                                    Sản phẩm an toàn
                                </span>
                                <span class="small-text">
                                    Cam kết chính hãng
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Begin-->
    <!--End-->
</div>

    <script>

                function onAddCart(id){
                    var strurl="<?php echo base_url();?>"+'/sanpham/addcart';
                    jQuery.ajax({
                        url: strurl,
                        type: 'POST',
                        dataType: 'json',
                        data: {id: id},
                        success: function(data) {
                            document.location.reload(true);
                            alert('Thêm sản phẩm vào giỏ hàng thành công !');
                        }
                    });
                }
            </script>
