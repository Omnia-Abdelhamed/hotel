<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}
include 'connect.php';
if ( ! $_GET['id'] & ! $_GET['room_id']) {
	header("location: waiting.php");
}
$id=$_GET['id'];
$room_id=$_GET['room_id'];
$sql="UPDATE `room_reservation` SET `room_id`=$room_id WHERE customer_id=$id";
$result=mysqli_query($connect,$sql);
if ($result) {
	header("location: waiting.php");
}