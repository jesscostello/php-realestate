<?php
include "../../config.php";

$memberID = $_GET['memberID'];
$query = "DELETE FROM members WHERE memberID='$memberID' ";
$result = mysqli_query($link, $query);

header("Location: index.php");

?>
