<?php
session_start();
if (!isset($_POST['submit'])) {
?>

<!DOCTYPE html>
<html>


<head>
 
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <title>Novice to Professional</title>
 
 
 
 <link rel="stylesheet" href="assets/demo.css">
 <link rel="stylesheet" href="assets/header-login-signup.css">
 <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
 
 <header class="header-login-signup">
 
 <div class="header-limiter">
 
     
 
     <nav>
         <a href="index.php"><b>Novice</b></a>
         <a href="#" class="selected">Blog</a>
         <!--<a href="#">Pricing</a> --> 
     </nav>
 
     <ul>
         <li><a href="login.php">Login</a></li>
         <li><a href="student_signup.php">Sign up</a></li>
     </ul>
 
 </div>
 
 </header>
   </head>

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
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>

<form action="login.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Get started with novice</h1>
    

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>


    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="submit">login</button>
    </div>
  </div>
</form>

</body>
</html>
 

<?php
} else {

    $conn = mysqli_connect("localhost","root", "", "novice_to_pro");
  
  $email = $conn->escape_string($_POST['email']);
  $result = $conn->query("SELECT * FROM users WHERE email='$email'");
  
  if ( $result->num_rows == 0 ){ 
    ?>
      <div class="modal" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><b>username or password is incorrect<b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </div>
          <div class="modal-body">
           <p></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onClick="document.location.href='login.php'">Back to home</button>
          </div>
        </div>
      </div>
    </div>
    <script>
$('#myModal').modal();

</script>
<?php
  }
  else { 
      $users = $result->fetch_assoc();
      if (md5($_POST['password']) == $users['password']) {
          $_SESSION['user_id'] = $users['user_id'];
          $_SESSION['name'] = $users['name'];
          $_SESSION['username'] = $users['username'];
          $_SESSION['course'] = $users['course'];
          $_SESSION['email'] = $users['email'];
          $_SESSION['verified'] = $users['verified'];
          $_SESSION['moderator'] = $users['moderator'];
          $_SESSION['logged_in'] = true;
          header("location: feed.php");    
      }
  }
  }
  ?>