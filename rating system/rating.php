<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "musiclydb";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);


    $userrating = $_POST['rating'];
    $song_id = 2;
    $user_id = $_SESSION['id'];//insert specific user id here
    $check = mysqli_query($conn,"SELECT * FROM ratingsystem where user_id=$user_id and song_id='$song_id'");//checks if the user has rated the song before
    $checkusers = mysqli_num_rows($check);

    if (isset($_SESSION['id'])) {    
        if($checkusers > 0){
            $sql = "UPDATE ratingsystem SET rating = '$userrating' WHERE user_id = '$user_id'";
                        mysqli_query($conn,$sql);
                        header("Location: index.php?ratingupdated");//replace with song page
        }
        else{
            if(isset($_POST['submit'])){

                        $sql = "INSERT INTO ratingsystem (rating,user_id,song_id) VALUES ('$userrating','$user_id','$song_id');";
                        mysqli_query($conn,$sql);
                        header("Location: index.php?ratingsuccess");//samething here
            }
        }
    }
    else if (!isset($_SESSION['id'])) {
        header("Location: index.php?nologin");
    }
?>