<?php
// print_r($_POST);

session_start();
include 'connection.php';


		    

			if (isset($_GET['insert']) or die("error")) {

				

			 $user_id=$_SESSION['user']['user_id'];
			 $b_address=$_POST['b_address'];
			 $b_city=$_POST['b_city'];
			 $b_zip=$_POST['b_zip'];
			 $b_state=$_POST['b_state'];
			 $b_contact=$_POST['b_contact'];
				
			$qry="insert into user_add (user_id,b_address,b_city,b_zip,b_state,b_contact)
			values('$user_id','$b_address','$b_city','$b_zip','$b_state','$b_contact')";
			

	/*
	echo $qry = "update user_meta set 
	b_address1='".$_POST['b_address1']."',
	b_city='".$_POST['b_city']."',
	b_contact='".$_POST['b_contact']."',
	b_state='".$_POST['b_state']."',
	b_zip_code='".$_POST['b_zip_code']."'
	where user_id=".$_SESSION['user']['user_id'];
	*/	

}
elseif (isset($_GET['image_upload'])) {
	if (move_uploaded_file($_FILES['u_img']['tmp_name'], "./admin/image/user/".$_FILES['u_img']['name'])) {
		$qry = "UPDATE `user` SET user_image='".$_FILES['u_img']['name']."' WHERE user_id=".$_SESSION['user']['user_id'];	
	}
}
elseif (isset($_GET['change_password'])) {

	if ($_SESSION['user']['user_pwd']==$_POST['op']) {
		if ($_POST['np']==$_POST['cp']) {
			$qry = "UPDATE `user` SET `user_pwd`='".$_POST['np']."' WHERE user_id=".$_SESSION['user']['user_id'];		
		}else{
			header("location:change_pwd.php?password not matched");
			exit();
		}
	}else{
		header("location:change_pwd.php?old password not matched");
		exit();
	}
}

if (mysqli_query($con,$qry))
{
	header("location:index.php?success");
}
else
{
	header("location:index.php?unsuccess");	
}

?>