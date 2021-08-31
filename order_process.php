<?php

  include("connection.php");

    $product_img=$_FILES['product_img']['name'];


if (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from order_detail where order_id=".$_REQUEST['oid'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);

    $qry="DELETE FROM order_detail where order_id=".$_REQUEST['oid'];
  }
 

  // exit($qry);

   if(mysqli_query($con,$qry)) 
    {
    header("location:order.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

