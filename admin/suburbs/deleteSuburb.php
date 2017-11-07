<?php
include "../../config.php";

$suburbID = $_GET['suburbID'];
$query = "DELETE FROM suburbs WHERE suburbID='$suburbID' ";
$result = mysqli_query($link, $query);

header("Location: index.php");

?>
