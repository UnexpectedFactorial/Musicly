<?php 
session_start();
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "musiclydb";
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

        if(isset($_POST['admin'])){
           header ("Location: ../admin.php");
        };
?>