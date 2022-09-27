<?php
    $dbhostname = "localhost";
    $dbname = "animelist";

    $con = new mysqli($dbhostname,"root","",$dbname);

    if(!$con){
        die(mysqli_error($con));
    }
?>