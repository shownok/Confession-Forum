<?php
    include('server.php');
    $user = $_SESSION['username'];
    $post_query = "SELECT * FROM posts WHERE user_name ='$user'";
    $result = mysqli_query($db, $post_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post page</title>
</head>
<body>
 <ul>
     <li><a href="index.php">Home</a></li>
     <li><a href="blog.php">All posts</a></li>
 </ul>
  <h1>Confession posts</h1>
   <?php while($allposts = mysqli_fetch_assoc($result) ): ?>
    <div>
       <h2>Post</h2>
        <p><?php echo $allposts["date"];?></p>
        <p><?php echo $allposts["post"];?></p>
    </div>
    <?php endwhile ?>
</body>
</html>