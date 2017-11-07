<?php
include "../../config.php";
include '../../library/image-creation.php';

// get property id from url
$propertyID = mysqli_real_escape_string($link, $_GET['propertyID']);

// if user clicks button to submit changes
if (isset($_POST['editProperty'])) {

$title = mysqli_real_escape_string($link, $_POST['propertyTitle']);
$address = mysqli_real_escape_string($link, $_POST['propertyAddress']);
$city = mysqli_real_escape_string($link, $_POST['propertyCity']);
$suburb = mysqli_real_escape_string($link, $_POST['propertySuburb']);
$description = mysqli_real_escape_string($link, $_POST['propertyDescription']);
$shortDesc = mysqli_real_escape_string($link, $_POST['shortDescription']);
$price = mysqli_real_escape_string($link, $_POST['propertyPrice']);
$bed = mysqli_real_escape_string($link, $_POST['propertyBed']);
$bath = mysqli_real_escape_string($link, $_POST['propertyBath']);
$car = mysqli_real_escape_string($link, $_POST['propertyCar']);

//image file
$imgName = $_FILES['propertyImage']['name'];
$tmpName = $_FILES['propertyImage']['tmp_name'];
$ext = strrchr($imgName, ".");
$newName = md5(rand()*time()).$ext;
$imgPath = PRODUCT_IMG_DIR . $newName;
createThumbnail($tmpName, $imgPath, THUMBNAIL_WIDTH); 

// check if the image is updated
if ($tmpName != "") {
   $query = "UPDATE properties SET title='$title', address='$address', cityID='$city', suburbID='$suburb', description='$description', shortDesc='$shortDesc', price='$price', bedrooms='$bed', bathrooms='$bath', garage='$car', propertyImage='$newName' WHERE propertyID='$propertyID' ";
}
else {
   $query = "UPDATE properties SET title='$title', address='$address', cityID='$city', suburbID='$suburb', description='$description', shortDesc='$shortDesc', price='$price', bedrooms='$bed', bathrooms='$bath', garage='$car' WHERE propertyID='$propertyID' ";
}

mysqli_query($link, $query); // execute the SQL 
header("Location: index.php"); 
} // end of if statement

// locate the property record from database
$query = "SELECT properties.*, cities.cityName, suburbs.suburbName FROM properties, cities, suburbs WHERE propertyID='$propertyID' AND properties.cityID = cities.cityID AND properties.suburbID = suburbs.suburbID";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
extract($row);
$cityID_F = $cityID; // for select..option category
$suburbID_F = $suburbID;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Admin - Edit Property</title>
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
    		<p><span class="fa fa-home"></span> Properties <span class="right"><img alt="logo" src="../../images/logo.jpg" class="logo img-responsive img-rounded"></span></p>
       	</div><!-- end of jumbotron --> 
    	
		<!-- MAIN CONTENT -->
		<form method="post" enctype="multipart/form-data" style="margin-bottom:150px">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
				<div class="form-group">
					<label>Title:</label> 
					<br/>
					<input type="text" name="propertyTitle" size="40%" value="<?php echo $title; ?>"> 
				</div>
				<div class="form-group">
					<label>Address:</label> 
					<br/>
					<input type="text" name="propertyAddress" size="60" value="<?php echo $address; ?>"> 
				</div>
				<div class="form-group">
					<label>City:</label> 
					<select name="propertyCity" id="propertyCity" onload="fetchSelectedCityEdit(this.value);" onchange="fetchSelectedCity(this.value)" >
						<option>Select City</option>
						<?php
						$query = "SELECT * FROM cities ORDER BY cityName ASC";
						$result = mysqli_query($link, $query);
						while ($row = mysqli_fetch_array($result)) {
						extract($row);
						?>
						<option <?php if ($cityID_F == $cityID) echo "selected" ?> value="<?php echo $row['cityID']; ?>"><?php echo $row['cityName']; ?></option>
						<?php } // end of while ?>
					</select> 
				</div>
				<div class="form-group">
					<label>Suburb:</label> 
					<select name="propertySuburb" id="propertySuburb">
						<option>Select Suburb</option>
						<?php
						$query = "SELECT * FROM suburbs where suburbs.cityID = $cityID_F ORDER BY suburbName ASC";
						$result = mysqli_query($link, $query);
						while ($row = mysqli_fetch_array($result)) {
						extract($row);
						?>
						<option <?php if ($suburbID_F == $suburbID) echo "selected" ?> value="<?php echo $row['suburbID']; ?>"><?php echo $row['suburbName']; ?></option>
						
						<?php 
						} // end of while 
						?>
						
					</select>
				</div>
				<div class="form-group">
					<label>Price:</label> 
					<b>$ </b><input type="text" name="propertyPrice" size="20" value="<?php echo $price; ?>"> 
				</div>
				<div class="form-group">
					<label>Short Description:</label> 
					<br/>
					<textarea name="shortDescription" cols="62" rows="3"><?php echo $shortDesc; ?></textarea>
				</div>
				
			</div><!-- col -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
				<div class="form-group">
					<label>Description:</label> 
					<br/>
					<textarea name="propertyDescription" cols="62" rows="5"><?php echo $description; ?></textarea>
				</div>
				<div class="form-group">
					<label>Bedrooms: </label> 
					<select name="propertyBed">
						<option <?php if ($bedrooms == 1) echo "selected"; ?> value="1">1</option>
						<option <?php if ($bedrooms == 2) echo "selected"; ?> value="2">2</option>
						<option <?php if ($bedrooms == 3) echo "selected"; ?> value="3">3</option>
						<option <?php if ($bedrooms == 4) echo "selected"; ?> value="4">4</option>
						<option <?php if ($bedrooms == 5) echo "selected"; ?> value="5">5</option>
						<option <?php if ($bedrooms == 6) echo "selected"; ?> value="6">6</option>
					</select>
				</div>
				<div class="form-group">
					<label>Bathrooms: </label> 
					<select name="propertyBath">
						<option <?php if ($bathrooms == 1) echo "selected"; ?> value="1">1</option>
						<option <?php if ($bathrooms == 2) echo "selected"; ?> value="2">2</option>
						<option <?php if ($bathrooms == 3) echo "selected"; ?> value="3">3</option>
						<option <?php if ($bathrooms == 4) echo "selected"; ?> value="4">4</option>
					</select> 
				</div>
				<div class="form-group">
					<label>Garage: </label>
					<select name="propertyCar">
						<option <?php if ($garage == 0) echo "selected"; ?> value="0">0</option>
						<option <?php if ($garage == 1) echo "selected"; ?> value="1">1</option>
						<option <?php if ($garage == 2) echo "selected"; ?> value="2">2</option>
						<option <?php if ($garage == 3) echo "selected"; ?> value="3">3</option>
					</select> 
				</div>
				<div class="form-group">
					<label>Image: </label>
					<input type="file" name="propertyImage" />
					<br /><br />
					<img src="../../property-images/<?php echo $propertyImage; ?>" class="img-responsive" alt="display image" style="width:300px;"/>
				</div>
				<input type="submit" name="editProperty" value="Edit This Property" class="btn btn-success" />
			</div><!-- col -->
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