<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}
include 'connect.php';
if ( ! $_GET['id'] & ! $_GET['customer_id']) {
	header("location: trips_waiting.php");
}
$trip_id=$_GET['id'];
$customer_id=$_GET['customer_id'];
$sql="UPDATE `trips_reservation` SET `wait`=1 WHERE customer_id=$customer_id AND trip_id=$trip_id";
$result=mysqli_query($connect,$sql);
if ($result) {
	header("location: trips_waiting.php");
}