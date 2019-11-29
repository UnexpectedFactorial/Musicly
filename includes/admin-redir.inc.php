<?php 
session_start();
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "musiclydb";
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

        if(isset($_POST['admin'])){ //checks if the user has pressed the submit button yet
           header ("Location: ../admin.php");
        };
?>