<?php 

// print_r($_POST);

include 'connection.php';

echo $qry = "INSERT INTO `product_review`( `product_id`, `review_rating`, `review_desc`, `user_name`, `user_email`, `user_contact`) VALUES ({$_GET['product_id']},{$_POST['rating']},'{$_POST['message']}','{$_POST['name']}','{$_POST['email']}','{$_POST['number']}')";

mysqli_query($con,$qry);

header("location:single-product.php?product_id=".$_GET['product_id']);


?>