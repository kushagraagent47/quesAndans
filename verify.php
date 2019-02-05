<?php

session_start();

$_GET['email'];
$_GET['hash'];

$conn = mysqli_connect("localhost","root", "", "novice_to_pro");

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND verified='0'");

    if ( $result->num_rows == 0 )
    { 
        echo "Account has already been activated or the URL is invalid!";
        
    }
    else {
        echo "Your account has been activated!";

        $mysqli->query("UPDATE users SET verified='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;
        
        
    }
}
else {
    echo "something went wrong!";
}     
?>