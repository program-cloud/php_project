<?php
$server = "localhost";
$user = "root";
$password ="";
$db ="project";

$con = mysqli_connect($server,$user,$password,$db);
    if($con){
        ?>
        <script>alert("connection succuseful....!");</script>
         <?php
    }
    else{
        ?>
        <script>alert("NO connection");</script>
        <?php

         }
?>
       