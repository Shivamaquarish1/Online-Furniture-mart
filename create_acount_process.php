<?php
include 'connection.php';
// print_r($_POST);

$pwd=$_POST['pwd'];
// $pwd=md5($_POST['pwd']);

echo $qry = "INSERT INTO `user`( `user_name`, `user_email` , `user_gender`, `user_dob`, `user_address`, `user_contact`, `user_pwd`) VALUES ('{$_POST['username']}','{$_POST['email']}','{$_POST['gender']}','{$_POST['dob']}','{$_POST['address']}','{$_POST['contact']}','".$pwd."')";

if (mysqli_query($con,$qry)) {
	$qry = "insert into user_meta(user_id) value(".mysqli_insert_id($con).")";
	// echo $qry;
	mysqli_query($con,$qry);
	header("location:login.php");
}
else{
	echo mysqli_error($con);
}
?>