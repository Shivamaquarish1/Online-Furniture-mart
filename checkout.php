<?php
  session_start();
  include 'connection.php';
  if (isset($_GET['add_id'])){
    $_SESSION['cart'][$_GET['add_id']] = array('count' => $_GET['nop'] , );
  }
  elseif (isset($_GET['remove_id'])) {
    unset($_SESSION['cart'][$_GET['remove_id']]);
  }
?>

<html lang="zxx">

<head>
<?php include 'head_link.php'; ?>
</head>

<body>

<?php include 'header.php'; 

$qry="select * from user where user_id=".$_SESSION['user']['user_id'];
$res=mysqli_query($con,$qry);
$user=mysqli_fetch_assoc($res);

$qry1="select * from user_add where user_id=".$_SESSION['user']['user_id'];
$res1=mysqli_query($con,$qry1);
$user1=mysqli_fetch_assoc($res1);

?>  


  <section class="checkout_area padding_top">
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-7">
            <h3 class="mb-1  mt-3">User Details</h3>
            <hr>
            <div class="row contact_form">
              <div class="col-md-6 form-group p_star">
                <label>Username</label>
                <input disabled  class="form-control" value="<?php echo $user['user_name'] ?>" />
              </div>

              <div class="col-md-6 form-group p_star">
                <label>Email</label>
                <input disabled  class="form-control" value="<?php echo $user['user_email'] ?>" />
              </div>

              <div class="col-md-6 form-group p_star">
                <label>Contact</label>
                <input disabled  class="form-control" value="<?php echo $user['user_contact'] ?>" />
              </div>
            </div>
            <h3 class="mb-1  mt-3">Billing Address Detail</h3>
            <hr>
            <div class="row contact_form">
              <div class="col-md-12 form-group p_star">
                <label>Billing Address 1</label>
                <input disabled  class="form-control" value="<?php echo $user1['b_address'] ?>" />
              </div>  
              <div class="col-md-6 form-group p_star">
                <label>State</label>
                <input disabled  class="form-control" value="<?php echo $user1['b_state'] ?>" />
              </div>
              <div class="col-md-6 form-group p_star">
                <label>Zip Code</label>
                <input disabled  class="form-control" value="<?php echo $user1['b_zip'] ?>" />
              </div>
              <div class="col-md-6 form-group p_star">
                <label>City</label>
                 <input disabled  class="form-control" value="<?php echo $user1['b_city'] ?>" />
                         </div>
              <div class="col-md-6 form-group p_star">
                <label>Contact</label>
                <input disabled  class="form-control" value="<?php echo $user1['b_contact'] ?>" />
              </div>
            </div>



          </div>

          <div class="col-lg-5">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Price</span>
                  </a>
                </li>
                <?php
                  if (isset($_SESSION['cart'])) {
                    $tot=0;
                  foreach ($_SESSION['cart'] as $key => $value) {
                    $c_qry = "SELECT product_id ,product_name , offer_price from product_master   WHERE product_id=$key GROUP by product_id";
                    $res_data = mysqli_query($con,$c_qry);
                    $res_data = mysqli_fetch_assoc($res_data);
                    echo $res_data['product_name'];
                    
                    echo "
                    <li>
                      <a href=''>".$res_data['product_name']."
                        <span class='middle'>x ".$value['count']."</span>
                        <span class='last'>".$res_data['offer_price']."</span>
                      </a>
                    </li>";
                    $tot=$tot+($res_data['offer_price']*$value['count']);
                  }
                }
                ?>
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="#">Subtotal
                    <span><?php echo $tot; ?></span>
                  </a>
                </li>
                <li>
                  <a href="#">Shipping
                    <span>Flat rate: 50.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Total
                    <span><?php $total = $tot+50; echo $total; ?></span>
                  </a>
                </li>
              </ul>
              <div class="payment_item">
                <div class="radion_btn">
                  <input checked type="radio" id="f-option5" name="selector" />
                  <label for="f-option5">Cash On Delivery</label>
                  <div class="check"></div>
                </div>
                <p>You have to pay cash. while product on your door.</p>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input disabled type="radio" id="f-option6" name="selector" />
                  <label for="f-option6">Paypal </label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              <a class="btn_3 mt-5" href="place_order.php">Proceed</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->


  <?php include 'footer.php'; ?>
  <?php include 'foot_link.php'; ?>


</body>

</html>