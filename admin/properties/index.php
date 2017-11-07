<?php
include "../../config.php";
include "../../library/pagination.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Admin - Properties</title>
	<meta charset="utf-8" />

    <link href="../../css/bootstrap.css" rel="stylesheet" />
    <script src="../../js/jquery-1.10.1.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link href="../../css/style.css" rel="stylesheet" />
    <link href="../../css/components-font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    
    <script>
		function deleteProperty(propertyID) {
	  		if (confirm("Are you sure you want to delete this property?")) {
	    		window.location.href = "deleteProperty.php?propertyID=" + propertyID;
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
		
		<a href="addProperty.php">
			<div class="btn btn-primary">
				Add New Property
			</div>
		</a>
		<br /><br /><br />
		<div class="table-responsive">
			<table class="table table-striped table-hover" id="propertiesTable">
				<tr>
					<th colspan="1"><span class="fa fa-plus" ></span></th>
					<th colspan="1">ID</th>
					<th colspan="1">City</th>
					<th colspan="1">Suburb</th>
					<th colspan="2">Title</th>
					<th colspan="2">Address</th>
					<th colspan="1">Image</th>
					<th colspan="1" class="text-right">Gallery</th>
					<th colspan="1" class="text-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit</th>
					<th colspan="1" class="text-right">Delete</th>
				</tr>
				
				<?php 
					$rowsPerPage = 8; // edit the number of rows per page
					$query = "SELECT properties.*, cities.cityName, suburbs.suburbName FROM properties, cities, suburbs WHERE properties.cityID = cities.cityID AND properties.suburbID = suburbs.suburbID ORDER BY propertyID ASC";
					$pagingLink = getPagingLink($query, $rowsPerPage, "");
					$result = mysqli_query($link, getPagingQuery($query, $rowsPerPage));
					
					while ($row=mysqli_fetch_array($result)) {
				?>
				<tr>
					<td colspan="1">
						<a data-toggle="collapse" href=".hiddenDetails-<?php echo $row['propertyID']; ?>" aria-expanded="false" aria-controls="hiddenDetails-<?php echo $row['propertyID']; ?>">
							<span class="fa fa-toggle-down"></span>
						</a>
					</td>
					<td colspan="1">
						<?php echo $row['propertyID']; ?>
					</td>
					
					<td colspan="1">
						<?php echo $row['cityName']; ?>
					</td>
					<td colspan="1">
						<?php echo $row['suburbName']; ?>
					</td>
					<td colspan="2">
						<?php echo $row['title']; ?>
					</td>
					<td colspan="2">
						<?php echo $row['address']; ?>
					</td>
					<td colspan="1">
						<img src="<?php echo '../../property-images/'.$row['propertyImage']; ?>" class="img-responsive" alt="display image" style="width:70px;"/>
					</td>
					<td colspan="1" class="text-right">
						<a href="displayGallery.php?propertyID=<?php echo $row['propertyID']; ?>">
							<span class="fa fa-camera fa-2x"></span>
						</a>
					</td>
					<td colspan="1" class="text-right">
						<a href="editProperty.php?propertyID=<?php echo $row['propertyID']; ?>">
							<span class="fa fa-pencil-square fa-2x"></span>
						</a>
					</td>
					<td colspan="1" class="text-right">
						<a href="javascript:deleteProperty(<?php echo $row['propertyID']; ?>)">
							<span class="fa fa-trash fa-2x"></span>
						</a>
					</td>
				</tr>
				<tr>
					<th class="hiddenRow" colspan="1">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>"></div>
					</th>
					<th class="hiddenRow" colspan="7">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							Description
						</div>
					</th>
					<th class="hiddenRow" colspan="1">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							Price
						</div>
					</th>
					<th class="hiddenRow text-right" colspan="1">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							<span class="fa fa-bed"></span>
						</div>
					</th>
					<th class="hiddenRow text-right" colspan="1">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							<span class="fa fa-bathtub"></span>
						</div>
					</th>
					<th class="hiddenRow text-right" colspan="1">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							<span class="fa fa-car"></span>
						</div>
					</th> 
				</tr>
				<tr>
					<td class="hiddenRow" colspan="1"><div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>"></div></td>
					<td class="hiddenRow" colspan="7">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							<?php echo $row['description']; ?>
						</div>
					</td>
					<td class="hiddenRow" colspan="1">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							<?php echo '$'.$row['price']; ?>
						</div>
					</td>
					<td class="hiddenRow text-right" colspan="1">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							<?php echo $row['bedrooms']; ?>
						</div>
					</td>
					<td class="hiddenRow text-right" colspan="1">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							<?php echo $row['bathrooms']; ?>
						</div>
					</td>
					<td class="hiddenRow text-right" colspan="1">
						<div class="collapse hiddenDetails-<?php echo $row['propertyID']; ?>">
							<?php echo $row['garage']; ?>
						</div>
					</td>
				</tr>
				<!--</tbody>-->
				<?php
					} // end of while
				?>	
					
			</table>
			
			<div id="pagination">
				<?php
					echo $pagingLink; // display paging links
				?>
			</div>

			
		</div>
		</div><!-- end of container -->
		<!-- FOOTER -->
		<div class="navbar navbar-inverse" id="footer">
			<div class="container">
				<div class="navbar-text">
					&copy; Copyright 2017. Jess and Casey Real Estate - PHP Assignment
				</div><!-- navbar-text -->
			</div><!-- container -->
		</div><!-- footer navbar -->
   
    
</body>
</html>