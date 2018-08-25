<?php
session_start();
if (isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch']) &  isset($_SESSION['temp'])){

  if(isset($_GET['event']) /*you can validate the link here*/){
       $_SESSION['event']=$_GET['event'];
       header("Location: ../disp.php");
  }else{
  header("Location: logout.inc.php?session=closed_forcibly_by_admin");
  }


}
else{
  header("Location: index.php?login=begin");
  exit();
}

   ?>
