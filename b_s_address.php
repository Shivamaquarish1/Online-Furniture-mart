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
<?php include 'header.php'; 


$qry1="select * from user_add where user_id=".$_SESSION['user']['user_id'];
$res1=mysqli_query($con,$qry1);
$user1=mysqli_fetch_assoc($res1);


?>
  <section class="contact-section padding_top">
    <form class="container" action="profile_code.php?insert" method="post">
      <div class="row">
<h5 class="col-12 text-danger">Billing/Shipping Detail</h5>
<hr style="border-style: solid;" class="col-12">
<hr>
            <div class="row contact_form">
              <div class="col-md-12 form-group p_star">
                <label>Billing/Shipping Address </label>
                <input type="text"  class="form-control" value="<?php echo $user1['b_address'] ?>" name="b_address"  required/>
              </div><br>

              <div class="col-md-6 form-group p_star">
                <label>City</label><BR>
              <input type="text"  class="form-control" value="<?php echo $user1['b_city'] ?>" name="b_city" required />
               </div> 

               <div>
                <label>Zip Code</label>
                <input type="number" class="form-control" value="<?php echo $user1['b_zip'] ?>" name="b_zip" required/>
              </div>

              <div class="col-md-6 form-group p_star">
                <label>State</label>
                <input type="text" class="form-control"value="<?php echo $user1['b_state'] ?>"  name="b_state" required/>
              </div>

              <div class="col-md-6 form-group p_star">
                <label>Contact</label>
                <input type="number"  class="form-control" value="<?php echo $user1['b_contact'] ?>" min="6000000111" max="9999999999" name="b_contact" required/>
              </div>
            </div>

<div class="row p-b-148 pt-3">
  <div class="col-12 text-center mt-5">
    <input class="btn btn-primary btn-lg" type="submit" >
  </div>
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