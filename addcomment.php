<?php

$connect = new PDO('mysql:host=localhost;dbname=commentsec', 'root', '');

$error = '';
$comment_name = '';
$comment_content = '';

if(empty($_POST["comment_name"]))
{
 $comment_name = "anon";
}
else
{
 $comment_name = $_POST["comment_name"];
}

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = "
 INSERT INTO commentstored 
 (parent_id, comment, sender) 
 VALUES (:parent_id, :comment, :sender)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':parent_id' => $_POST["comment_id"],
   ':comment'    => $comment_content,
   ':sender' => $comment_name
  )
 );
 $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>