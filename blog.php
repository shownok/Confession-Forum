<?php
    include('server.php');
    $post_query = "SELECT * FROM posts";
    $result = mysqli_query($db, $post_query);


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .content,.header{
            width: 55%;
        }
        form, .content {
            width: 56%;
            padding: 10px;
        }
        .post_body {
            text-align: center;
            padding: 15px;
        }
        .menu{
            
        }
        .header{
            text-align: center;
        }
        .menu {
            width: 55%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
 <ul class="menu">
     <li><a href="index.php">Home</a></li>
     <li><a href="single_post.php">My Posts</a></li>
 </ul>
  <h1 class="header">Confession posts</h1>
   <?php while($allposts = mysqli_fetch_assoc($result) ): ?>
      
       <div class="header">
           <h2>Post</h2>
        </div>
        
        <div class="content">
            <div class="post_body">
             <p><?php echo $allposts["date"];?></p>
             <p><?php echo $allposts["post"];?></p>
            </div>
                <form method="post" action="comment.php">
                    <div class="input-group">
                        <input name="username" value="<?php echo $_SESSION['username']?>" hidden>
                        <label>Comments</label><br>
                        <input type="text" name="comment">
                        <input type="text" name="postId" value="<?php echo $p_id  =$allposts["post_id"]; ?>" hidden>
                        <button type="submit" class="btn">submit</button>
                    </div>
                </form>
                
                <?php
                    $comment_query = "SELECT * FROM comments WHERE post_id = '$p_id'";
                    $result2 = mysqli_query($db, $comment_query);
                ?>
                
                <?php while($allcomment = mysqli_fetch_assoc($result2) ): ?>
                         <div>
                            <p>Name: <?php echo $allcomment["user_name"];?></p>
                            <p>Comment: <?php echo $allcomment["comment"];?></p>
                         </div>
                 <?php endwhile ?>
        </div>
    <?php endwhile ?>
                
</body>
</html>