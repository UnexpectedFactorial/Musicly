<?php
require('../model/database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'initial';
    }
}  

if ($action == 'initial') {

    include('signup.php');
} 

if ($action == 'signup_submit') {


    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $password_repeat = filter_input(INPUT_POST, 'password_repeat');

    if (empty($username) || empty($email) || empty($password) || empty($password_repeat)) {
    $message = 'Please do not leave any field blank';
    echo "<script type='text/javascript'>alert('$message');</script>";
    //header("Location: ../signup.php?error=invaliduidmail");
    exit();
  	}
  	//check for valid email and username
  	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    //header("Location: ../signup.php?error=invaliduidmail");
    exit();
  	}
  	// check for invalid characters
  	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    //header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  	}
  	// check repeated password
  	else if ($password !== $password_repeat) {
    //header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  	} else {

   

    // Searches database for identical usernames
    $sql = "SELECT Username FROM Users WHERE Username=?;";
    // create sql statement
    $stmt = mysqli_stmt_init($conn);
    // check for errors
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // If theres an error reditrect to signup
      //header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      //setting accepted paramters
      mysqli_stmt_bind_param($stmt, "s", $username);
      // run SQL statement
      mysqli_stmt_execute($stmt);
      // store sql in databse
      mysqli_stmt_store_result($stmt);
      // result from statement
      $resultCount = mysqli_stmt_num_rows($stmt);
      // close sql
      mysqli_stmt_close($stmt);
      // checking username
      if ($resultCount > 0) {
        //header("Location: ../signup.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
       

        //sending user data to the databse
        $sql = "INSERT INTO Users (Username, User_Email, User_Pwd) VALUES (?, ?, ?);";
        // connects
        $stmt = mysqli_stmt_init($conn);
        // prepare sql
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // Iredirect upon error
          //header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {

          // If there is no error then we continue the script!

          // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission!
          // The hashing method I am going to show here, is the LATEST version and will always will be since it updates automatically. DON'T use md5 or sha256 to hash, these are old and outdated!
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          // Then we execute the prepared statement and send it to the database!
          // This means the user is now registered! :)
          mysqli_stmt_execute($stmt);
          // Lastly we send the user back to the signup page with a success message!
          ////header("Location: ../signup.php?signup=success");
          exit();

        }
      }
    }
  }
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the user tries to access this page an inproper way, we send them back to the signup page.
  //header("Location: ../signup.php");
  exit();
}

?>

