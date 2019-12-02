<?php 
session_start();
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "musiclydb";
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

$song_id = $_SESSION['song_id'];
$user_id = $_SESSION['id'];
$username = $_SESSION['uid'];
$comment = mysqli_real_escape_string($conn,$_POST['comment']);



     //checks for login session
        if(isset($_POST['submit'])){ //checks if the user has pressed the submit button yet
            if($_SESSION['id'] == 0){
                $username = "Guest";
                $user_id=0;
            }
            $sql = "INSERT INTO commentdb (Username,User_Id,Song_Id,comment_text) VALUES ('$username','$user_id','$song_id','$comment');"; //inserts form data into mySQL database
            mysqli_query($conn,$sql); //inserts data into the mySQL table 

            header('Location: ../songs.php?id=' . $song_id);
        }
?>