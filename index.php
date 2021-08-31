<!doctype html>
<html lang="zxx">

<head>
<?php include 'head_link.php'; ?>
<style type="text/css">

    .banner_part .single_banner_slider .banner_img {
     top: 0; 
     margin-top: 10vw;
    }
    
    .banner_part .single_banner_slider .banner_text {
        height: 60vw;
        margin-left:20px;
    }

   .custom_con{
    box-shadow: 10px 10px 14px -12px black;
    height:46vw !important;
    max-height: 300px;
    background-repeat: no-repeat !important;
    background-position: right !important;
    background-size: contain !important;
    border-radius: 5px;
    }
    .custom_img{
        object-fit:cover;
        width: 200px;
        height: 200px;
    }

</style>
</head>

<body>

    <?php include "header.php"; ?>

    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        <br><br><br><br><br><br><br><br>
                    <?php 
                        $qry="select * from slide_master ";    
                        $result=mysqli_query($con,$qry);
                        while($lst=mysqli_fetch_array($result)) {
                    ?>
                        <div class="single_banner_slider" style="height: 50vw;">
                            <div class="row">
                                <div class="col-lg-5 col-md-8" style="z-index: 9;">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1><?php echo $lst['slide_title']; ?></h1>
                                            <p><?php echo $lst['slide_desc']; ?></p>
                                            <!-- <a href="#" class="btn_2">buy now</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img  d-block">
                                    <img src="./admin/image/slide/<?php echo $lst['slide_image']; ?>" alt="" class="custom_slide">
                                </div>
                            </div>
                        </div>
                    <?php } ?>                        
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>

        </div>
    </section>


    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>  
            </div>
            
            <div class="row align-items-center justify-content-between">

                <?php

$class_array = ["col-lg-7 col-sm-6","col-lg-5 col-sm-6","col-lg-5 col-sm-6","col-lg-7 col-sm-6","col-lg-7 col-sm-6","col-lg-5 col-sm-6"];
// $class_array = ["col-7","col-5","col-5 ","col-7"];
$re= mysqli_query($con,"select * from category ");
$count = 0;
while ($r= mysqli_fetch_assoc($re)){
echo "
<div class='{$class_array[$count]}'>
    <div class='single_feature_post_text custom_con' style='background:#ffecec url(./admin/image/category/{$r['cat_image']}); '>
        <p >{$r['cat_desc']}</p>
        <h3>{$r['cat_name']}</h3>
        <a href='category.php?cat_id={$r['cat_id']}' class='feature_btn'>EXPLORE <i class='fas fa-play'></i></a>
    </div>
</div>
";
$count= $count+1;
}

                ?>

        </div>
    </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Latest Product <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
<?php
$pro = mysqli_query($con," SELECT * from product_master  GROUP by product_id");
while ($p = mysqli_fetch_assoc($pro)) {    
?>
<a href="single-product.php?product_id=<?php  echo $p['product_id']; ?>" class="single_product_item">
    <img class="custom_img" src="./admin/image/product/<?php echo $p['product_img']; ?>" alt="">
    <div class="single_product_text">
        <h4><?php echo $p['product_name']; ?></h4>
        <h3>
<small><del><?php echo $p['offer_price']; ?></del></small> -<?php echo $p['selling_price']; ?> Rs.
        </h3>
    </div>
</a>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->


<style>
    .carousel-inner img {
      width: 100%;
      height: auto;
    }
</style>

<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

<?php
    $first_slide = 1;
    $rs = mysqli_query($con,"SELECT o.* , i.product_img FROM offers o , product_master i  WHERE i.product_id=o.pro_id GROUP by i.product_id");
    while ($ro=mysqli_fetch_assoc($rs)) {        
?>
    <div class="carousel-item <?php echo ($first_slide==1)? "active" : ""; ?>">
        <section class="our_offer section_padding">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-6">
                        <div class="offer_img">
                            <img src="./admin/image/product/<?php echo $ro['product_img']; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="offer_text">
                            <h2><?php echo $ro['o_desc']; ?></h2>
                            <h3>Till Today <?php echo $ro['o_date']; ?></h3>
<!--
                             <div class="date_countdown">
                                <div id="timer">
                                    <div id="days" class="date"></div>
                                    <div id="hours" class="date"></div>
                                    <div id="minutes" class="date"></div>
                                    <div id="seconds" class="date"></div>
                                </div>
                            </div>
 -->                            
                            <div class="input-group">
                                <div class="input-group-append">
                                    <a href="#" class="input-group-text btn_2" id="basic-addon2">Show</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>    
<?php 
$first_slide=0;
} ?>

</div>
</div>


    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Selling <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        
<?php
$pro = mysqli_query($con," SELECT * from product_master  GROUP by cat_id");
while ($p = mysqli_fetch_assoc($pro)) {    
?>
<a href="single-product.php?product_id=<?php  echo $p['product_id']; ?>" class="single_product_item">
    <img class="custom_img" src="./admin/image/product/<?php echo $p['product_img']; ?>" alt="">
    <div class="single_product_text">
        <h4><?php echo $p['product_name']; ?></h4>
        <h3>
<small><del><?php echo $p['offer_price']; ?></del></small> -<?php echo $p['selling_price']; ?> Rs.
        </h3>
    </div>
</a>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->


   <?php include 'footer.php'; ?>
    <?php include 'foot_link.php'; ?>
</body>

</html>