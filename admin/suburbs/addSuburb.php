<?php
include "../../config.php";

if (isset($_POST['addSuburb'])) {

$cityID = mysqli_real_escape_string($link, $_POST['cityName']);
$suburb = mysqli_real_escape_string($link, $_POST['suburbName']);

// add suburb to database
$query = "INSERT INTO suburbs (cityID, suburbName) VALUES ('$cityID', '$suburb') ";
$result = mysqli_query($link, $query);
header("Location: index.php");
} // end of if 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Admin - Add Suburb</title>
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
                                <li><a href="index.php">Suburbs</a></li>
                                <li><a href="../properties/index.php">Properties</a></li>
                                <li><a href="../members/index.php">Members</a></li>
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
    		<p><span class="fa fa-sitemap"></span> Suburbs <span class="right"><img alt="logo" src="../../images/logo.jpg" class="logo img-responsive img-rounded"></span></p>
       	</div><!-- end of jumbotron --> 
    	
		<!-- MAIN CONTENT -->
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
					<label>City:</label> 
					<select name="cityName">
								<option>Select City</option>
								<?php
								$query = "SELECT * FROM cities ORDER BY cityName ASC";
								$result = mysqli_query($link, $query);
								
								while ($row = mysqli_fetch_array($result)) {
									extract($row);
								?>
									<option value="<?php echo $cityID; ?>"><?php echo $cityName; ?></option>
								<?php
								} // end of while
								?>
					</select> 
				</div>
				<div class="form-group">
					<label>Suburb:</label> 
					<input type="text" name="suburbName" size="40" />
				</div>
			<input type="submit" name="addSuburb" value="Add This Suburb" class="btn btn-success" />
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