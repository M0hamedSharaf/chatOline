<?php

if (isset($_POST["title"])) {
    $conn = mysqli_connect('localhost', 'root', '', 'task_sub');

    //user_id
    $user_id = $_POST['user_id'];

    // title
    $title = $_POST['title'];

    // image
    $image_location =$_FILES['image']['tmp_name'];  // "C:\xampp\tmp\phpE230.tmp"
    $image_name =$_FILES['image']['name'];          //    xxxx.jpg
    $iamge_up = "../image/".$image_name;
    move_uploaded_file($image_location, "../image/".$image_name);
   
  

    //text
    $text = $_POST['text'];


    $query = "INSERT INTO `posts`(`user_id`, `title`, `image`,`text`) VALUES ('$user_id','$title','$iamge_up','$text')";

    $result = mysqli_query($conn, $query);


    header("Location: ../comment.php");
}
