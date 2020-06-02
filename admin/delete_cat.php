<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}

include 'connect.php';
if ( ! $_GET['id']) {
	header("location: room_cat.php");
}
$id=$_GET['id'];
$sql="DELETE FROM `room_reservation` WHERE room_cat='$id'";
$result=mysqli_query($connect,$sql);
if ($result) {
	$sql1="DELETE FROM `rooms` WHERE cat_id='$id'";
	$result1=mysqli_query($connect,$sql1);
	if ($result1) {
		$sql2="DELETE FROM `room_categories` WHERE cat_id='$id'";
		$result2=mysqli_query($connect,$sql2);
		if ($result2) {
			header("location: room_cat.php");
		}
	}
}

