<?php

session_start();
if (isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch'])){

  if($_SESSION['u_branch']=="AD"){
  if(isset($_GET['br']) /*you can validate the link here*/){
         $_SESSION['temp']=$_GET['br'];
         header("Location: ../details.php");
  }else{
    header("Location: logout.inc.php");
  }

}else{
  header("Location: logout.inc.php");//"Location: ../index.php?login=begin");
  exit();
}
}else{
  header("Location: logout.inc.php");//header("Location: ../index.php?login=begin");
  exit();
}


?>
