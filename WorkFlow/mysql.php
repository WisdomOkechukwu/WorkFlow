<?php
     #opening database connection

	$mysqli = new mysqli('localhost','root','','final')
        or die(mysqli_error($mysqli));

     # database check
     //    if($mysqli){
     //    	echo "database opened";
     //    }
 ?>