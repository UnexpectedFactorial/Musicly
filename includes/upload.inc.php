<?php 
session_start();
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "musiclydb";
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

$song_name = mysqli_real_escape_string($conn,$_POST['songName']);
$artist = mysqli_real_escape_string($conn,$_POST['artistName']);
$genre = mysqli_real_escape_string($conn,$_POST['genre']);

     //checks for login session
        if(isset($_POST['submit'])){ //checks if the user has pressed the submit button yet
           $file = $_FILES['file'];

            $uploader = $_SESSION['uid'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileEXT = explode('.', $fileName);
            $fileACTE = strtolower(end($fileEXT)); //these two lines pull the extention from the file name, letting us know the file type. 

            $allowed = array('mp3','wav');
                if (in_array($fileACTE, $allowed)){ //uploaded file verification
                    if($fileError === 0){ //verifies successful file upload
                        if($fileSize < 20000000){ //limits file size to 20MB
                            $fileNameNew = uniqid('',true).".".$fileACTE;
                            $fileLocation = '../uploads/song/'.$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileLocation);

                            $sql = "INSERT INTO songs (Song_Name,Song_Artist,Song_Genre,File_Name,Uploader_id) VALUES ('$song_name','$artist','$genre','$fileNameNew','$uploader');"; //inserts form data into mySQL database
                            mysqli_query($conn,$sql); //inserts data into the mySQL table 

                            header("Location: ../index.php?uploadsuccess");
                        }
                        else{
                            header("Location: ../invalidsize.php");
                        }
                    }
                    else{
                        header("Location: ../fileerror.php");
                    }
                }
                else{
                    header("Location: ../invalidfile.php");
                }
        
        }
?>