<?php 

// include('../../mysql.php');
// $wid =  $_SESSION['id']; 
// $time =  date('h:i a');

// if(isset($_POST['Log'])):
// 	$Task_text = $_POST['Tasktext'];
//      $Urgency = $_POST['radios'];
     
//      echo $Task_text."  ".$Urgency;
     
// //      $mysqli->query("INSERT INTO personal (Worker, Done, Undone, Percentage ,Day, Month, Year, Time, BID)
// //           VALUES ('$Worker_name','$Done', '$Udone','$percentage','$day','$month','$year','$time','$biz_id')")
// //           or die($mysqli->error);

// endif;
function personal_task($task,$Urgency){
     $pid=$_SESSION['id'];
     $time =  date('h:i a');
     include('../../mysql.php');
     $mysqli->query("INSERT INTO personal (pid, Task, Date, imp )
     VALUES ('$pid','$task', '$time','$Urgency')")
     or die($mysqli->error);

}

function effective(){
     
     $day = date('d');
     $month = date('m');
     $year = date('Y');
     $biz_id =  $_SESSION['BID'];
     $time =  date('h:i a');
     include('../../mysql.php');
     $sql = "SELECT * FROM logincredentials WHERE Category='Worker'";
     $result = mysqli_query($mysqli,$sql);
     $Worker = array();
     if(mysqli_num_rows($result)>0):
          while($row= mysqli_fetch_assoc($result)):
               $Worker[] = $row;
          endwhile;
     endif;
     
     foreach($Worker as $work):
          $Worker_name = $work['FullName'];
          $result2="SELECT COUNT('id') FROM taskgiven WHERE Worker='$Worker_name' AND WorkDone='Yes'
          AND Day='$day' AND Month ='$month' AND Year = '$year' ";
          $msql2 = mysqli_query($mysqli,$result2);
          $row2 = mysqli_fetch_array($msql2);
          $Done =$row2[0];

          $result3="SELECT COUNT('id') FROM taskgiven WHERE Worker='$Worker_name' AND WorkDone='No'
          AND Day='$day' AND Month ='$month' AND Year = '$year' ";
          $msql3 = mysqli_query($mysqli,$result3);
          $row3 = mysqli_fetch_array($msql3);
          $Udone = $row3[0];

          $result4="SELECT COUNT('id') FROM taskgiven WHERE Worker='$Worker_name' 
          AND Day='$day' AND Month ='$month' AND Year = '$year'";
          $msql4 = mysqli_query($mysqli,$result4);
          $row4 = mysqli_fetch_array($msql4);
          $Total = $row4[0];


          // 
          if($Total==0){
               $percentage = 0;
          }
          else{
               $percentage =($Done/$Total)*100;
          }
          
     


          
          $check_duplicate_Locations="SELECT Worker FROM Tasktracker WHERE Worker='$Worker_name' AND Day = '$day'
          AND Month = '$month' AND Year = '$year' ";
          $rsult = $mysqli->query($check_duplicate_Locations)
          or die($mysqli->error);
          $count=mysqli_num_rows($rsult);
     
          if($count==0):
          $mysqli->query("INSERT INTO Tasktracker (Worker, Done, Undone, Percentage ,Day, Month, Year, Time, BID)
          VALUES ('$Worker_name','$Done', '$Udone','$percentage','$day','$month','$year','$time','$biz_id')")
          or die($mysqli->error);
          endif;
          if($count>0):
               $mysqli->query("UPDATE Tasktracker SET Done='$Done',Undone='$Udone'
               ,Percentage='$percentage', Time='$time' WHERE Worker='$Worker_name' AND Day = '$day'
          AND Month = '$month' AND Year = '$year' ");
          endif;
          
     endforeach;


}


function month_name($month_no){
     if($month_no==1){
          echo "January";
     }
     if($month_no==2){
          echo "February";
     }
     if($month_no==3){
          echo "March";
     }
     if($month_no==4){
          echo "April";
     }
     if($month_no==5){
          echo "May";
     }
     if($month_no==6){
          echo "June";
     }
     if($month_no==7){
          echo "July";
     }
     if($month_no==8){
          echo "August";
     }
     if($month_no==9){
          echo "September";
     }
     if($month_no==10){
          echo "October";
     }
     if($month_no==11){
          echo "November";
     }
     if($month_no==12){
          echo "December";
     }
}
function effectiveness_chart(){
     
     $day = date('d');
     $month = date('m');
     $year = date('Y');
     $biz_id =  $_SESSION['BID'];
     $time =  date('h:i a');
     include('../../mysql.php');
     $name=$_SESSION['Name'];
     $done = 0;
     $undone = 0;
     $total = 0;

     $sql = "SELECT * FROM Tasktracker  WHERE Worker='$name'";
     $result = mysqli_query($mysqli,$sql);
     $check = mysqli_num_rows($result);
     if($check>0){
          
          
          while($row = mysqli_fetch_assoc($result)){
               
               
               $done = $row['Done'] + $done;
               
               $undone = $row['Undone'] + $undone;
               
          }
          $total =$done + $undone;
          
     }
     
     $percent_done = 0;
     if($done==0){
          $percent_done=0;
     }
     else{
          $percent_done = ($done/$total)*100;
     }

     $percent_undone = 0;
     if($undone==0){
          $percent_undone=0;
     }
     else{
          $percent_undone = ($undone/$total)*100;
     }
     
     $_SESSION['PD'] = $percent_done;
     $_SESSION['PUD'] = $percent_undone;
     


}



function monthly_effect(){
     
     include('../../mysql.php');
     $name = $_SESSION['Name'];
     $biz_id =  $_SESSION['BID'];
     $total = 0;
     $done = 0;
     $undone = 0;
     $percent_done=0;
     $percent_undone=0;
     $month_array = array("01","02","03","04","05","06","07","08","09","10","11","12");
     foreach($month_array as $val){
          
          
          $sql = "SELECT * FROM Tasktracker  WHERE Worker='$name' AND Month = '$val'";
          $result = mysqli_query($mysqli,$sql);
          $check = mysqli_num_rows($result);
          
          if($check>0){
               while($row = mysqli_fetch_assoc($result)){
               
               
                    // echo $row['Worker']."   ".$row['Done']."   ".$row['Undone']."<br>";
                    $done = $row['Done'] + $done;
               
                    $undone = $row['Undone'] + $undone;
                    
                    
               }
               $total =$done + $undone;
               
               if($done==0){
                    
               }
               else{
                    $percent_done = ($done/$total)*100;
               }
               // echo $percent_done."<br>";
          
               
               if($undone==0){
                    
               }
               else{
                    $percent_undone = ($undone/$total)*100;
               }
               // echo $percent_undone;
               

                    $check_duplicate_Locations="SELECT Worker FROM monthlytracker WHERE Worker='$name' AND Month ='$val'";
                    $rsult = $mysqli->query($check_duplicate_Locations)
                    or die($mysqli->error);
                    $count=mysqli_num_rows($rsult);
               
                    if($count==0):
                    $mysqli->query("INSERT INTO monthlytracker (Worker, Month, Done, Undone, BID)
                    VALUES ('$name','$val', '$percent_done','$percent_undone','$biz_id')")
                    or die($mysqli->error);
                    endif;
                    if($count>0):
                         $mysqli->query("UPDATE monthlytracker SET Done='$percent_done',Undone='$percent_undone'
                         WHERE Worker='$name' AND Month = '$val'");
                    endif;
             
          }
          else{
               $percent_done=0;
               $percent_undone=0;
               $check_duplicate_Locations="SELECT Worker FROM monthlytracker WHERE Worker='$name' AND Month ='$val'";
                    $rsult = $mysqli->query($check_duplicate_Locations)
                    or die($mysqli->error);
                    $count=mysqli_num_rows($rsult);
               
                    if($count==0):
                    $mysqli->query("INSERT INTO monthlytracker (Worker, Month, Done, Undone, BID)
                    VALUES ('$name','$val', '$percent_done','$percent_undone','$biz_id')")
                    or die($mysqli->error);
                    endif;
                    if($count>0):
                         $mysqli->query("UPDATE monthlytracker SET Done='$percent_done',Undone='$percent_undone'
                         WHERE Worker='$name' AND Month = '$val'");
                    endif;


          }
          
          
          
          
     }
     
}

function  monthly_view(){
     
     include('../../mysql.php');
     $name = $_SESSION['Name'];
     $biz_id =  $_SESSION['BID'];
     $Month_Array = array();
     $month_array = array("01","02","03","04","05","06","07","08","09","10","11","12");
     $counter = 0;
     $xs=0;

     foreach($month_array as $month){
          $sql = "SELECT * FROM monthlytracker  WHERE Worker='$name' AND Month='$month' ";
          $result = mysqli_query($mysqli,$sql);
          $check = mysqli_num_rows($result);
          if($check>0){
          
          
          while($row = mysqli_fetch_assoc($result)){
               
               
               $Month_Array[$counter]=$row['Done'];
               $counter = $counter + 1;
               
          }
          
          
          
     }
     
     } 
     // for ($x = 0; $x <= 11; $x++) {
     //      $xs=$x + 1;
     //      echo "month $xs  $Month_Array[$x] <br>";
     //  } 
     $_SESSION['Jan'] = $Month_Array[0];
     $_SESSION['Feb'] = $Month_Array[1];
     $_SESSION['Mar'] = $Month_Array[2];
     $_SESSION['Apr'] = $Month_Array[3];
     $_SESSION['May'] = $Month_Array[4];
     $_SESSION['Jun'] = $Month_Array[5];
     $_SESSION['Jul'] = $Month_Array[6];
     $_SESSION['Aug'] = $Month_Array[7];
     $_SESSION['Sep'] = $Month_Array[8];
     $_SESSION['Oct'] = $Month_Array[9];
     $_SESSION['Nov'] = $Month_Array[10];
     $_SESSION['Dec'] = $Month_Array[11];

     
     

}



function checkin_time(){
     
     include('../../mysql.php');
     $wid = $_SESSION['id'];
     $name = $_SESSION['Name'];
     $day = date('d');
     $month = date('m');
     $time =  date('h:i a');




     $check_duplicate_Locations="SELECT * FROM checkin WHERE WorkerName='$name' AND Month ='$month' 
     AND Day ='$day' AND WorkerID = '$wid'";
     $rsult = $mysqli->query($check_duplicate_Locations)
     or die($mysqli->error);
     $count=mysqli_num_rows($rsult);

     if($count==0):
     $mysqli->query("INSERT INTO checkin (WorkerID,WorkerName, Time, Day, Month)
     VALUES ('$wid','$name', '$time','$day','$month')")
     or die($mysqli->error);
     endif;
     if($count>0):
          $mysqli->query("UPDATE checkin SET Time='$time'
          WHERE WorkerID='$wid' AND Month = '$month' AND Day='$day'");
     endif;
}

?>
