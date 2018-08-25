<?php
session_start();
unset($_SESSION['code']);
if(isset($_POST['submit']) & isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch'])){
	if($_SESSION['u_branch']=="AD"){
	include_once 'dbh.inc.php';
	$branch=strtoupper(mysqli_real_escape_string($conn,$_POST['branch']));
	$eventname=mysqli_real_escape_string($conn,$_POST['eventname']);
	$eventcode=strtoupper(mysqli_real_escape_string($conn,$_POST['eventcode']));
	$status=mysqli_real_escape_string($conn,$_POST['status']);
	$max=mysqli_real_escape_string($conn,$_POST['max']);
	$min=mysqli_real_escape_string($conn,$_POST['min']);
	$fees=mysqli_real_escape_string($conn,$_POST['fees']);
	$discription=mysqli_real_escape_string($conn,$_POST['discription']);
  $accomodation=mysqli_real_escape_string($conn,$_POST['accomodation']);
	$mentor=mysqli_real_escape_string($conn,$_POST['mentor']);
	$pdf=mysqli_real_escape_string($conn,$_POST['pdf']);
	$teamname=mysqli_real_escape_string($conn,$_POST['teamname']);
	$project=mysqli_real_escape_string($conn,$_POST['project']);
	$feestype=mysqli_real_escape_string($conn,$_POST['feestype']);
	//check for empty
	if(empty($branch) || empty($eventname) || empty($eventcode) || empty($status) || empty($max) || empty($fees) || empty($discription) ){
		header("Location: ../events.php?event=empty");
		exit();
	}else{
	     	//check if ip chara are valid
				$sql="SELECT * FROM event_details WHERE eventcode='$eventcode'";
				$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
				echo $resultCheck;
				if($resultCheck>0){
					header("Location: ../events.php?event=already_exists");
					exit();
				}else{
					$sql="INSERT INTO event_details(branch,event_name,event_code,registration_status,max_participants,min_participants,fees,accomodation,need_mentor,need_pdf,need_team_name,need_project_name,discription,fees_type) VALUES('$branch','$eventname','$eventcode','$status','$max','$min','$fees','$accomodation','$mentor','$pdf','$teamname','$project','$discription','$feestype');";
					$res=mysqli_query($conn,$sql);
					$_SESSION['code']=$eventcode;
					header("Location: ../eventadded.php");

				exit();
			 }
			}
		}else{header("Location: ../events.php?event=emptynotadmin");
					exit();
				}

		}else{
	header("Location: ../events.php?event=noSessn");
	exit();
}
?>
