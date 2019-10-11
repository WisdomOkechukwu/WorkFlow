<?php
session_start();
        
         function login_credentials($email,$password){
              include('mysql.php');

          $result = $mysqli-> query("SELECT * FROM logincredentials
           WHERE Email='$email' AND Password = '$password'")
          or die($mysqli->error);
               if(count($result)==1):
                    $row= $result->fetch_assoc(); 
      
                
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['Name'] = $row['FullName'];
                    $_SESSION['BizName'] = $row['BizName'];
                    $_SESSION['BizAdd'] = $row['BizAddress'];
                    $_SESSION['Pos'] = $row['Position'];
                    $_SESSION['Email'] = $row['Email'];
                    $_SESSION['PN'] = $row['PhoneNumber'];
                    $_SESSION['Pass'] = $row['Password'];
                    $_SESSION['Cat'] = $row['Category'];
                    $_SESSION['BID'] = $row['BID'];
        
                    if($row['Category']=="Owner"):
                        header("location: enviroment/Admin/Admin.php");
                    endif;
                    if($row['Category']=="Worker"):
                        header("location: enviroment/Worker/Customer.php");
                    endif;
                endif;       
         }

         function Company_signup($FullName,$BusinessName,$BusinessAddress,$Email,$PhoneNumber,$Password){
          include('mysql.php');
          $BID=0;
          $mysqli->query("INSERT INTO logincredentials (FullName, BizName, BizAddress, Position, Email, PhoneNo, Password, Category, BID)
                VALUES ('$FullName','$BusinessName', '$BusinessAddress','Owner','$Email','$PhoneNumber', '$Password', 'Owner','$BID')")
               or die($mysqli->error);
          header("location: login.php");
         }
         
?>