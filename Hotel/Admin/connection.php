<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "db_hotel";

$db = mysqli_connect($hostname, $username, $password, $database_name);

// jika db koneksi nya error
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
    // die("error!");
}

?>