<!doctype html>
<html lang="zxx">

<head>

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
              <h2>Billing and Shipping Address</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-section padding_top">
        <div class="col-11 row">
          <div class="col-sm-10 col-md-5 col-lg-4 m-lr-auto">
<form action="profile_code.php?image_upload" method="post" enctype="multipart/form-data">
<?php
$qry="select * from user where user_id=".$_SESSION['user']['user_id'];
// echo $qry;
$res=mysqli_query($con,$qry);
$data_row=mysqli_fetch_assoc($res);

?>
  <div class="how-bor1 ml-2">
    <div class="hov-img0">
      <img class='rounded-circle' src="./admin/image/user/<?php echo $data_row['user_image']; ?>" alt="IMG" style='height:300px; width:300px; background-color: pink;'>
    </div>
  </div>
  <div class="col-12 mt-5 text-center row">
<input type="file" class="form-control col-7" name="u_img" >
<input type="submit" class="btn btn-primary col-4">
  </div>
</form>
          </div>
          <div class="col-sm-10 col-md-5 col-lg-4 m-lr-auto">
<p class="mt-5"> <b> <b>USERNAME : &nbsp &nbsp</b> </b> <?php echo $data_row['user_name']; ?></p><hr>
<p><b><b>Contact : &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp</b></b> <?php echo $data_row['user_contact']; ?></p><hr>
<p><b><b>Email : &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></b> <?php echo $data_row['user_email']; ?></p><hr>
<p><b><b>Address : &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp</b></b> <?php echo $data_row['user_address']; ?></p><hr>
          </div>
        </div>

  </section>

 <?php 
    include("footer.php"); 
    include("foot_link.php"); 
 ?>
</body>
<script type="text/javascript">
  function handleFileSelect(evt) {
    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
      var reader = new FileReader();
      reader.onload = (function(theFile) {
        return function(e) {
          var img_name = ['<img class="thumb custom_img" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');

          document.getElementById('list').insertBefore(span, null);
        };
      })(f);
      reader.readAsDataURL(f);
    }
  }
  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>

</html>