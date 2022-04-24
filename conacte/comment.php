<?php
 
if (isset($_POST["comment"])) {
  
  
  $conn = mysqli_connect('localhost', 'root', '', 'task_sub');

  $parent_id= $_POST['parent_id'];

  $comment = $_POST['comment'];
 
  $time = date('Y-d-m H:i:s');
  
  $user_id = $_POST['user_id'];
  
  $post_id = $_POST['post_id'];
  

  $query = "INSERT INTO `comments`(	`parent_id`, `comment`, `date_added`, `post_id`,`user_id`) VALUES ('$parent_id','$comment','$time','$post_id','$user_id')";

  $result = mysqli_query($conn, $query);

  header("Location: ../showCom.php");
}
