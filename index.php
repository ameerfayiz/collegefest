<?php
session_start();

if(isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch'])){
  $_SESSION['u_browser']='chrome';
  if($_SESSION['u_branch']=="MR"){
    header("Location: details.php?token=" . $_SESSION['u_token']);
  }elseif($_SESSION['u_branch']=="CR"){
    header("Location: details.php?token=" . $_SESSION['u_token']);
  }elseif($_SESSION['u_branch']=="MC"){
    header("Location: details.php?token=" . $_SESSION['u_token']);
  }elseif($_SESSION['u_branch']=="AD"){
    header("Location: details.php?token=" . $_SESSION['u_token']);
  }elseif($_SESSION['u_branch']=="EC"){
    header("Location: details.php?token=" . $_SESSION['u_token']);
  }elseif($_SESSION['u_branch']=="ME"){
    header("Location: details.php?token=" . $_SESSION['u_token']);
  }elseif($_SESSION['u_branch']=="CE"){
    header("Location: details.php?token=" . $_SESSION['u_token']);
  }elseif($_SESSION['u_branch']=="EE"){
    header("Location: details.php?token=" . $_SESSION['u_token']);
  }elseif($_SESSION['u_branch']=="CS"){
    header("Location: details.php?token=" . $_SESSION['u_token']);
  }else {
    echo "hello, you are fake";
    session_unset();
    session_destroy();
    header("Location: index.php?login=loginError_false_branch");
		exit();
  }


//echo "u are logged in as " . $_SESSION['u_user'];
//echo '<form  action="includes/logout.inc.php" method="POST">
//      <button type="submit" name="submit">Logout</button>

}else
require 'login.php';
 ?>
