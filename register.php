<?php 
	include('header.php');
?>
<link rel="stylesheet" type="text/css" href="css/login.css">
<div class="form-signin well">
	<h2 class="form-signin-heading">Create an Account</h2>
	<div id="error-div" class="hidden">
		<div id="error-alert" class="alert alert-success"></div>
	</div>
	<input id="registerName" type="text" class="form-control" placeholder="Full Name">
	<input id="loginUsername" type="text" class="form-control" placeholder="Username">
	<input id="loginPassword" type="password" class="form-control" placeholder="Password">
	<input id="loginPasswordCheck" type="password" class="form-control" placeholder="Confirm Password">
	<button id="signin-button" class="btn btn-large btn-primary" onclick="verifyRegistration()">Register</button>
</div>
<script src='js/login.js'></script>
<?php 
	echo file_get_contents('footer.php');
?>