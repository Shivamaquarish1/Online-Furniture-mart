<!doctype html>
<html lang="zxx">

<head>
  <?php include 'head_link.php'; ?>
  <style type="text/css">
      .custom_img{
        object-fit:cover;
        width: 200px;
        height: 200px;
      }
    .product_count {
      height: 47px;
    }

  </style>
</head>

<body>
  <?php 
  include 'header.php'; 
  include 'connection.php';


  if(isset($_POST['rating'])) {
     
  }



 /*product = "SELECT product_master.product_id, product_master.product_name, product_master.product_discription, product_master.offer_price,
  product_master.selling_price, product_size.product_size, product_material.material_name, product_color.color_name, category.cat_name 
    FROM product_master 
    cross join product_size  on product_master.product_id=product_size.product_id 
    cross join product_material on product_master.product_id =product_material.product_id
    cross join product_color on product_master.product_id =product_color.product_id
    cross join category on  product_master.product_id =category.product_id
    WHERE product_master.size_id=product_size.size_id and product_master.material_id=product_material.material_id
     and product_master.color_id = product_color.color_id and product_master.cat_id = category.cat_id 
     and product_master.product_id=".$_GET['product_id']; */

  $product = "SELECT pm.product_id, pm.product_name, pm.product_discription, pm.offer_price, pm.selling_price,
   ps.product_size, pmat.material_name, pc.color_name, c.cat_name 
FROM product_master pm , product_size ps , product_material pmat , product_color pc , category c
WHERE pm.size_id=ps.size_id and pm.material_id=pmat.material_id and pm.color_id = pc.color_id 
and pm.cat_id = c.cat_id and pm.product_id=".$_GET['product_id'];

  $product = mysqli_query($con,$product);
  $product = mysqli_fetch_assoc($product)or die(mysqli_error($con));
  //print_r($product);

  $images = "SELECT product_img from product_master where  product_id=".$_GET['product_id'];
  $images = mysqli_query($con,$images)or die(mysqli_error($con));
  
  ?>


  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Shop Product</h2>
              <p>Home <span>-</span> View Product</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->
  <!--================End Home Banner Area =================-->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
        <div class="col-lg-7 col-xl-7">
          <div class="product_slider_img">
            <div id="vertical">
              <?php
                while ($image = mysqli_fetch_assoc($images) ) {
              ?>
              <div data-thumb="./admin/image/product/<?php echo $image['product_img']; ?>">
                <img src="./admin/image/product/<?php echo $image['product_img']; ?>" />
              </div>
              <?php } ?>             

            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
          <div class="s_product_text">
            <!-- <h5>previous <span>|</span> next</h5> -->
            <h3><?php echo $product['product_name']; ?></h3>
            <h2> <del><small><?php echo $product['selling_price']; ?></small></del> <?php echo $product['offer_price']; ?> Rs.</h2>
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Category</span> : <?php echo $product['cat_name']; ?></a>
              </li>
              <li>
                <a > <span>Availibility</span> : In Stock</a>
              </li>
            </ul>
            <p><?php echo $product['product_discription']; ?></p>
              <form action="cart.php?" method="get"  class="card_area d-flex justify-content-between align-items-center">
              <input type="hidden" name="add_id" value="<?php echo $_GET['product_id']; ?>">
              <div class="product_count">

                <input class="input-number" type="Number" value="1" min="1" max="5" name="nop">

              </div>
              <input type="submit" class="btn_3" value="add to cart">
              <!-- <a class="like_us"> <i class="ti-heart"></i> </a> -->
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Specification</a>
        </li>


        <li class="nav-item">
          <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
            aria-selected="false">Reviews</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p> <?php echo $product['product_discription']; ?> </p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <?php 
                  $val = array('product_name','offer_price','selling_price','product_size','material_name','color_name','cat_name');
                  foreach ($val as $value) {
                    echo "
                <tr>
                  <td>
                    <h5>$value</h5>
                  </td>
                  <td>
                    <h5>{$product[$value]}</h5>
                  </td>
                </tr>
                ";
                  }
                ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="row total_rate">
                <div class="col-6">
                  <div class="box_total">
                    <h5>Overall</h5>
                    <h4>4.0</h4>
                    <h6>(03 Reviews)</h6>
                  </div>
                </div>
                <div class="col-6">
                  <div class="rating_list">
                    <h3>Based on 3 Reviews</h3>
                    <ul class="list">
                      <li>
                        <a href="#">5 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">4 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">3 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">2 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">1 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="review_list">

                <?php
                  $all_review = mysqli_query($con,"SELECT * FROM `product_review` WHERE product_id=".$_GET['product_id']);
                  while ($review = mysqli_fetch_assoc($all_review)) {?>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/product/single-product/review-1.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4><?php echo $review['user_name']; ?></h4>
                      <?php
            for ($i=0; $i < $review['review_rating']; $i++)
              echo "<i class='fa fa-star'></i>";
            for ($i=0; $i < 5-$review['review_rating']; $i++)
              echo "<i class='far fa-star'></i>";

                      ?>

                    </div>
                  </div>
                  <p><?php echo $review['review_desc']; ?></p>
                </div>
              <?php } ?>

              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Add a Review</h4>
                <p>Your Rating:</p>
                <ul class="list">
                  <li>
                    <a class="rating_star" data-id="1">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a class="rating_star" data-id="2">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a  class="rating_star" data-id="3">
                      <i class="far fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a  class="rating_star" data-id="4">
                      <i class="far fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a class="rating_star" data-id="5">
                      <i class="far fa-star"></i>
                    </a>
                  </li>
                </ul>
                <p id="review_std">Fair</p>
                <form class="row contact_form" action="review_process.php?product_id=<?php echo $_GET['product_id']; ?>" method="post" novalidate="novalidate">
                  <input type="hidden" name="rating" value="2" id="rating">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Your Full name" value="<?php echo (isset($_SESSION['user_error()']))? $_SESSION['user']['user_name']: ''; ?>" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo (isset($_SESSION['user']))? $_SESSION['user']['user_email']: ''; ?>" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="number" placeholder="Phone Number" value="<?php echo (isset($_SESSION['user']))? $_SESSION['user']['user_contact']: ''; ?>" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="1" placeholder="Review"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn_3">
                      Submit Now
                    </button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

  <!-- product_list part start-->
  <section class="product_list best_seller">
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
$pro = mysqli_query($con," SELECT * from product_master GROUP by product_id");
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
<?php
 include 'footer.php';
 include 'foot_link.php';
?>



<script type="text/javascript">
  $(document).ready(function(){
    $(".rating_star").click(function(){

      var widget = $(this);
      var val = widget.data("id");

      $(".rating_star").filter(function(){
        var wid = $(this);
        if (wid.data("id")<=val) {
          wid.html("<i class='fa fa-star'></i>");
        }
        else{
          wid.html("<i class='far fa-star'></i>");          
        }
      });
        if (val ==1) 
          $("#review_std").html("Poor");
        if (val ==2) 
          $("#review_std").html("Fair");
        if (val ==3) 
          $("#review_std").html("Average");
        if (val ==4) 
          $("#review_std").html("Good");
        if (val ==5) 
          $("#review_std").html("Excellent");
        
        $("#rating").val(val);
    });
  });
</script>
</body>

</html>