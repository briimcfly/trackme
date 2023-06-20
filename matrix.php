<?php 
session_start();
include("header.php");

$numPerPage =30;

if(isset($_GET['numPages']))
{
	$numPages = $_GET['numPages'];
}
else{
 
 $count = $dbc->prepare("SELECT COUNT(*) FROM classes");
		$count -> execute();
		$numRows =  $count->fetch();
		
		if($numRows[0] > $numPerPage)
		{
			$numPages = ceil($numRows[0]/$numPerPage);
			
			
		}
		else
		{
			$numPages = 1;
			
		}
		
}



?>


<?php

if(isset($_GET['start']))
{
	$start = $_GET['start'];
}
else {
	
	$start = 0;

}


$classesquery = $dbc->prepare("SELECT classID, className, description, credits, prereq
FROM classes
LIMIT $start, $numPerPage");
$classesquery -> execute();


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
		 while($classesrow =$classesquery->fetch())
		 
		 {
			
			
				 
          echo"<tr>";
               
               echo "<td>" .$classesrow['classID'] . "</td>";
			   echo "<td>" .$classesrow['className'] . "</td>";
			   echo "<td>" . substr($classesrow['description'], 0, 100) . "..." . "</td>";
			   echo "<td>" .$classesrow['credits'] . "</td>";
			   echo "<td>" .$classesrow['prereq'] . "</td>";
			   
               
          echo "</tr>";
			 
		  
			 
		 }
		 
		 ?>
          
         </tbody>
         

         </table>
        
         <?php
		 
		 echo '<ul class="center-align pagination">';
         
         if($numPages > 1)
{
	$currentPage = ($start/$numPerPage) + 1;
	

	
	for($i = 1; $i <= $numPages; $i++)
	{
		if($i != $currentPage)
		{
			echo "<li><a href='matrix.php?start=" . ($numPerPage * ($i - 1)) . "&numPages=$numPages'>$i</a></li>";	
		
		}
		else
		{
			
			echo "<li class='active'>" . $i . "</li>";
			
		}
}
	

	
	
}

echo '</ul>';
?>
         

         
         
         
         