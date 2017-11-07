<?php
include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Admin - Home</title>
	<meta charset="utf-8" />

    <link href="../css/bootstrap.css" rel="stylesheet" />
    <script src="../js/jquery-1.10.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/components-font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

</head>
<body>
    <div class="container">
    
		<!-- NAVBAR -->
		<div class="navbar navbar-inverse navbar-fixed-top">
            <a href="index.php"><div class="navbar-brand"><img alt="logo" src="../images/logo.jpg" class="logo img-responsive img-rounded"></div></a>
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
                                <li><a href="cities/index.php">Cities</a></li>
                                <li><a href="suburbs/index.php">Suburbs</a></li>
                                <li><a href="properties/index.php">Properties</a></li>
                                <li><a href="members/index.php">Members</a></li>
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
    		<p><span class="fa fa-home"></span> Admin Home <span class="right"><img alt="logo" src="../images/logo.jpg" class="logo img-responsive img-rounded"></span></p>
    		<br />
<!---------------------------------------------- PHP HERE ------------------------------------------------->
    		<p>Hello ... admin ... </p>
    	</div><!-- end of jumbotron --> 
    	
		<!-- MAIN CONTENT -->
		<div class="row">
            
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-offset-2 col-md-offset-2">
                <a href="cities/index.php">
                    <div class="box">
                        <span class="fa fa-map-marker"></span>
                        <h2>Cities</h2>
                    </div><!-- box -->
                </a>
            </div><!-- col 1 -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="suburbs/index.php">
                    <div class="box">
                        <span class="fa fa-sitemap"></span>
                        <h2>Suburbs</h2>
                    </div><!-- box -->
                </a>
            </div><!-- col 2 -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-offset-2 col-md-offset-2">
                <a href="properties/index.php">
                    <div class="box">
                        <span class="fa fa-home"></span>
                        <h2>Properties</h2>
                    </div><!-- box -->
                </a>
            </div><!-- col 3 -->
            <!--<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="wishlist/index.php">
                    <div class="box">
                        <span class="fa fa-heart"></span>
                        <h2>Wishlist</h2>
                    </div><!-- box -->
                <!--</a>
            </div><!-- col 4 -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="members/index.php">
                    <div class="box">
                        <span class="fa fa-user"></span>
                        <h2>Members</h2>
                    </div><!-- box -->
                </a>
            </div><!-- col 5 -->

		</div><!-- row -->
		
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