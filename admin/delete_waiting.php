<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}
include 'connect.php';
if ( ! $_GET['id']) {
	header("location: waiting.php");
}
$id=$_GET['id'];
$sql="DELETE FROM `room_reservation` WHERE reserve_id='$id'";
$result=mysqli_query($connect,$sql);

if ($result) {
	header("location: waiting.php");
}