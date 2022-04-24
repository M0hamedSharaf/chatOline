<?php
 
if (isset($_POST["user"])) {
  
  
  $conn = mysqli_connect('localhost', 'root', '', 'task_sub');

  $user = $_POST['user'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  $query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$user','$email','$password')";

  $result = mysqli_query($conn, $query);
  header("Location: ../post.php");
}

?>