<?php
session_start();
if(isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch'])){

}
else{
  header("Location: index.php?login=begin");
  exit();
}
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>details</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">
  <div class="info">
    <h1>Choose an Event</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="img/logo.png"/></div>
  <?php
   if($_SESSION['u_branch']=="AD"){
   if(isset($_SESSION['temp'])) {
          require 'includes/loadevents.inc.php';
          echo "<form  action='includes/chooseBranch.inc.php' method='POST'><button id='extra_button' type='submit' name='submit'>Change Branch</button></form>";
          echo "<form  action='events.php' method='POST'><button id='extra_button' type='submit' name='submit'>Add Events</button></form>";
          echo "<form  action='signup.php' method='POST'><button id='extra_button' type='submit' name='submit'>Add ADMIN</button></form>";
        }
    else{
          require 'includes/loadbranches.inc.php';
          echo "<form  action='events.php' method='POST'><button id='extra_button' type='submit' name='submit'>Add Events</button></form>";
    }
   }else{
     $_SESSION['temp']=$_SESSION['u_branch'];
     require 'includes/loadevents.inc.php';

   }



   ?>


  <form  action="includes/logout.inc.php" method="POST">
    <button id='extra_button' type="submit" name="submit">Logout</button>
  </form>



  <!--  <p class="message">Not registered? <a href="#">Create an account</a></p>
  <a href="events.php?show=true" style="text-decoration:none;"><button name="submit">Logout</button></a>-->
  </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>
