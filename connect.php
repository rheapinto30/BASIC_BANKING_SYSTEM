<!-- Database connection -->
<?php
$conn = mysqli_connect("localhost", "root", "", "bank");
session_start();
if (!$conn) {
    die("Could not connect to data base due to the following error: " . mysqli_connect_error());
}
