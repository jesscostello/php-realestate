<?php
include "../../config.php";
// retreives gallery id from url
$galleryID = $_GET['galleryID'];
$propertyID = $_GET['propID'];
$query = "DELETE FROM property_gallery WHERE galleryID='$galleryID' ";
mysqli_query($link, $query);
// redirect
header("Location: displayGallery.php?propertyID=" .$propertyID);
?>