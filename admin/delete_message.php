<?php
session_start();
	if(!isset($_SESSION['admin_id'])){
		header("location: index.php");
	}
include 'connect.php';
if ( ! $_GET['id']) {
	header("location: messages.php");
}
$id=$_GET['id'];
$sql="DELETE FROM `contact` WHERE id='$id'";
$result=mysqli_query($connect,$sql);

if ($result) {
	header("location: messages.php");
}