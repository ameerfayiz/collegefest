<?php
session_start();


if(isset($_POST['submit'])){
	include_once 'dbh.inc.php';
	$uid=mysqli_real_escape_string($conn,$_POST['username']);
	$pwd=mysqli_real_escape_string($conn,$_POST['password']);

	//error handle
	if(empty($uid) || empty($pwd)){
		header("Location: ../index.php?login=Empty");
		exit();
	}else{
		$sql="SELECT * FROM users WHERE user='$uid'";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck<1){
			header("Location: ../index.php?login=Error_no_user");
			exit();
		}else{
			if($row=mysqli_fetch_assoc($result)){
				$hashedPwdCheck=password_verify($pwd,$row['password']);
				//echo $row['user_uid'];
				if($hashedPwdCheck==false){
					header("Location: ../index.php?login=Error_pwd");
					exit();
				}elseif($hashedPwdCheck==true){
					$_SESSION['u_user']=$row['user'];
					$_SESSION['u_branch']=$row['branch'];
					$_SESSION['u_token']=$row['hash'];
					header("Location: ../index.php?login=Success&token=" . $_SESSION['u_token'] . "&type=" . $_SESSION['u_branch']);
					exit();
				}
			}
		}
	}
}else{
		header("Location: ../index.php?login=loginError");
		exit();
	}
