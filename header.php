<?php
include_once 'db/dbconnect.php';

if(!isset($_SESSION['student']))
{
 header("Location:login.php");
}



$studentquery = $dbc->prepare("SELECT firstName, studentID, lastName, p.program as program
FROM students as s
INNER JOIN programs as p
ON s.program = p.programID 
WHERE s.program = p.programID
AND studentID=:student");
$studentquery -> bindParam('student', $_SESSION['student']);
$studentquery -> execute();
$studentrow = $studentquery -> fetch();

$first = $studentrow['firstName'];
$last = $studentrow['lastName'];
$id = $studentrow['studentID'];
$program = $studentrow['program'];

?>

<!DOCTYPE html>
  <html>
    <head>

      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link type="text/css" rel="stylesheet" href="css/main.css">
    </head>

    <body>
   <div class="navbar-fixed">
    <nav class="z-depth-1">
     
     <a href="index.html"><img id="logo" src="images/trackme.png" alt="logo"></a>
      
   
       
 
    </nav>
  </div>  
  
<ul id="slide-out" class="side-nav fixed z-depth-1">
<div class="row">
    <div class="col s6 offset-s3">
            <img class="circle responsive-img z-depth-2" src="images/bryan.jpg" alt="icon">
    </div>
</div>


<div class="valign center">
    <?php
    echo '<p id="number">' . 'ID#' . $id . '</p>';
    echo '<p id="status">' . $program . '</p>';
	?>
 
</div>

<div class="divider"></div>
  
      <li><a href="index.php"><i class="small material-icons">dashboard</i><span>Home</span></a></li>
      <li><a href="portfolio.php"><i class="small material-icons">perm_identity</i><span>Portfolio</span></a></li>
      <li><a href="matrix.php"><i class="small material-icons">description</i><span>Matrix</span></a></li>
      <li><a href="settings.php"><i class="small material-icons">settings</i><span>Settings</span></a></li>
      <li><a href="logoutaction.php"><i class="small material-icons">power_settings_new</i><span>Log Out</span></a></li>
    </ul>
 		 <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
         
         <main>