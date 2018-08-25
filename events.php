<?php
session_start();
if (isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch'])){
if($_SESSION['u_branch']!="AD"){
  header("Location: index.php?login=begin");
  exit();
}
  }else{
  header("Location: index.php?login=begin");
  exit();
}
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Events</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">
  <script>
   function validateForm() {
    var x = document.forms["eventform"]["branch"].value;
    if (x == "") {alert("branch must be filled out");return false;}
    var x = document.forms["eventform"]["eventname"].value;
    if (x == "") {alert("event name must be filled out");return false;}
    var x = document.forms["eventform"]["eventcode"].value;
    if (x == "") {alert("event code must be filled out");return false;}
    var x = document.forms["eventform"]["max"].value;
    if (x == "") {alert("maximum people must be filled out");return false;}
    var x = document.forms["eventform"]["min"].value;
    if (x == "") {alert("min people must be filled out");return false;}
    var x = document.forms["eventform"]["fees"].value;
    if (x == "") {alert("fees must be filled out");return false;}
    var x = document.forms["eventform"]["accomodation"].value;
    if (x == "") {alert("accomodation must be filled out");return false;}
    var x = document.forms["eventform"]["discription"].value;
    if (x == "") {alert("discription must be filled out");return false;}
    var x = document.forms["eventform"]["status"].value;
    if (x == "") {alert("status must be filled out");return false;}
    var x = document.forms["eventform"]["mentor"].value;
    if (x == "") {alert("need mentor must be filled out");return false;}
    var x = document.forms["eventform"]["pdf"].value;
    if (x == "") {alert("need pdf must be filled out");return false;}
    var x = document.forms["eventform"]["teamname"].value;
    if (x == "") {alert("need team name must be filled out");return false;}
    var x = document.forms["eventform"]["project"].value;
    if (x == "") {alert("need project name must be filled out");return false;}
    }
</script>

</head>

<body>

<div class="container">
  <div class="info">
    <h1>Add an Event</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="img/logo.png"/></div>

  <form name="eventform" onsubmit="return validateForm()" class="login-form" action="includes/addevent.inc.php" method="POST">
  <!--<input type="text" placeholder="branch(CR/EC/CS/CE/ME/EE/MC)" name="branch"/>-->
  <select name="branch" placeholder="Hosted by">
      <option value="CR">Core Event</option>
      <option value="EC">Electronics & Comm. Event</option>
      <option value="CS">CS Event</option>
      <option value="CE">Civil Event</option>
      <option value="ME">Mechanical Event</option>
      <option value="EE">Electrical & Electronics Event</option>
      <option value="MC">MCA Event</option>
  </select>
  <input type="text" placeholder="Event Name" name="eventname"/>
  <input type="text" placeholder="Event Code" name="eventcode"/>
  <select name="status">
      <option value="open">Registration is Open</option>
      <option value="closed">Registration has been Closed</option>
  </select>
  <label>Maximum Participants</label>
  <select name="max">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="5">6</option>
  </select>
  <label>Minimum Participants</label>
  <select name="min">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="5">6</option>
  </select>
  <select name="feestype">
      <option value="per Group">Fees is Per Group</option>
      <option value="per Person">Fees is Per Person</option>
  </select>
  <input type="text" placeholder="Fees in RS (0 if no fees)" name="fees"/>
  <input type="text" placeholder="need pdf (yes/no)" name="pdf"/>
  <!--<input type="text" placeholder="accomodation (yes/no)" name="accomodation"/>-->
  <select name="accomodation">
      <option value="no">Won't Provide Accomodation</option>
      <option value="yes">We Provide Accomodation</option>
  </select>
  <!--<input type="text" placeholder="need mentor (yes/no)" name="mentor"/>-->
  <select name="mentor">
      <option value="no">No need of Mentor</option>
      <option value="yes">Need Mentor</option>
  </select>
  <!--<input type="text" placeholder="need teamname (yes/no)" name="teamname"/>-->
  <select name="teamname">
      <option value="no">No Need of Team Name</option>
      <option value="yes">Need A Team Name</option>
  </select>
  <!--<input type="text" placeholder="need project name (yes/no)" name="project"/>-->
  <select name="project">
      <option value="no">No Need of Project Name</option>
      <option value="yes">Need A Project Name</option>
  </select>
  <input style="height:100px" type="text" placeholder="Discription" name="discription"/>
  <button  type="submit" name="submit">Add Event</button>
  <!--  <p class="message">Not registered? <a href="#">Create an account</a></p> -->
  </form>
  </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>
