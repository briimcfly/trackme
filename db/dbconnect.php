<?php

//$user ='brydesig_admin';
//$pass= 'NewPass0666!';
$user="root";
$pass="";


try 

{

//$dbc = new PDO('mysql:host=localhost;dbname=brydesig_studenttracker',$user, $pass);
$dbc = new PDO('mysql:host=localhost;dbname=studenttracker',$user, $pass);
}

catch(PDOException $e)

{

	echo $e -> getMessage();
	echo $output;

}


?>