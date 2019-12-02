<?php
  require "header.php";
  if(isset($_POST['delete'])){
    $sql = "DELETE FROM songs WHERE Song_Id='$_GET[Song_Id]'";
  }
  
  
  
?>

