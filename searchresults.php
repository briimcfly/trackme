<?php
include("header.php");
if(isset( $_POST['search']))
{
	if($_POST['search'] != "")
	{
		$search = $_POST['search'];	
	}
	else
	{
		header("matrix.php");	
	}
}
else if (isset( $_GET['search']))
{
	$search = $_GET['search'];
}
else
{
	header("matrix.php");
}

$numPerPage = 12;

if(isset($_GET['numPages']))
{
	$numPages = $_GET['numPages'];
	$total = $_GET['total'];	
}
else
{
	$count = $dbc->prepare("SELECT COUNT(*), classID FROM classes WHERE className LIKE :search");
	$count->bindValue(":search", "%$search%");
	$count ->execute();
	$result = $count->fetch();
	$total = $result[0];
	$id = $result[1];
	
	if($total > $numPerPage)
	{
		$numPages = ceil($total/$numPerPage);	
	}
	else{
		$numPages = 1;	
	}
}

if(isset($_GET['start']))
{
	$start = $_GET['start'];	
}
else
{
	$start = 0;	
}
$query = $dbc -> prepare("SELECT classID, className, description, credits, prereq FROM classes WHERE className LIKE :search LIMIT $start, $numPerPage");
$query->bindValue(':search', "%$search%");
$query->execute();

?>
<div class="row">
        <div class="col xs12 s12 m12">
          <div class="card">
          
            <div class="card-content black-text">
         
 			 <table class="responsive-table striped">
             
       <form method="post" action="searchresults.php">
        <div class="input-field">
          <input id="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
      



        <thead>
          <tr>
              <th data-field="id">ID</th>
              <th data-field="class">Class</th>
              <th data-field="description">Description</th>
              <th data-field="credits">Credits</th>
              <th data-field="prereq">PreReq</th>
          </tr>
        </thead>
        
         <tbody class="table">
         <?php

if($total == 1)
{
	header("Location:detail.php?class=$id");
}
else if($total > 1)
{

	
	while($row = $query->fetch())
 {


	echo "<td>" .$classesrow['classID'] . "</td>";
			   echo "<td>" .$classesrow['className'] . "</td>";
			   echo "<td>" . substr($classesrow['description'], 0, 100) . "..." . "</td>";
			   echo "<td>" .$classesrow['credits'] . "</td>";
			   echo "<td>" .$classesrow['prereq'] . "</td>";
	



 }


}
else
{
	echo "<div class='searchresult'>";
	
	echo "<h1>Sorry!</h1>";
	echo "<p> No records match for $search</p>";
	
	echo "</div>";
}


