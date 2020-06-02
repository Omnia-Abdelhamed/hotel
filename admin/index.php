<?php 

	session_start();
	if(isset($_SESSION['admin_id'])){
		header("location: waiting.php");
	}
	$noNavbar='';
	include 'init.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$hashedpass=sha1($password);
		$sql="SELECT * FROM employees WHERE username='$username' AND password='$hashedpass'";
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_assoc($result);
		$count=mysqli_num_rows($result);
		if($count>0){
			$_SESSION['admin_id']=$row['emp_id'];
			header("location: waiting.php");
			exit();
		}
	} 

?>

<style>
	body{
		background-color: #3a3939;
	}
</style>

	<form class="login" method="post" style="direction: rtl;">
		<h4 class="text-center" style="font-size: 22px;color: #fff;">تسجيل دخول </h4>
		<HR>
		<input class="form-control" type="text" name="username" 
		placeholder="اسم المستخدم" autocomplete="off" style="background-color: #8c8c8c;">
		<input class="form-control" type="password" name="password" 
		placeholder="كلمة المرور" autocomplete="new-password" style="background-color: #8c8c8c;">
		<input class="btn btn-primary btn-block" type="submit" name="submit" value="دخول" style="font-size: 18px;">
	</form>