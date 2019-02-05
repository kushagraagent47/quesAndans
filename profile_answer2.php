<?php
session_start();
include 'header.php';

if ( $_SESSION['logged_in'] != 1 ) {
    echo "You must log in before viewing your profile page!";
       
}
else {
    
?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>

.boxed {
  border: 1px solid green ;
}

</style>
</head>
<?php

$question = $_GET['ques'];

$conn = mysqli_connect("localhost","root", "", "novice_to_pro");
$query="SELECT * FROM questions WHERE question = '$question'";
$results = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($results)) {

?>
    <body>
    <h2><b><?php echo $_GET['ques'];?> </b></h2><br>
    <small>asked by <cite><?php echo htmlspecialchars($row['asked_by']);  ?></cite></small>
    


<blockquote>
     <p><?php echo htmlspecialchars_decode($row['answer']);  ?></p>
     <small>by <cite><?php echo htmlspecialchars($row['answered_by']); } } ?></cite></small>
</blockquote>
