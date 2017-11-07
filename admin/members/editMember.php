<?php
include "../../config.php";

$memberID = mysqli_real_escape_string($link, $_GET['memberID']);

if (isset($_POST['editMember'])) {

$member = mysqli_real_escape_string($link, $_POST['memberName']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$role = mysqli_real_escape_string($link, $_POST['role']);

// edit city in database
$query = "UPDATE members SET name='$member', email='$email', password='$password', role='$role' WHERE memberID='$memberID' ";
$result = mysqli_query($link, $query);
header("Location: index.php");
} // end of if 

// locate the record in the database
$query = "SELECT * FROM members WHERE memberID='$memberID' ";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
extract($row);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Admin - Edit Member</title>
	<meta charset="utf-8" />

    <link href="../../css/bootstrap.css" rel="stylesheet" />
    <script src="../../js/jquery-1.10.1.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link href="../../css/style.css" rel="stylesheet" />
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    
		<!-- NAVBAR -->
		<div class="navbar navbar-inverse navbar-fixed-top">
            <a href="../index.php"><div class="navbar-brand"><img alt="logo" src="../../images/logo.jpg" class="logo img-responsive img-rounded"></div></a>
				<div class="container">
            
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeader">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<div class="collapse navbar-collapse navHeader">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="index.html">Home</a></li>
						<li><a href="#">Listings</a></li>
						<li><a href="#">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Member <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu scrollable-menu" role="menu">
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Wishlist</a></li>
                            </ul>
                        </li>
					</ul>
					<!-- RIGHT MENU -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Admin <b class="caret"></b> 
                            </a>
                            <ul class="dropdown-menu scrollable-menu" role="menu">
                                <li><a href="../cities/index.php">Cities</a></li>
                                <li><a href="../suburbs/index.php">Suburbs</a></li>
                                <li><a href="../properties/index.php">Properties</a></li>
                                <li><a href="index.php">Members</a></li>
                            </ul>
                        </li>
						<li><a href="#">Sign In</a></li>
						<li><a href="#">Wishlist</a></li>
					</ul>

				</div><!-- end of collapse navbar-collapse navMenu -->
				</div><!-- end of container -->
		</div><!-- end of navbar-->

		<!-- JUMBOTRON -->
    	<div class="jumbotron">
    		<p><span class="fa fa-user"></span> Members <span class="right"><img alt="logo" src="../../images/logo.jpg" class="logo img-responsive img-rounded"></span></p>
       	</div><!-- end of jumbotron --> 
    	
		<!-- MAIN CONTENT -->
		<form method="post" enctype="multipart/form-data">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td>Name: </td>
						<td><input type="text" name="memberName" size="40" value="<?php echo $name ?>"></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type="text" name="email" size="40" value="<?php echo $email ?>"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="text" name="password" size="40" value="<?php echo $password ?>"></td>
					</tr>
					<tr>
						<td>Role: </td>
						<td><input type="text" name="role" size="40" value="<?php echo $role ?>"></td>
					</tr>
				</table>
			</div>
			<input type="submit" name="editMember" value="Edit This Member" class="btn btn-success" />
		</form>
		
		<!-- FOOTER -->
		<div class="navbar navbar-fixed-bottom navbar-inverse">
			<div class="container">
				<div class="navbar-text">
					&copy; Copyright 2017. Jess and Casey Real Estate - PHP Assignment
				</div><!-- navbar-text -->
			</div><!-- container -->
		</div><!-- footer navbar -->
   
    </div><!-- end of container -->
</body>
</html>