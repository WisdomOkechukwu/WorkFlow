<?php 
 
    
     function worker_online(){
          include('../../mysql.php');
          $day = date('d');
          $month = date('m');
          $result2="SELECT COUNT('id') FROM checkin WHERE Day='$day' AND Month='$month'";
          $msql2 = mysqli_query($mysqli,$result2);
          $row2 = mysqli_fetch_array($msql2);
          echo $row2[0];

     }
     function task_done(){
          include('../../mysql.php');
          $day = date('d');
          $month = date('m');
          $result2="SELECT COUNT('id') FROM taskgiven WHERE Day='$day' AND Month='$month' AND WorkDone = 'Yes'";
          $msql2 = mysqli_query($mysqli,$result2);
          $row2 = mysqli_fetch_array($msql2);
          echo $row2[0];
     }
     function task_allocate(){
          include('../../mysql.php');
          $day = date('d');
          $month = date('m');
          $result2="SELECT COUNT('id') FROM taskgiven WHERE Day='$day' AND Month='$month'";
          $msql2 = mysqli_query($mysqli,$result2);
          $row2 = mysqli_fetch_array($msql2);
          echo $row2[0];
     }
     function pending_task(){
          include('../../mysql.php');
          $day = date('d');
          $month = date('m');
          $result2="SELECT COUNT('id') FROM taskgiven WHERE Day='$day' AND Month='$month' AND WorkDone = 'No'";
          $msql2 = mysqli_query($mysqli,$result2);
          $row2 = mysqli_fetch_array($msql2);
          echo $row2[0];
     }

function mails($name){
    
    include('../../mysql.php');
    
}

     function effect_over_time(){
          // session_start();
          $id = $_SESSION['id'];
          $day = date('d');
          $month = date('m');
          $year = date('Y');
          
          $time =  date('h:i a');
          
          include('../../mysql.php');
          $sql = "SELECT FullName,Email FROM logincredentials WHERE Category='Worker'";
          $result = mysqli_query($mysqli,$sql);
          $Worker = array();
          if(mysqli_num_rows($result) > 0):
              while($row = mysqli_fetch_assoc($result)){
                  $Worker[] = $row;
              }
          endif;
          // var_dump($Worker);
          
          foreach($Worker as $work):
               $name = $work['FullName'];
               $mail = $work['Email'];
               
               $sql_loop = "SELECT * FROM tasktracker WHERE Worker='$name' AND BID='$id'";
               $result_loop = mysqli_query($mysqli,$sql_loop);
               $check_loop = mysqli_num_rows($result_loop);
               if($check_loop>0){
                    $done=0;
                    $not_done=0;
                    $total=0;
                    $total_done=0;
                    $total_undone=0;
                    while($row = mysqli_fetch_assoc($result_loop)){
                         $done = $row['Done'];
                         $not_done = $row['Undone'];
                         $total_done = $done + $total_done;
                         $total_undone = $not_done + $total_undone;
                         $total = $total_done+$total_undone;
                    }
                    $percent_Worked = 0;
                    $percent_Worked = ($total_done/$total)*100;
                    if($percent_Worked<50){
                         $stat="Not meeting standard";
                         $data="denied";
                         $des = "Scrutiny";
                    }
                    else{
                         $stat="meeting standard";
                         $data="process";
                         $des="making Progress";
                    }
                    echo " 
                    <tr class='tr-shadow'>
                    <td>$name</td>
                      <td>
                          <span class='block-email'>$mail</span>
                      </td>
                      <td class='desc'>$des</td>
                      <td>$year-$month-$day <p>$time</p></td>
                      <td>
                          <span class='status--$data'>$stat</span>
                      </td>
                      
                      <td>
                      <div class='progress-bar bg-info progress-bar-striped progress-bar-animated' role='progressbar' style='width: $percent_Worked%' aria-valuenow='$percent_Worked' aria-valuemin='0' aria-valuemax='100'>$percent_Worked%</div>
                      </td>
                      </tr>
                                                                 <tr class='spacer'></tr>
                      ";
               }     
               
          
          endforeach;
             
     }
          
          


     

    
    function set_task($name,$task,$urgency,$BID){
          include('../../mysql.php');
          $day = date('d');
          $month = date('m');
          $year = date('Y');
          $Workdone="No";
          $time =  date('h:i a');
          #GET ID
          $sql = "SELECT * FROM logincredentials  WHERE FullName='$name'";
               $result = mysqli_query($mysqli,$sql);
               $check = mysqli_num_rows($result);
               if($check>0){
                    
                    
                    while($row = mysqli_fetch_assoc($result)){
                         
                         
                         $id = $row['id'];
                         
                         
                         
                    }


                    
                    
               }$ids=$id; 
               #END GET ID
               if($urgency=="Not Urgent"){
                    $ucl="process";
               }
               else{
                    $ucl="denied";
               }
               $mysqli->query("INSERT INTO taskgiven (Worker, WorkerID, Task, WorkDone, Time, Day, Month, Year, BID, urgency, ucolour)
               VALUES ('$name','$ids', '$task','$Workdone','$time','$day','$month','$year','$BID','$urgency','$ucl')")
               or die($mysqli->error);
        }
       











?>