<?php
session_start();
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
}
?>
<!doctype html>
<html lang="zxx">
<head>
    <?php include 'head_link.php'; ?>
</head>
<body>
<?php include 'header.php'; ?>
    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6"class="login-box" style="box-shadow:0px 0px 10px 8px gray;height:200pxl">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Website?</h2>
                            <p>There are advances being made in science and technology
                                everyday, Sign-Up for free and Login to shop</p>
                            <a href="create_acount.php?new_user" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6"class="login-box" style="box-shadow:0px 0px 10px 8px gray;height:200pxl">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" action="login_process.php" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3">
                                        log in
                                    </button>
                                    <a class="lost_pass" href="#">forget password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

  <?php include 'footer.php'; ?>
  <?php include 'foot_link.php'; ?>

</body>

</html>