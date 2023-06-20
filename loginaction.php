<?php
require_once("db/dbconnect.php");
$loginquery = $dbc -> prepare("SELECT studentID FROM students WHERE username = :username AND password = SHA(:password)");
$loginquery -> bindParam('username', $_POST['username']);
$loginquery -> bindParam('password', $_POST['password']);
$loginquery -> execute();

if($loginquery -> rowCount() == 1)    //sucessful login

{

	$loginrow = $loginquery -> fetch();

	session_start();

	$_SESSION['student'] = $loginrow['studentID'];

	$_SESSION['name'] = $loginrow['name'];

	header("Location:index.php");
	
	

}
else    //unsucessful login

{

	$msg = urlencode("Your username or password does not match. Please try again.");

	header("Location:login.php?msg=$msg");	

}

