<?php



require_once("db/dbconnect.php");

if(isset($_FILES["theFile"]) && $_FILES["theFile"]["error"] != 4)
{

	
	//update the student table with the correct file name for the profile pic, Note that you may actually be doing this wehn the student creates the account, in which case this would simply be part of the query that creates it
	
	$uploadquery = $dbc->prepare("UPDATE students SET profilePic = :picture WHERE studentID = '780392'");
	
	//this is the key line, it gets the file name from the upload and sticks it into the database
	
	$uploadquery = $dbc->bindParam("picture", $_FILES["theFile"]["name"]);
	
	//not that we'll need to get the student ID from somewhere, possibly the session with which they're logged in
	
	//of course, if this is actually the acount creating query, then you won't need to worry about that
	
	//I'm going to hard-code an id in for now, because.
	
	
	
	$uploadquery->execute();
	
	$uploads = $uploadquery->fetchAll();
	
	var_dump("$uploads");
}