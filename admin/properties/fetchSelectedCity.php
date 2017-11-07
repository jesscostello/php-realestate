<?php
include "../../config.php";

if(isset($_POST['propertyCity']))
{	
 $selectedCity = $_POST['propertyCity'];
 $query = "SELECT * FROM suburbs WHERE cityID='$selectedCity' ";
 $result = mysqli_query($link, $query);
 echo "<option>Select Suburb</option>";
 while($row=mysqli_fetch_array($result))
 {
  echo "<option value='".$row['suburbID']."'>".$row['suburbName']."</option>";
 }
 exit;
}
?>