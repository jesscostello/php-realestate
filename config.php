<?php
// start session
//session_start();

// connect to the database
$server = "localhost";
$user = "root";
$password = "";
$database = "properties_database";

// link to the database
$link = mysqli_connect($server, $user, $password, $database);

// save the new image here
define('PRODUCT_IMG_DIR', 'C:/xampp/htdocs/php-realestate/property-images/');
// width is scale on the fly
define('THUMBNAIL_WIDTH', 500);

echo "# php-realestate" >> README.md;
git init;
git add README.md;
git commit -m "first commit";
git remote add origin https://github.com/jesscostello/php-realestate.git
git push -u origin master;
?>