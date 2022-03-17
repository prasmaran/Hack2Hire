<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in | Gadget Gear</title>
  <link rel="icon" href="HomeAssets/images/logo.jpeg" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<style>
  body {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
  }
  .divider:after,
.divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
}
</style>

<body background="sources/black.jpg" class="hold-transition login-page">
<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="HomeAssets/images/inventory.png" class="" alt="Phone image">
      </div>
      <div class="col-md-8 col-lg-5 col-xl-5 offset-xl-1" style="background-color:black; padding:20px; border-radius:10px; border:2px solid white">
            <h4 class="login-box-msg" style="font-family:Helvetica; font-weight:bold; color:white"><img src="HomeAssets/images/logo.jpeg" style="height:40px;;">&nbsp;&nbsp;Gadget Gear</h4>
      <h4 class="login-box-msg" style="font-family:Helvetica; font-weight:bold; color:white">Sign <span style="color:gold">In!</span></h4>
        <form action="login_check.php" method="post" name="login">
          <?php include 'login_remarks.php'; ?>
          <br>
          <!-- Email input -->
          <div class="form-outline mb-2">
            <input name="uname" type="text" class="form-control form-control-lg" placeholder="Username">
          </div>
          <br>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input name="pass" type="password" class="form-control form-control-lg" placeholder="Password">
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

        </form>
      </div>
    </div>
  </div>
</section>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>