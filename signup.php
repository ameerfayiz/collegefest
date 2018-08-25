<?php
session_start();
if(isset($_SESSION['u_user']) & isset($_SESSION['u_token']) & isset($_SESSION['u_branch'])){
  if($_SESSION['u_branch']!="AD"){
    header("Location: index.php");
    exit();
  }
}else{
  header("Location: index.php");
  exit();
}

?>

<!DOCTYPE html>
<html >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="UTF-8">
  <title>Takshak admin signup Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">
  <div class="info">
    <h1>Takshak admin panel</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="img/logo.png"/></div>

  <form class="login-form" action="includes/signup.inc.php" method="POST">
    <input type="text" placeholder="branch(AD/CR/EC/CS/CE/ME/EE/MC)" name="branch"/>
    <input type="text" placeholder="username" name="username"/>
    <input type="password" placeholder="password" name="password"/>
    <button  type="submit" name="submit">Signup</button>
    <p class="message" style="font-family:Arial">Have an Account? <a href="index.php"> Login</a></p>
  </form>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>
