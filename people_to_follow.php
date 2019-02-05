<?php


session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  echo "You must log in before viewing your profile page!";
     
}
else {

$user = $_SESSION['username'];


$conn = mysqli_connect("localhost","root", "", "novice_to_pro");
if (isset($_REQUEST['following'])) {
          
    $sql = "INSERT INTO followers (user1, following) " 
    . "VALUES ('$user','$_GET[following]')";

    if ( $conn->query($sql) ){

        header("location: feed.php");   
    }
}
?>

<!--SELECT * FROM users WHERE moderator = 1 AND user_id NOT IN (SELECT followed_id FROM followers WHERE follower_id = uid); -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Novice To Professional</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<!DOCTYPE html>
<!-- saved from url=(0053)https://getbootstrap.com/docs/3.3/examples/jumbotron/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">

    <title>Novice to Professional</title>

    <!-- Bootstrap core CSS -->
    <link href="./Jumbotron Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Jumbotron Template for Bootstrap_files/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Jumbotron Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    

  <head>

 

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login, Sign up Header</title>



<link rel="stylesheet" href="assets/demo.css">
<link rel="stylesheet" href="assets/header-login-signup.css">
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

<header class="header-login-signup">

<div class="header-limiter">

<style>

.active-pink-textarea.md-form label.active {
    color: #f48fb1;
}
.pink-textarea textarea.md-textarea:focus:not([readonly]) {
    border-bottom: 1px solid #f48fb1;
    box-shadow: 0 1px 0 0 #f48fb1;
}
.pink-textarea.md-form .prefix.active {
    color: #f48fb1;
}

.active-amber-textarea.md-form label.active {
    color: #ffa000;
}
.amber-textarea textarea.md-textarea:focus:not([readonly]) {
    border-bottom: 1px solid #ffa000;
    box-shadow: 0 1px 0 0 #ffa000;
}
.amber-textarea.md-form .prefix.active {
    color: #ffa000;
}

.active-pink-textarea-2 textarea.md-textarea {
    border-bottom: 1px solid #f48fb1;
    box-shadow: 0 1px 0 0 #f48fb1;
}
.active-pink-textarea-2.md-form label.active {
    color: #f48fb1;
}
.active-pink-textarea-2.md-form label {
    color: #f48fb1;
}
.active-pink-textarea-2.md-form .prefix {
    color: #f48fb1;
}

.active-amber-textarea-2 textarea.md-textarea {
    border-bottom: 1px solid #ffa000;
    box-shadow: 0 1px 0 0 #ffa000;
}
.active-amber-textarea-2.md-form label.active {
    color: #ffa000;
}
.active-amber-textarea-2.md-form label {
    color: #ffa000;
}
.active-amber-textarea-2.md-form .prefix {
    color: #ffa000;
}


.header-user-dropdown {
   background-color:#292c2f;
   box-shadow:0 1px 1px #ccc;
   padding: 20px 40px;
   height: 80px;
   color: #ffffff;
   box-sizing: border-box;
}

.header-user-dropdown .header-limiter {
   max-width: 1200px;
   text-align: center;
   margin: 0 auto;
}
</style>

     <nav>
         <a href="feed.php"><b>Novice</b></a>
         <a href="https://novicetopro.home.blog/" class="selected">Get started</a>
         <!--<a href="#">Pricing</a> --> 
     </nav>
 
     <div class="header-user-menu">
		

			<ul>
				<li><a href="#">Settings</a></li>
				<li><a href="questions.php">Contribute</a></li>
				<li><a href="logout.php" class="highlight">Logout</a></li>
			</ul>
		</div>

 
 </div>
 
 </header>
 


 <?php


$course = $_SESSION['course'];
$username = $_SESSION['username'];
$query="SELECT * FROM users WHERE  username NOT IN (SELECT following FROM followers WHERE user1 = '$username')";
$results = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($results)) {
?>
<div class="container">

  <div class="card" style="width:400px">
    <div class="card-body">
      <h4 class="card-title"><?php echo htmlspecialchars($row['username']); ?></h4>
      <p class="card-text"><?php echo htmlspecialchars($row['bio']); ?></p>
      <p class="card-text"><?php echo htmlspecialchars($row['years']); ?> years of experiance</p>
      <?php 

      $following = $row['username'];

      ?>
          <form action="people_to_follow.php" method="post" >
      <a class="btn btn-primary" <?echo ' href="profile_answer.php?username=' . $row['username'] . '&user_id=' .$row['user_id'].'">View profile</a>'?>
      <a class="btn btn-primary" <?echo ' href="people_to_follow.php?following=' . $row['username'] . '">follow</a>'?>

    </div>
  </div>
  </div>
  <br>

<?php
     }
}

  

       ?>