<?php
include "../../config.php";

$propertyID = $_GET['propertyID'];
$query = "DELETE FROM properties WHERE propertyID='$propertyID' ";
$result = mysqli_query($link, $query);

header("Location: index.php");

?>
