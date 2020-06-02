<?php
session_start();
	if(!isset($_SESSION['admin_id'])){
		header("location: index.php");
	}
	include 'init.php';
	if ( ! $_GET['id']) {
		header("location: waiting.php");
	}
	$id=$_GET['id'];
	$sql="SELECT * FROM customers WHERE national_number=$id";
	$result=mysqli_query($connect,$sql);
	$row=mysqli_fetch_assoc($result);

	$sql1="SELECT * FROM customer_fav INNER JOIN favorites ON customer_fav.fav_id=favorites.fav_id WHERE customer_id=$id";
	$result1=mysqli_query($connect,$sql1);
	$data= array();
	while ($row1=mysqli_fetch_assoc($result1)) {
		$data[]=$row1;
	}
?>




<style type="text/css">
	body{
		direction: rtl;
	}
</style>
<?php include 'includes/templates/sidebar.php'; ?>
<h1 class="text-center" style="margin-top:40px;color:gray;margin-bottom:28px;">البيانات الشخصية </h1>
			<div class="table-responsive" style="width: 90%;margin: auto;">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>الاسم</th>
						<td><?php echo $row['name']; ?></td>
					</tr>
					<tr>
						<th>الرقم القومى</th>
						<td><?php echo $row['national_number']; ?></td>
					</tr>
					<tr>
						<th>رقم الهاتف</th>
						<td><?php echo $row['phone']; ?></td>
					</tr>
					<tr>
						<th>البريد الالكترونى</th>
						<td><?php echo $row['email']; ?></td>
					</tr>
					<tr>
						<th>النوع</th>
						<td><?php echo $row['gender']; ?></td>
					</tr>
					<tr>
						<th>الحالة الاجتماعية</th>
						<td><?php echo $row['marital_statues']; ?></td>
					</tr>
				</table>	
			</div>

			<h1 class="text-center" style="margin-top:30px;color:gray;margin-bottom:28px;">المفضلات</h1>
			<div class="table-responsive" style="width: 90%;margin: auto;">
				<table class="main-table text-center table table-bordered">
<?php foreach ($data as $value) { 
$desc_id=$value['desc_id'];
$sql2="SELECT * FROM `fav_desc` WHERE desc_id=$desc_id";
$result2=mysqli_query($connect,$sql2);
$row2=mysqli_fetch_assoc($result2);
?>
					<tr>
						<th><?php echo $value['fav_name']; ?></th>
						<td><?php echo $row2['description']; ?></td>
					</tr>
<?php } ?>
				</table>
			</div>
			

</div>