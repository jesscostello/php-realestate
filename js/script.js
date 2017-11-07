function fetchSelectedCity(val) {
 $.ajax({
 	type: 'POST',
 	url: 'fetchSelectedCity.php',
 	data: {
  		propertyCity:val
 	},
 success: 	function (response) {
 		 		document.getElementById("propertySuburb").innerHTML=response; 
 			} // end of function(response)
 }); // end of ajax
} // end of function fetchSelectedCity


function fetchSelectedCityEdit(val) {
 $.ajax({
 	type: 'POST',
 	url: 'fetchSelectedCityEdit.php',
 	data: {
  		propertyCity:val
 	},
 success: 	function (response) {
 		 		document.getElementById("propertySuburb").innerHTML=response; 
 			} // end of function(response)
 }); // end of ajax
} // end of function fetchSelectedCityEdit