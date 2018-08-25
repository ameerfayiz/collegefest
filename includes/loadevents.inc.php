<?php

if (isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch']) &  isset($_SESSION['temp'])){
  include_once 'dbh.inc.php';
  $br=$_SESSION['temp'];
  $query = "SELECT event_name,event_code FROM event_details WHERE branch='$br';"; //You don't need a ; like you do in SQL
  $result = mysqli_query($conn,$query);

  while($row = mysqli_fetch_array($result)){

  echo '<form  action="includes/setevent.inc.php?event=' . $row['event_code'] . '" method="POST">
    <button type="submit" name="submit">' . $row['event_name'] . ' (' . $row['event_code'] . ') ' . '</button></form>';
   }
}
else{
  header("Location: index.php?login=begin");
  exit();
}

   ?>
