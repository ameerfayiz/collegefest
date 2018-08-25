<?php

if(isset($_POST['submit'])){
	include_once 'dbh.inc.php';
	$branch=strtoupper(mysqli_real_escape_string($conn,$_POST['branch']));
	$uid=mysqli_real_escape_string($conn,$_POST['username']);
	$pwd=mysqli_real_escape_string($conn,$_POST['password']);

	//check for empty
	if(empty($branch) || empty($pwd) || empty($uid)){
		header("Location: ../signup.php?signup=empty");
		exit();
	}else{
	     	//check if ip chara are valid
				$sql="SELECT * FROM users WHERE user='$uid'";
				$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
				echo $resultCheck;
				if($resultCheck>0){
					header("Location: ../signup.php?signup=already_exists");
					exit();
				}else{
					//hash pswd
					$hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);
					$token=password_hash($branch,PASSWORD_DEFAULT);
					//INSERT
					$sql="INSERT INTO users(branch,user,password,hash) VALUES('$branch','$uid','$hashedpwd','$token');";
					$res=mysqli_query($conn,$sql);
					header("Location: ../signup.php?signup=success");
					//header("Location: ../signup.php?signup=Successful");
				exit();
			 }
			}
		}else{
	header("Location: ../signup.php");
	exit();
}
?>
