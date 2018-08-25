<?php
session_start();
if (isset($_SESSION['u_user'])  & isset($_SESSION['u_token']) & isset($_SESSION['u_branch'])){
	session_unset();
	session_destroy();
	header("Location: ../index.php?LogoutSuccessful");
	exit();
}
