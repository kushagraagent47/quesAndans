<?php

session_start();

if ( $_SESSION['logged_in'] != 1 ) {
    echo "You must log in before viewing your profile page!";
       
}
else {

$username = $_GET['username'];


?>



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
         <a href="#" class="selected">Blog</a>
         <!--<a href="#">Pricing</a> --> 
     </nav>
 
     <div class="header-user-menu">
		

			<ul>
				<li><a href="feed.php">Feed</a></li>
        	<li><a href="#"><? echo $_SESSION['username'];?></a></li>
				<li><a href="logout.php" class="highlight">Logout</a></li>
			</ul>
		</div>

 
 </div>
 
 </header>
 <?php

$conn = mysqli_connect("localhost","root", "", "novice_to_pro");

$query="SELECT * FROM questions WHERE answered_by = '$username'";
$results = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($results)) {
 

?>
<body>



    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h3><b><?php echo htmlspecialchars($row['topic_name']); ?></b></h3>
          <font size="4"><?php echo htmlspecialchars($row['question']); ?></font><br><br>
          <font size="2">Asked by <?php echo htmlspecialchars($row['asked_by']); ?></font>
          <?php
          $_SESSION['question_id'] = $row['ques_id'];
          $asked_by = $row['asked_by'];
          
          ?>
          <br>
          <br>
          <a class="btn btn-default" <?echo ' href="profile_answer2.php?ques=' . $row['question'] . '&ques_id=' .$row['ques_id'].'">View answer</a>'?>

        </div>
        
      </div>

      <hr>
     
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Jumbotron Template for Bootstrap_files/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./Jumbotron Template for Bootstrap_files/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Select Topic ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
  

</body></html>

<?php

    }
}


?>

