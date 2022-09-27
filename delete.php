<?php
    include 'connect.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $sql = "Delete from anime where ID=$id";
        $result = mysqli_query($con,$sql);
        if($result){
            echo 'Delete successful';
            header('location:display.php');
        }
        else{
            die(mysqli_error($result));
        }
    }




?>