<?php
    $dbhostname = "localhost";
    $dbname = "animelist";

    $con = new mysqli($dbhostname,"root","",$dbname);

    if($con){
        echo 'Database sucessfully connected';
    }else{
        echo (mysqli_error($con));
    }

?>