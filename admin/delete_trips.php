<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}

include 'connect.php';
if ( ! $_GET['id']) {
	header("location: trips.php");
}
$id=$_GET['id'];
$sql="DELETE FROM `trips_reservation` WHERE trip_id='$id'";
$result=mysqli_query($connect,$sql);
if ($result) {
	$sql1="DELETE FROM `trips` WHERE trip_id='$id'";
	$result1=mysqli_query($connect,$sql1);
	if ($result1) {
		header("location: trips.php");
	}
}

