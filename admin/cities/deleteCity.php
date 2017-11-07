<?php
include "../../config.php";

$cityID = $_GET['cityID'];
$query = "DELETE FROM cities WHERE cityID='$cityID' ";
$result = mysqli_query($link, $query);

header("Location: index.php");

?>
