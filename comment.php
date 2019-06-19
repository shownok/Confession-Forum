<?php
    include('server.php');
    $username = $_POST["username"];
    $comment = $_POST["comment"];
    $postId = $_POST["postId"];

  	$query = "INSERT INTO comments (user_name, comment,post_id) 
  			  VALUES('$username', '$comment','$postId')";

  	if ( $results = mysqli_query($db, $query) ) {
  	  header('location: blog.php');
  	}else {
  		array_push($errors, "Something went wrong");
  	}

?>