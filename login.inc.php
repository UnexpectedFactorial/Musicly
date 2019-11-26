<?php

if (isset($_POST['login-submit'])) {

 //connects to database using dbh file
  require 'includes/dbh.inc.php';

  //Gets data from signup
  $mailuid = $_POST['email'];
  $password = $_POST['password'];

 

  // Error checking for empty inputs etc
  if (empty($mailuid) || empty($password)) {
    header("Location: index.php?error=emptyfields&mailuid=".$mailuid);
    exit();
  }
  else {

   

   

    // connect to SQL and prepare variables for passing user data
    $sql = "SELECT * FROM users WHERE Username=? OR User_Email=?;";
   
    $stmt = mysqli_stmt_init($conn);
    // generate SQL statement and check for errors
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // error redirects to index page
      header("Location: index.php?error=sqlerror");
      exit();
    }
    else {

      

      // assigning expected parameters to the variables
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
	  
      // execute SQL and send to database
      mysqli_stmt_execute($stmt);
	  
      // result.
      $result = mysqli_stmt_get_result($stmt);
	  
      // Tassign result to variable
      if ($row = mysqli_fetch_assoc($result)) {
        // check for matching password in database
        $pwdCheck = password_verify($password, $row['User_pwd']);
		
        // if no match throw an erroer
        if ($pwdCheck == false) {
          // error redirects to index.
          header("Location: index.php?error=wrongpwd");
          exit();
        }
        // for succesful login
        else if ($pwdCheck == true) {

          
          // create a session
          session_start();
          // And now create the session variables.
          $_SESSION['id'] = $row['User_id'];
          $_SESSION['uid'] = $row['Username'];
          $_SESSION['email'] = $row['User_email'];
          $_SESSION['status'] = 1;    
          // Now the user is registered as logged in redirect to index succcesful
          header("Location: index.php?loginsuccessful");
          exit();
        }
      }
      else {
        header("Location: index.php?login=wronguidpwd");
        exit();
      }
    }
  }
  // close connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
 
  header("Location: signup.php");
  exit();
}
