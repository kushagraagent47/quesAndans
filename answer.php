<?php

session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  echo "You must log in before viewing your profile page!";
     
}
else {
require 'header.php';


$ques_id = $_GET['ques_id'];

?>


<!DOCTYPE html>
<html lang="en">
<h2><b><?php echo $_GET['ques'];?> </b></h2><br>


<head>

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
 </head>
 <form method="post" action="answer.php">
  <textarea id="summernote" name="answer"></textarea>
  <input type="hidden" name="ques_id" value="<?php echo $ques_id ?>"/>
  <button type="submit" class="button button-block" name="register" >Submit</button>
</form>
<script>
$(document).ready(function() {
  $('#summernote').summernote();
});


</script>

<?php

if (isset($_REQUEST['register'])) {
  if($_SESSION['moderator'] == '1'){
    echo "blah";
    $conn = mysqli_connect("localhost","root", "", "novice_to_pro");
    $answer = mysqli_real_escape_string($conn, $_POST['answer']);
    $ans = htmlspecialchars($answer);
    $user = $_SESSION["username"];
    $ques_id = $_REQUEST['ques_id'];
    $sql = "UPDATE questions SET answer='$ans', approved='1', answered_by='$user' WHERE ques_id='$ques_id'";
    if ($conn->query($sql)){
       ?>
        <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Your answer has been submitted<b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
             <p></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onClick="document.location.href='feed.php'">Back to home</button>
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
    echo "nai hua!";
    echo mysqli_error($conn);
}
}
else {
  echo "hello world!";
  $conn = mysqli_connect("localhost","root", "", "novice_to_pro");
  $answer = mysqli_real_escape_string($conn, $_POST['answer']);
  $ans = htmlspecialchars($answer);
  $user = $_SESSION["username"];
  $ques_id = $_REQUEST['ques_id'];
  $sql = "UPDATE questions SET answer='$ans', approved='0',answered_by='$user' WHERE ques_id='$ques_id'";
  if ($conn->query($sql)){
     ?>
      <div class="modal" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><b>Your answer is up for approval<b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </div>
          <div class="modal-body">
           <p></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onClick="document.location.href='feed.php'">Back to home</button>
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
  echo "nai hua";
}
  }
}
}

?>
