<?php 
include('mysql.php');

if(isset($_POST['worker'])){
  $Name = $_POST['Name'];
  $Phone_Number = $_POST['Phone_Number'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  $Company = $_POST['Company_name'];

  $value = null;
	$sql = "SELECT * FROM logincredentials WHERE BizName='$Company'"; 
    $result = $mysqli->query($sql); 
    while ($row = $result->fetch_assoc()) :
        $value=$row["id"];
    endwhile; 
    //  echo $value;



 $mysqli->query("INSERT INTO logincredentials (FullName, BizName, BizAddress, Position, Email, PhoneNo, Password, Category, BID)
                VALUES ('$Name','', '','Worker','$Email','$Phone_Number', '$Password', 'Worker','$value')")
               or die($mysqli->error);
          header("location: login.php");

}
?>
<!DOCTYPE html>

<html lang="en">

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
              <h3 class="card-title text-left mb-3">Sign Up</h3>
              <form action="" method="POST">
                   
                <div class="form-group">
                  <input type="text" class="form-control p_input" name="Name" placeholder="Enter your FullName">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control p_input" name="Phone_Number" placeholder="Enter your Phone Number">
                </div>

                <div class="form-group">
                  <input type="email" class="form-control p_input" name ="Email" placeholder="Enter your Email">
                </div>

                <div class="form-group">
                  <input type="password" class="form-control p_input" name="Password" placeholder="Enter your Password">
                </div>
                <div class="form-group">
                  <select name = Company_name class="btn btn-secondary btn-lg dropdown-toggle form-control p_input" 
                  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						
                  <option>Which organization do you work for</option>
                        <?php 
                        $result = $mysqli->query("SELECT * FROM logincredentials")
                        or die($mysqli->error);
                        while ($row = $result->fetch_assoc()):
                          if($row['BizName']!=null):
                        ?>
                        
                        <option name="<?php echo $row['BizName']; ?>"><?php echo $row['BizName']; ?></option>
                        
                        <?php
                      endif;
                        endwhile; ?>

						    
						        

                  
                    </select>
                </div>


                <div class="text-center">
                  <button type="submit" name="worker" class="btn btn-primary btn-block enter-btn">SIGN UP</button>
                </div>
                <!-- <p class="Or-login-with my-3">If You have an account <a href="login.php" style="text-decoration:none">click here</a></p> -->
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


