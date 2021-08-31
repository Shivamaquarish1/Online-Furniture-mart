<!doctype html>
<html lang="zxx">

<head>
<style type="text/css">
      .tab01 .nav-link.active {
        color: #f00;
        font-size: 19px;
        border-color: #f50000;
    }
    .data_con{
      padding: 10px;
        border-radius: 9px;
        box-shadow: 2px 3px 6px -1px black;
    }
    .data_con img{
      object-fit:cover;
    }
    .data_con p {
      text-overflow: ellipsis;
        white-space: nowrap;
      overflow: hidden;
    }

</style>
<?php include 'head_link.php'; ?>
</head>

<body>
  <?php include("header.php"); ?>

  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Your-Orders</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-section padding_top">
    




              <table id="example1" class="table table-bordered table-striped">

                <div class="col-11 m-lr-auto row">



                <thead>                 
                <tr>
                  <th>Name</th>
                  <th>Image</th>
                  <th>product price</th>
                  <th>Product Quantity</th>
                  <th>Order-Status</th>
                  <th>Product-Status</th>
                  <th>Action</th>
                </tr>
                </thead>



	<?php

$qry = "SELECT od.* , pm.* , o.*
FROM order_detail od, product_master pm, orders o
WHERE  o.order_id=od.order_id and od.product_id=pm.product_id  and o.user_id=".$_SESSION['user']['user_id'];
$result=mysqli_query($con,$qry);
while ($lst=mysqli_fetch_array($result)) { 

	?>


<?php 

             echo" <tr>";
                    
                    echo"<td>".$lst['product_name']."</td>";
                    echo "<td ><img class='rounded-circle' src='admin/image/product/".$lst['product_img']."' style='height:150px;width:150px;'></td>";

                    echo" <td>".$lst['product_price']."</td>";
                    echo" <td>".$lst['product_qty']."</td>";
                    echo" <td>".$lst['status']."</td>";
                    echo" <td>".$lst['m_status']."</td>";



                    echo  "<td>
                     <a class='far fa-trash-alt' href='order_process.php?delete=1&oid=". $lst['order_id']."'><b> Cancel-Product</b></a>

                   </td>";
                   echo "</tr>";
 ?>


<?php }   ?>
				</div>


</table>

  </section>

 <?php 
    include("footer.php"); 
    include("foot_link.php"); 
 ?>
</body>

</html>