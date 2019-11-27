<?php
// signup button redirect
if (isset($_POST['signup-submit'])) {

  //db connection
  require 'dbh.inc.php';

  // grab all data from singup form
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];



  // erroer checking user inputs
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
  //check for valid email and username
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invaliduidmail");
    exit();
  }
  // check for invalid characters
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }
  // check invalid email
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  // check repeated password
  else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }
  else {

   

    // Searches database for identical usernames
    $sql = "SELECT Username FROM Users WHERE Username=?;";
    // create sql statement
    $stmt = mysqli_stmt_init($conn);
    // check for errors
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // If theres an error reditrect to signup
      header("Location: ../signup.php?error=sqlerror");
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
        header("Location: ../signup.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
       

        //sending user data to the databse
        $sql = "INSERT INTO users (Username, User_Email, User_Pwd) VALUES (?, ?, ?);";
        // connects
        $stmt = mysqli_stmt_init($conn);
        // prepare sql
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // Iredirect upon error
          header("Location: ../signup.php?error=sqlerror");
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
          header("Location: ../signup.php?signup=success");
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
  header("Location: ../signup.php");
  exit();
}
