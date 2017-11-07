<?php
include "../../config.php";

if(isset($_POST['propertyCity'])) {	
	$selectedCity = $_POST['propertyCity'];
 	$query = "SELECT * FROM suburbs WHERE cityID='$selectedCity' ";
 	$result = mysqli_query($link, $query);
	echo "<option>Select Suburb</option>";
	while($row=mysqli_fetch_array($result)) {
?>

<option <?php if ($suburbID_F == $suburbID) echo "selected"; ?> value="<?php echo $row['suburbID']; ?>"><?php echo $row['suburbName']; ?></option>

<?php
	} // end of while
 exit;
} // end of if

?>