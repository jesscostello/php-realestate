<?php
include "../../config.php";
include "../../library/image-creation.php";

if (isset($_POST['addGalleryImage'])) {

$propertyID = mysqli_real_escape_string($link, $_GET['propertyID']);
$alt = mysqli_real_escape_string($link, $_POST['altText']);
$caption = mysqli_real_escape_string($link, $_POST['caption']);

//image file
$imgName = $_FILES['galleryImage']['name'];
$tmpName = $_FILES['galleryImage']['tmp_name'];
$ext = strrchr($imgName, ".");
$newName = md5(rand()*time()).$ext;
$imgPath = PRODUCT_IMG_DIR . $newName;
createThumbnail($tmpName, $imgPath, THUMBNAIL_WIDTH); 

// add image to database
$query = "INSERT INTO property_gallery (propertyID, altText, caption, galleryImage) VALUES ('$propertyID', '$alt', '$caption', '$newName') ";
$result = mysqli_query($link, $query);
header("Location: displayGallery.php?propertyID=".$propertyID); 

} // end of if 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Admin - Add Gallery Image</title>
	<meta charset="utf-8" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
    <link href="../../css/bootstrap.css" rel="stylesheet" />
    <script src="../../js/jquery-1.10.1.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link href="../../css/style.css" rel="stylesheet" />
    <link href="../../css/components-font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <script src="../../js/script.js"></script>
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
                                <li><a href="index.php">Properties</a></li>
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
    		<p><span class="fa fa-home"></span> Properties <span class="right"><img alt="logo" src="../../images/logo.jpg" class="logo img-responsive img-circle"></span></p>
       	</div><!-- end of jumbotron --> 
    	
		<!-- MAIN CONTENT -->
		<form method="post" enctype="multipart/form-data" > 
				<div class="form-group">
					<label>Image: </label>
					<input type="file" name="galleryImage" />
				</div>
				<div class="form-group">
					<label>Caption:</label> 
					<input type="text" name="caption" size="100" > 
				</div>
				<div class="form-group">
					<label>Alt Text:</label> 
					<input type="text" name="altText" size="100"> 
				</div>
				
				<input type="submit" name="addGalleryImage" value="Add This Image To Gallery" class="btn btn-success" />			
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