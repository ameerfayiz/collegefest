<?php


if (isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch'])){
  if($_SESSION['u_branch']=="AD"){
  include_once 'dbh.inc.php';
  $query = "SELECT DISTINCT branch FROM event_details";
  $result = mysqli_query($conn,$query);

  while($row = mysqli_fetch_array($result)){
    echo '<form  action="includes/set_branch.php?br=' . $row['branch'] . '" method="POST">
      <button type="submit" name="submit">' . $row['branch'] . '</button></form>';
   }
}
else{
  header("Location: index.php?login=begin");
  exit();
}}else{
  header("Location: index.php?login=begin");
  exit();}

   ?>
