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
<!doctype html>
<html lang="zxx">

<head>
<?php include 'head_link.php'; ?>
<style type="text/css">
  .cart_img{
    object-fit: cover;
    height: 100px;
    width: 100px;
  }
  .a_tag{

  }
  .a_tag:hover{
    font-size: 20px;
    font-weight: bolder;
  }
</style>
</head>

<body>

<?php include 'header.php'; ?>

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Global Furniture Cart</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
 
<?php

     if (isset($_GET['add_id']))
{
?>
  <form action="checkout.php?" method="get">
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>

              <?php

 
                if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                 




                  $c_qry = "SELECT product_id ,product_name , offer_price , product_img from product_master where  product_id=$key";
                  $res_data = mysqli_query($con,$c_qry);
                  $res_data = mysqli_fetch_assoc($res_data);
              ?>
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img class="cart_img" src="./admin/image/product/<?php echo $res_data['product_img']; ?>" alt="" />
                    </div>
                    <div class="media-body">
                      <p><?php echo $res_data['product_name']; ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5><?php echo $res_data['offer_price']; ?></h5>
                </td>
                <td>
                  <div class="product_count">
                    <span class="input-number-decrement bt" style="bottom: -1px;"> <i class="ti-angle-down"></i></span>
                    <input data-id="<?php echo $res_data['product_id']; ?>" class="input-number-count cart_count" type="text" value="<?php echo $value['count']; ?>" min="1" max="10">
                    <span class="input-number-increment bt" style="top: 1px;"> <i class="ti-angle-up"></i></span>
                  </div>
                </td>
                <td>
                  <h5 class="tot_am"><?php echo $res_data['offer_price']*$value['count']; ?></h5>
                </td>
                <td class="text-center">
                  <a class="a_tag" href="cart.php?remove_id=<?php echo $res_data['product_id']; ?>">X</a>                  
                </td>
              </tr>
              <?php }  }  ?>


              <tr>
                <td>
                  <a class="btn_1 update_cart">Update Cart</a>
                </td>
                <td></td>
                <td>
                  <h5><b>Subtotal</b></h5>
                </td>
                <td>
                  <h5 id="total_amount">0</h5>
                </td>
                <td></td>
              </tr>



            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">

                          <input type="submit" class="btn_3" value="Proceed to checkout">

          </div>
        </div>
      </div>
  </section>
</form>
<?php

 }  
 
   
   else 
   {

echo '<script>alert("Empty-Cart Shop-Here")</script>';
echo '<script>window.location="category.php"</script>';
           }


  ?>
  <!--================End Cart Area =================-->

  <?php include 'footer.php'; ?>
  <?php include 'foot_link.php'; ?>
  <script type="text/javascript">
    $(document).ready(function(){

      $(".input-number-increment").click(function(){
        $(this).prev().val(parseInt($(this).prev().val())+1);
      });

      $(".input-number-decrement").click(function(){
        if (parseInt($(this).next().val()) >0 )
          $(this).next().val(parseInt($(this).next().val())-1);
      });      

      function update_sub_total(){
        var total = 0;
        $(".tot_am").filter(function(){
          total = total + parseInt($(this).html());
        
        });        
        $("#total_amount").html(total);
      }

      update_sub_total();      
      $(".bt").click(function () {
        var wid = $(this);
        wid.parent().parent().next().children().html( parseInt(wid.parent().parent().prev().children().html())* parseInt(wid.siblings(".cart_count").val()) );
        update_sub_total();
      });

      $(".update_cart").click(function (){
        $(".cart_count").filter(function() {
          var widget = $(this);
          $.post("update_cart.php",{"nop":widget.val(),"pid":widget.data("id")},function(data,status){
            alert("Cart updated");
          });
        });
      });
    
    });
  </script>
</body>

</html>