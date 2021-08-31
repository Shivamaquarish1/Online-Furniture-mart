<!doctype html>
<html>

<head>

<?php include 'head_link.php'; ?>
<style type="text/css">
.login_part .login_part_form .form-control {
    width: 100%;
}
	
</style>
</head>

<body>

<?php include 'header.php'; ?>


    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">


<?php	if (isset($_GET['new_user'])) {	?>
<div class="col-lg-12 col-md-12"class="login-box" style="box-shadow:0px 0px 10px 8px gray;height:200pxl">
    <div class="login_part_form">
        <div class="login_part_form_iner">
            <h3>Welcome ! <br>
                Please Sign Up now</h3>


            <form class="row contact_form" action="create_acount_process.php" method="post" novalidate="novalidate">
           
  <tr>
        <td>&nbsp;&nbsp;<b>FULL-NAME :</b>&nbsp;&nbsp;</td>
    	<input type="text" name="username" placeholder="Full-name" required="required" class="single-input">
  </tr >
  <tr>
        <td>&nbsp;&nbsp;<b>CONTACT :</b>&nbsp;&nbsp;</td>
	<input type="text" name="contact" placeholder="Contact No" required="required" class="single-input" max="9999999999" min="1000000000 ">
 </tr>

  <tr>
        <td>&nbsp;&nbsp;<b>EMAIL-ID :</b>&nbsp;&nbsp;</td>
	<input type="text" name="email" placeholder="Email Address" required class="single-input">
</tr>

  <tr>
        <td>&nbsp;&nbsp;<b>GENDER :</b>&nbsp;&nbsp;</td>
	<select class="single-input col-12" name="gender">

		<option value="male">Male</option>
		<option value="female">Female</option>
	</select>
</tr>

  <tr>
        <td>&nbsp;&nbsp;<b>ADDRESS :</b>&nbsp;&nbsp;</td>
	<input type="text" name="address" placeholder="Address" required class="single-input">
</tr>

  <tr>
        <td>&nbsp;&nbsp;<b>DATE :</b>&nbsp;&nbsp;</td>
	<input type="date" name="dob" placeholder="Date of birth" required class="single-input">
</tr>

  <tr>
        <td>&nbsp;&nbsp;<b>PASSWORD :</b>&nbsp;&nbsp;</td>
	<input type="password" name="pwd" placeholder="Password" required class="single-input">
</tr>

                                <div class="col-md-12 form-group text-center">
                                    <button type="submit" value="submit" class="btn_3 text-center col-4">
                                        Sign Up
                                    </button>
                                </div>
                           
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>


            </div>
        </div>
    </section>
    <!--================login_part end =================-->

  <?php include 'footer.php'; ?>
  <?php include 'foot_link.php'; ?>

</body>

</html>