<?php


if(isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch'])){
  header("Location: ../index.php?login=Success&token=" . $_SESSION['u_token'] . "&type=" . $_SESSION['u_branch']);
  exit();
}

 ?>
<!DOCTYPE html>
<html >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <title>Takshak ADMIN Portal</title>
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

  <form class="login-form" action="includes/login.inc.php" method="POST">
    <input type="text" placeholder="username" name="username"/>
    <input type="password" placeholder="password" name="password"/>
    <button  type="submit" name="submit">login</button>
  <!--  <p class="message" style="font-family:Arial">Not registered? <a style="font-family:Arial" href="signup.php">Create an account</a></p>-->
  </form>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>
