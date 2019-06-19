<?php
    include('server.php');
    $username = $_POST["username"];
    $date = $_POST["date"];
    $post = $_POST["post"];


  	$query = "INSERT INTO posts (user_name, post, date) 
  			  VALUES('$username', '$post', '$date')";

  	if ( $results = mysqli_query($db, $query) ) {
  	  $_SESSION['success'] = "Post has been submited";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Something went wrong");
  	}

?>