<?php 
session_start();
include("header.php");
?>

<?php
$classesquery = $dbc->prepare("SELECT d.classID, c.className, d.studentID, d.classStatus, d.roomNumber, d.time, d.instructorID, i.instructorLastName, c.credits
FROM classdetail AS d 
INNER JOIN classes AS c
ON d.classID = c.classID 
INNER JOIN instructors AS i 
ON d.instructorID = i.instructorID 
WHERE d.classStatus = 1
AND d.studentID=:student");
$classesquery -> bindParam('student', $_SESSION['student']);
$classesquery -> execute();

		
		 
	


?>


 	<div class="row">
        <div class="col xs12 s12 m12">
          <div class="card">
            <div class="card-content black-text">
         
 			 <table class="responsive-table striped">
             
        <thead>
          <tr>
              <th data-field="name">Class</th>
              <th data-field="serial">Course ID</th>
              <th data-field="purchase">Teacher</th>
              <th data-field="adverse">Meet Days</th>
              <th data-field="activity">Class Time</th>
              <th data-field="operation">Room</th>
              <th data-field="operation">Credit Hrs</th>
              
              
          </tr>
        </thead>

        <tbody class="table">
        <?php
		 while($classesrow =$classesquery->fetch()) 
		 {
		
          echo "<tr>";
		  
                echo "<td>" .$classesrow["className"] . "</td>";
                echo "<td>" .$classesrow["classID"] . "</td>";
                echo "<td>" .$classesrow["instructorLastName"] . "</td>";
                echo "<td>Tue</td>";
                echo "<td>" .$classesrow["time"] . "</td>";
                echo "<td>" .$classesrow["roomNumber"] . "</td>";
                echo "<td>" .$classesrow["credits"] . "</td>";
				
               
         echo "</tr>";
		 }
		  
		  ?>
          
        </tbody>
      </table>
        
      </div>
     
        </div>
			</div>              
      </div><!-- END ROW -->
      
      <div class="row">
      	<div class="col xs12 s12 m6">
          <div class="card">
            <div class="card-content black-text">
              <span class="card-title">Portfolio Pieces (3/5)</span>
              <div class="section">
             <p class="title">Web Design &amp; Development</p>
             <p class="light">Website for Gods Gym</p>
           <div class="divider"></div>
           </div>
           <div class="section">
             <p class="title">Layout</p>
             <p class="light">Magazine porfolio spread</p>
           <div class="divider"></div>
           </div>
           <div class="section">
             <p class="title">Typography</p>
             <p class="light">Process Portfolio from Type I</p>
           <div class="divider"></div>
           </div>
           
            </div>
           
          </div>
        </div>
        
        <div class="col xs12 s12 m6">
          <div class="card">
            <div class="card-content black-text">
              <span class="card-title">Degree Overview</span>
          
             	<div class="section">
             <p class="title">General Education</p>
           <progress max="100" value="82"></progress>
           </div>
           <div class="divider"></div>
           <div class="section">
             <p class="title">Major Specific</p>
           <progress max="100" value="48"></progress>
           </div>
           <div class="divider"></div>
           <div class="section">
             <p class="title">Total Program</p>
           <progress max="100" value="65"></progress>
           </div>
          

            </div>
           
          </div>
        </div>
      </div>
      
      <?php

include("footer.php");

?>



