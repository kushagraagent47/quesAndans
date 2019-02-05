<?php
session_start();
if (!isset($_POST['submit'])) {
?>

<!DOCTYPE html>
<html>


<head>
 

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
         <a href="https://novicetopro.home.blog/" class="selected">Get started</a>
         <!--<a href="#">Pricing</a> --> 
     </nav>
 
     <ul>
         <li><a href="login.php">Login</a></li>
         <li><a href="signup.php">Sign up</a></li>
     </ul>
 
 </div>
 
 </header>
   </head>

<style>
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

<form action="pro_signup.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Get started with novice</h1>
    <a href='https://novicetopro.home.blog/' ><p> Read documentation before getting started.</p></a>
    
    

    <label for="Name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>
    
    <label for="course"><b>Course you persuing<b></label>
    <select id="course" name="course">
    <option value="CSE">Computer Science</option>
      <option value="CSE">Ethical Hacking</option>
      <option value="ME">Mechanical Engineering</option>
      <option value="CE">Civil engineering</option>
      <option value="Pilot">Pilot</option>
    </select>

    <label for="Years"><b>Years in corresponding field</b></label>
    <input type="text" placeholder="1,2,3,4" name="years" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
    
    <label for="username"><b>username</b></label>
    <input type="text" placeholder="Enter username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="submit">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>
 

<?php
} else {

  $conn = mysqli_connect("localhost","root", "", "novice_to_pro");
    
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $course = $_POST['course'];
  $cateogary = "pro";
  $years = $_POST['years'];
  $password = md5($_POST['password']);
  $hash =  md5(rand(0,1000));
  $result = $conn->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
  $user_result = $conn->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());


  if ($result->num_rows > 0) {
      echo "user already exists";
      
  }
  else if ($user_result->num_rows > 0) {
    echo "Username already in use";
    
}
  else { 

      $sql = "INSERT INTO users (name, username, years ,email, course , password, hash) " 
              . "VALUES ('$name','$username', '$years', '$email', '$course', '$password','$hash')";

      if ( $conn->query($sql) ){

      $_SESSION["name"] = $name;
      $_SESSION["username"] = $username;
      $_SESSION["email"] = $email;
      $_SESSION["years"] = $years;
      $_SESSION["course"] = $course;
      $_SESSION["cateogary"] = $cateogary;
      $_SESSION["logged_in"] = true;

      $to      = $email; // Send email to our user
      $subject = 'Novice | Verification'; // Give the email a subject 
      $message = '

      Thanks for signing up!
      Your account has been created,
      Please click this link to activate your account:
      http://www.novicetopro.com/verify.php?email='.$email.'&hash='.$hash.'

'; // Our message above including the link
                   
  $headers = 'From:noreply@novicetopro.com' . "\r\n"; // Set from headers
  mail($to, $subject, $message, $headers); // Send our email

  header("location: feed.php"); 
      }

      else {
      echo "nai hua";
    }

  }
}

?>