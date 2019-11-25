<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "musiclydb";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

    $userrating = $_POST['rating'];
    $song_id = 2;
    $user_id = 3;
    if(isset($_POST['submit'])){
        $sql = "INSERT INTO ratingsystem (rating,user_id,song_id) VALUES ('$userrating','$user_id','$song_id');";
        mysqli_query($conn,$sql);
        header("Location: index.php?ratingsuccess");
    }
?>