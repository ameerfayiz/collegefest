<?php
session_start();
if(isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch']) &   isset($_SESSION['temp']) &  isset($_SESSION['event'])){

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
  <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
  <title>details</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">

  <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML =
              "<html><head><title></title></head><body>" +
              divElements + "</body>";
            window.print();
            document.body.innerHTML = oldPage;}
   </script>
</head>

<body>

<div class="container">
  <div class="info">
    <h1>DETAILS</h1>
  </div>
</div>

<div class="form" style="max-width: 800px;">
  <div class="thumbnail"><img src="img/logo.png"/></div>
  <div class="form" style="max-width: 800px;padding: 1px;">
  <?php
  echo "<div style='padding:0.5%;float:right;width:19%'><form  action='includes/logout.inc.php' method='POST'><button type='submit' name='submit'>Logout</button></form></div>";
  echo "<div style='padding:0.5%;float:right;width:19%'><form  action='details.php' method='POST'><button type='submit' name='submit'>Change Event</button></form></div>";

  if($_SESSION['u_branch']=="AD"){
  echo "<div style='padding:0.5%;float:right;width:19%'><form  action='events.php' method='POST'><button type='submit' name='submit'>Add Events</button></form></div>";
  echo "<div style='padding:0.5%;float:right;width:19%'><form  action='includes/chooseBranch.inc.php' method='POST'><button type='submit' name='submit'>Change Branch</button></form></div>";
  echo "<div style='padding:0.5%;float:right;width:19%'><form  action='signup.php' method='POST'><button type='submit' name='submit'>Add Admin</button></form></div>";

  }


  ?>
  </div>

  <!--  <p class="message">Not registered? <a href="#">Create an account</a></p>-->
</div>

<div id="formdetails">

  <?php
   include_once 'includes/dbh.inc.php';
   $br=$_SESSION['temp'];
   $event=$_SESSION['event'];
   $query = "SELECT * FROM registered_details WHERE event_code='$event'";
   $result = mysqli_query($conn,$query);
   $eventquery = "SELECT * FROM event_details WHERE event_code='$event'";
   $eventresult = mysqli_query($conn,$eventquery);
   $eventrow = mysqli_fetch_array($eventresult);
   if($eventrow['accomodation']=="yes"){$extra1='<th>ACMDN</th>';}else{$extra1="";}
   if($eventrow['fees']>0){$extra2='<th>PAID</th>';}else{$extra2="";}
   echo '<table class="main"><tr><th>sl</th><th>TEAM details</th><th>COLLEGE</th><th>MENTOR</th><th>MENTOR CONTACT</th><th>TEAM CONTACT</th>' . $extra1 . $extra2 . '</tr>';
   $a = 0;

   while($row = mysqli_fetch_array($result)){
     $a=$a+1;
     echo '<tr><td>'. $a . '</td><td class="nogap">    <table class="internal">';
     $persons=array($row['p1'],$row['p2'],$row['p3'],$row['p4'],$row['p5'],$row['p6']);

     for( $i = 1; $i<=$row['no_of_participants']; $i++ ) {
          $j=$i-1;
          $subquery = "SELECT * FROM person WHERE user_id='$persons[$j]'";
          $subresult = mysqli_query($conn,$subquery);
          $subrow = mysqli_fetch_array($subresult);
          echo '<tr><td>'.$i.'</td><td>'.  $subrow['name'] .'</td><td>'.  $subrow['email'] .'</td></tr>';

        }
      if($eventrow['accomodation']=="yes"){$extra1='<td>' . $row['accomodation'] . '</td>';}else{$extra1="";}
      if($eventrow['fees']>0){$extra2='<td> Rs.' . $row['paid'] . '</td>';}else{$extra2="";}
      echo '</table></td> <td>' . $row['college'] . '</td><td>' . $row['mentor'] . '</td><td>' . $row['contact_mentor'] . '</td><td>' . $row['contact_team']  . ' / ' . $row['contact_team2'] . ' / ' . $row['email_team'] . '</td>' . $extra1 . $extra2  . '</tr>';
   }

   echo '</table>';

  ?>

</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>
