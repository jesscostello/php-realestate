<?php
include "../../config.php";

// retrieve property ID from URL
$propertyID  = $_GET['propertyID'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Admin - Property Gallery</title>
	<meta charset="utf-8" />

    <link href="../../css/bootstrap.css" rel="stylesheet" />
    <script src="../../js/jquery-1.10.1.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link href="../../css/style.css" rel="stylesheet" />
    <link href="../../css/components-font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    
    <script>
		function deleteGallery(galleryID, propertyID) {
	  		if (confirm("Are you sure you want to delete this gallery image?")) {
	    		window.location.href = "deleteGallery.php?galleryID=" + galleryID + "&propID=" + propertyID ;
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
    		<p><span class="fa fa-home"></span> Properties <span class="right"><img alt="logo" src="../../images/logo.jpg" class="logo img-responsive img-rounded"></p>
       	</div><!-- end of jumbotron --> 
    	
		<!-- MAIN CONTENT -->
		
		<a href="addNewGalleryImage.php?propertyID=<?php echo $propertyID; ?>">
			<div class="btn btn-primary">
				Add New Gallery Image
			</div>
		</a>
		<br /><br /><br />
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th colspan="4">Image</th>
					<th colspan="4">Caption</th>
					<th colspan="2">Alt Text</th>
					<th colspan="1" class="text-right">Edit</th>
					<th colspan="1" class="text-right">Delete</th>
				</tr>
				
				<?php 
					$query = "SELECT * FROM property_gallery WHERE propertyID = $propertyID ORDER BY galleryID ASC";
					$result = mysqli_query($link, $query);
					//if (propertyID != $propertyID) {
					//	echo "no photos";
					//}
					//else {
					while ($row=mysqli_fetch_array($result)) {
					extract($row);
				?>
				<tr>
					<td colspan="4">
						<img src="../../property-images/<?php echo $row['galleryImage']; ?>" alt="<?php echo $row['altText']; ?>" title="<?php echo $row['caption']; ?>" class="img-responsive img-thumbnail galleryThumbnail" />
					</td>
					<td colspan="4">
						<?php echo $row['caption']; ?>
					</td>
					<td colspan="2">
						<?php echo $row['altText']; ?>
					</td>
					<td colspan="1" class="text-right">
						<a href="editGalleryImage.php?galleryID=<?php echo $row['galleryID']; ?>&propID=<?php echo $propertyID ?>">
							<span class="fa fa-pencil-square fa-2x"></span>
						</a>
					</td>
					<td colspan="1" class="text-right">
						<a href="javascript:deleteGallery(<?php echo $row['galleryID']; ?>, <?php echo $propertyID; ?>)">
							<span class="fa fa-trash fa-2x"></span>
						</a>
					</td>
				</tr>
				<?php
					} // end of while
					//} // end of else 
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