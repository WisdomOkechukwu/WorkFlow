<!DOCTYPE html>
<html lang="en">
<?php
include('function.php');
if(isset($_POST['Sign'])){
  $Full_Name = $_POST['Name'];
  $Business_Name = $_POST['Business_Name'];
  $Business_Address = $_POST['Business_Address'];
  $Phone_Number = $_POST['Phone_Number'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  Company_signup($Full_Name,$Business_Name,$Business_Address,$Email,$Phone_Number,$Password);

}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Company Signup Page</title>
  <link rel="stylesheet" href="../assets/css/login/font-awesome.min.css" />
  <link rel="stylesheet" href="../assets/css/login/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../assets/css/login/style.css" />
  <link rel="shortcut icon" href="../assets/images/Algo.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Sign Up</h3>
              <form action="" method="POST">
                   
                <div class="form-group">
                  <input type="text" class="form-control p_input" name="Name"
                   placeholder="Enter your Full Name" required="">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control p_input" name="Business_Name"
                  placeholder="Enter your Business Name" required="">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control p_input" name="Business_Address"
                  placeholder="Enter your Business Address" required="">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control p_input" name="Phone_Number"
                  placeholder="Enter your Phone Number" required="">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control p_input" name="Email"
                  placeholder="Enter your Email" required="">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control p_input" name="Password"
                  placeholder="Enter your Password" required="">
                </div>
               


                <div class="text-center">
                  <button type="submit" name="Sign" class="btn btn-primary btn-block enter-btn">SIGN UP</button>
                </div>
                <p class="Or-login-with my-3">If You have an account <a href="login.php" style="text-decoration:none">click here</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/login/jquery.min.js"></script>
  <script src="../assets/js/login/popper.min.js"></script>
  <script src="../assets/js/login/bootstrap.min.js"></script>
  <script src="../assets/js/login/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/login/misc.js"></script>
</body>

</html>