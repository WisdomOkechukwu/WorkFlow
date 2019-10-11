<!DOCTYPE html>
<html lang="en">
  <?php
  #inclusion of the mysql
  include('mysql.php');
  #function holder
  include('function.php');

  if(isset($_POST['log'])){
    #Variable passing
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    
    #Function for Login(SQL Queries)
    login_credentials($Email,$Password);

  }
  ?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Page</title>
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
              <h3 class="card-title text-left mb-3">Login</h3>


              <!--FORM FOR LOGIN-->
              <form action="" method="POST">
                <div class="form-group">
                  <input type="text" name="Email" class="form-control p_input" placeholder="Enter your Email">
                </div>
                <div class="form-group">
                  <input type="password" name="Password" class="form-control p_input" placeholder="Enter your Password">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check"><label><input type="checkbox" class="form-check-input">Remember me</label></div>
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" name="log" class="btn btn-primary btn-block enter-btn">LOG IN</button>
                </div>
                <!-- <p class="Or-login-with my-3">Or Sign Up here</p> -->
                
                <a href="OwnerSignup.php" class="google-login btn btn-create-account btn-block">
                  Create A Company Account</a>
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
