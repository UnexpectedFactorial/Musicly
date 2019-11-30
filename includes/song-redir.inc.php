<?php 
session_start();
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "musiclydb";
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);
$songid = 1;
        if(isset($_POST['song'])){
           header ("Location: ../songs.php?'$songid'");
        };
?>