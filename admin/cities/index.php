<?php
include "../../config.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Admin - Cities</title>
	<meta charset="utf-8" />

    <link href="../../css/bootstrap.css" rel="stylesheet" />
    <script src="../../js/jquery-1.10.1.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link href="../../css/style.css" rel="stylesheet" />
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <script>
		function deleteCity(cityID) {
	  		if (confirm("Are you sure you want to delete this city?")) {
	    		window.location.href = "deleteCity.php?cityID=" + cityID;
	  		} // end of if
		} // end of function
	</script>

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
                                <li><a href="index.php">Cities</a></li>
                                <li><a href="../suburbs/index.php">Suburbs</a></li>
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
    		<p><span class="fa fa-map-marker"></span> Cities <span class="right"><img alt="logo" src="../../images/logo.jpg" class="logo img-responsive img-rounded"></span></p>
       	</div><!-- end of jumbotron --> 
    	
		<!-- MAIN CONTENT -->
		
		<a href="addCity.php">
			<div class="btn btn-primary">
				Add New City
			</div>
		</a>
		<br /><br /><br />
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th class="col-md-2">ID</th>
					<th class="col-md-8">City</th>
					<th class="col-md-1 text-center">Edit</th>
					<th class="col-md-1 text-center">Delete</th>
				</tr>
				
				<?php 
					$query = "SELECT * FROM cities ORDER BY cityName ASC";
					$result = mysqli_query($link, $query);
					
					while ($row=mysqli_fetch_array($result)) {
				?>
								
				<tr>
					<td>
						<?php echo $row['cityID']; ?>
					</td>
					<td>
						<?php echo $row['cityName']; ?>
					</td>
					<td class="text-center">
						<a href="editCity.php?cityID=<?php echo $row['cityID']; ?>">
							<span class="fa fa-pencil-square fa-2x"></span>
						</a>
					</td>
					<td class="text-center">
						<a href="javascript:deleteCity(<?php echo $row['cityID']; ?>)">
							<span class="fa fa-trash fa-2x"></span>
						</a>
					</td>
				</tr>
				
				<?php
					} // end of while
				?>	
					
			</table>
		</div>
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