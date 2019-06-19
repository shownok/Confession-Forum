<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<?php  if(isset($_SESSION['success'])) : ?>
        
    	    <p><?php echo $_SESSION['success'] ?></p>
    	<?php endif ?>
    	<form method="post" action="poster.php">
			<div class="input-group">
                <input name="username" value="<?php echo $_SESSION['username']?>" hidden>
                <input name="date" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden>
				<label>post a cofession</label>
				<input type="text" name="post">
				<button type="submit" class="btn">post</button>
			</div>
    </form>
    <ul>
     <li><a href="index.php">Home</a></li>
     <li><a href="single_post.php">My Posts</a></li>
     <li><a href="blog.php">All posts</a></li>
 </ul>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>