
<?php
	session_start();

	include 'connection.php';




	echo $q=$_SESSION['user']['user_id'];
	echo $date=date('Y-m-d');


  echo $qry = "insert into orders(date,status,user_id,m_status) values ('$date','Pending','$q','Pending')";

			mysqli_query($con,$qry) or die("Can't Execute Query...");
			$order_id= mysqli_insert_id($con);
			echo $order_id;



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
                    echo $tot=$tot+($res_data['offer_price']*$value['count']);

                    echo $key;
                    echo $order_id;
                    $price = $res_data['offer_price'];
                    echo $price;
                    $qty = $value['count'];
                    echo $qty;

                    echo $qry1 = "insert into order_detail(product_id,order_id,product_price,product_qty) values ('$key','$order_id','$price',$qty)";
                    mysqli_query($con,$qry1) or die("Can't Execute Query 1...");

                  }
                }




	unset($_SESSION['cart']);

echo '<script>alert("order palced")</script>';
echo '<script>window.location="orders.php?order_placed"</script>'; 

?>