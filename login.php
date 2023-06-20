<?php 
include("stylehead.php");
?>
<?php

//if ($_GET['msg']!= null) {
//	echo $_GET['msg'];
//}
?>
<div id="loginp">
	
    
   	<div id="login-logo" class="row">
    	<div class="col s12">
        <img src="images/trackme.png" alt="logo">
       </div>
       <div class="col s4 offset-s4">
        <h5 class="white-text center-align">The Better AI SAC Compainion</h5>
        <p class="white-text center-align">Keep track of your classes, stay on up-to-date on your weekly schedule, and manage your student portfolio easily and effectivly with TRACKME.</p>
        </div>
       
  

<div class="row">
<div class="col s4 offset-s4">
<div class="card">
<div class="card-content">
<form method="post" action="loginaction.php">
	<label for="username">Username</label>
	<input type="text" name="username" id="username">
	<label for="password">Password</label>
	<input type="password" name="password" id="password">
     <div class="row">

<div class="col s6">
     <button id="register" class="btn waves-effect waves-light" type="submit" name="action">Register</button>
 </div>
      
<div class="col s6">    
     <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
</div>

  
  </div>
  </div>
	</div><!--end card-->
  
 
    </form>

</div>
</div>
</div>