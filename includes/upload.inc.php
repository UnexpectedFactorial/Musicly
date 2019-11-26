<?php 
$song_name = mysqli_real_escape_string($conn,$_POST['songName']);
$artist = mysqli_real_escape_string($conn,$_POST['artistName']);
$genre = mysqli_real_escape_string($conn,$_POST['genre']);

    if ($_SESSION['status' == 1]){ //checks for login session
        if(isset($_POST['submit'])){ //checks if the user has pressed the submit button yet
           $file = $_FILES['file'];

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
                    if($fileSize < 5000000){ //limits file size to 5MB
                        $fileNameNew = uniqid('',true).".".$fileACTE;
                        $fileLocation = 'uploads/song/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileLocation);

                        $sql = "INSERT INTO songs (song_name,artist,genre,file_name,uploader_id) VALUES ('$song_name','$artist','$genre','$fileNameNew');"; //inserts form data into mySQL database
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
    }
    else{
        header("Location: ../invalidacc.php");
    }
?>