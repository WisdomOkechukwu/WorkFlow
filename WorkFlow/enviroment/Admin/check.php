<?php
     function chart_monthly(){
          include('../../mysql.php');
     session_start();
     
     $biz_id =  $_SESSION['id'];
     $total = 0;
     $done = 0;
     $undone = 0;
     $counter=0;
     
     
     $percentage_array=array();
     $month_array = array("01","02","03","04","05","06","07","08","09","10","11","12");
     foreach($month_array as $val):
          $sql = "SELECT * FROM monthlytracker WHERE Month='$val' AND BID='$biz_id'";
          $result = mysqli_query($mysqli,$sql);
          $check = mysqli_num_rows($result);

          if($check>0){
               $totals=0;
               $total_done=0;
               $total_undone=0;
               While($row = mysqli_fetch_assoc($result)):
               $done = $row['Done'];
               $not_done = $row['Undone'];
               $total = $done+$not_done;
               $totals = $total +$totals;
               $total_done=$done+$total_done;
               $total_undone =$not_done + $total_undone;
               
               
          endwhile;
          $percentage_month=0;
          

          if($total_undone==0){
               $percentage_month=$total_done;
          }
          else{
          $percentage_month = ($total_done/$totals)*100;
     }
          
          }
          // echo $percentage_month_done."   ".$counter.'<br>';
          $percentage_array[$counter]=$percentage_month;
          $counter=$counter+1;
     
     endforeach;
     // for ($x = 0; $x <= 11; $x++) {
     //      $xs=$x + 1;
     //      echo "month $xs  $percentage_array[$x] <br>";
     //  } 

      $_SESSION['JAN'] = $percentage_array[0];  
      $_SESSION['FEB'] = $percentage_array[1];  
      $_SESSION['MAR'] = $percentage_array[2];  
      $_SESSION['APR'] = $percentage_array[3];  
      $_SESSION['MAY'] = $percentage_array[4];  
      $_SESSION['JUN'] = $percentage_array[5];  
      $_SESSION['JUL'] = $percentage_array[6];  
      $_SESSION['AUG'] = $percentage_array[7];  
      $_SESSION['SEP'] = $percentage_array[8];  
      $_SESSION['OCT'] = $percentage_array[9];  
      $_SESSION['NOV'] = $percentage_array[10]; 
      $_SESSION['DEC'] = $percentage_array[11]; 
     }
     chart_monthly();
?>