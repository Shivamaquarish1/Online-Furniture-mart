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
              <h2>Profile</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-section padding_top">
    
    <form class="row col-11 m-lr-auto" action="profile_code.php?change_password" method="post">

<h5 class="col-12 text-danger">User Detail [ <small class="text-primary">do not enter any password if you do not want to change password.</small> ]</h5>
<hr style="border-style: solid;" class="col-12">

  <div class='col-xm-12 col-xl-4  form-group text-left'>
    <label>Old Password</label>
    <input type='password' class='form-control' name='op' value='' placeholder=''>
   </div>

  <div class='col-xm-12 col-sm-6 col-xl-4  form-group text-left'>
    <label>Password</label>
    <input type='password' class='form-control' name='np' value='' placeholder='Enter Password'>
   </div>

  <div class='col-xm-12 col-sm-6 col-xl-4  form-group text-left'>
    <label>Confirm Password</label>
    <input type='password' class='form-control' name='cp' value='' placeholder='Re-Enter password'>
   </div>

   <div class="col-12 text-center mt-3">
    <input type="submit" class="btn btn-lg btn-primary">
   </div>
</form>

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