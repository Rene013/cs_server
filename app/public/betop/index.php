<?php


// $servername = "db";
// $username = "root";
// $password = "HenearkrxeRn0!#";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password);

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";


// die();


require_once'config/init.php';
$page = new Page();
include('template/header.php'); // Page Header

include('views/pages/'. $page->_type->name.'.php'); // View Type

include('template/footer.php'); // Page Footer 

?>
';