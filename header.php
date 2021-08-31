<?php 
error_reporting(1);
session_start(); 
// print_r($_SESSION['user']);
?>
<link rel="stylesheet" type="text/css" href="view_profile.css">
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="globallogo.jpg" style="height:80px;width:200px;margin-top:10px;"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Category
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                    <?php
                        include 'connection.php';
                    $re= mysqli_query($con,"select * from category");
                    while ($r= mysqli_fetch_assoc($re))
                        echo "<a class='dropdown-item' href='category.php?cat_id={$r['cat_id']}'> {$r['cat_name']} </a>"
                    ?>
                                     </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="category.php">Furnitures</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                <?php if ( ! isset($_SESSION['user'])){ ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php"> login</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
<?php if (isset($_SESSION['user'])){ ?>



<div class="dropdown">
<i class="far fa-user dropdown-toggle" data-toggle="dropdown"></i>
<div class="dropdown-menu">

  <a class="dropdown-item"><?php echo $_SESSION['user']['user_name']; ?></a>
  <div class="dropdown-divider"></div>

  <a class="dropdown-item" href="profile.php" style="width:auto;">Profile</a>
  <a class="dropdown-item" href="orders.php" style="width:auto;">Orders</a>

  <a class="dropdown-item" href="b_s_address.php" style="width:auto;">My Address</a>

  <a class="dropdown-item" href="change_pwd.php" style="width:auto;">Change Password</a>

  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="login.php?logout">Log out</a>

</div>
</div>

<?php } ?>

<a href="cart.php"><i class="fas fa-cart-plus"></i></a>
<!-- <a href=""><i class="ti-heart"></i></a> -->



                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

<!-- view profile  -->


<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<!-- view profile  -->