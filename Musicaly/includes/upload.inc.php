<?php 
$song_name = mysqli_real_escape_string($conn,$_POST['songName']);
$artist = mysqli_real_escape_string($conn,$_POST['artistName']);
$genre = mysqli_real_escape_string($conn,$_POST['genre']);


    if (isset($_SESSION)){ //checks for login session
        if(isset($_POST['submit'])){
           $file = $_FILES['file'];

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileEXT = explode('.', $fileName);
            $fileACTE = strtolower(end($fileEXT));

            $allowed = array('mp3','wav');

            if (in_array($fileACTE, $allowed)){ //uploaded file verification
                if($fileError === 0){ //verifies successful file upload
                    if($fileSize < 5000000){ //limits file size to 5MB
                        $fileNameNew = uniqid('',true).".".$fileACTE;
                        $fileLocation = 'uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileLocation);

                        $sql = "INSERT INTO songs (song_name,artist,genre,file_name) VALUES ('$song_name','$artist','$genre','$fileNameNew');"; //inserts form data into mySQL database
                        mysqli_query($conn,$sql); 

                        header("Location: index.php?uploadsuccess");

                    }
                    else{
                        echo "File is too big";
                    }
                }
                else{
                    echo "Error encountered";
                }
            }
            else{
                header("Location: invalidfile.php");
            }
        }
    }
    else{
        header("Location: ../upload.php?error=usertaken&name=".$fileName);
    }
?>