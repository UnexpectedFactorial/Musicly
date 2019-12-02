<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "musiclydb";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);
session_start();

    $userrating = $_POST['rating'];
    $song_id = $_SESSION['song_id'];
    $user_id = $_SESSION['id'];//insert specific user id here
    $sql = "SELECT * FROM songrating where user_id=$user_id AND Song_Id=$song_id;";
    $check = mysqli_query($conn,$sql);//checks if the user has rated the song before
    $checkusers = mysqli_num_rows($check);

    if (isset($_SESSION['id'])) {    
        if($checkusers > 0){
            $sql = "UPDATE songrating SET rating = '$userrating' WHERE User_Id = '$user_id'";
            mysqli_query($conn,$sql);
            
            $sql = "SELECT ROUND(AVG(rating),2) AS avgrating FROM songrating WHERE song_id = $song_id;"; //selects the average of the rating column of a specific song
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $sql = "UPDATE songs SET Avg_Rating = {$row['avgrating']} WHERE Song_Id = '$song_id'";
            mysqli_query($conn,$sql);
                        
            header('Location: ../songs-ratingupdate.php?id=' . $song_id);
        }
        else{
            if(isset($_POST['submit'])){

                $sql = "INSERT INTO songrating (rating,user_id,Song_Id) VALUES ('$userrating','$user_id','$song_id');";
                mysqli_query($conn,$sql);
                
                $sql = "SELECT ROUND(AVG(rating),2) AS avgrating FROM songrating WHERE song_id = $song_id;"; //selects the average of the rating column of a specific song
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $sql = "UPDATE songs SET Avg_Rating = {$row['avgrating']} WHERE Song_Id = '$song_id'";
                mysqli_query($conn,$sql);
                        
                header('Location: ../songs-ratingsuccess.php?id=' . $song_id);
            }
        }
    }
    else if (!isset($_SESSION['id'])) {
        header('Location: ../songs-nologin.php?id=' . $song_id);
    }
?>