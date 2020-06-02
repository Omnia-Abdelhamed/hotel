<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}
	include 'init.php';
	$sql="SELECT * FROM `customers`";
	$result=mysqli_query($connect,$sql);

	$data= array();

	while ($row=mysqli_fetch_assoc($result)) {
		$data[]=$row;
	}
?>




<style type="text/css">
	body{
		direction: rtl;
	}
</style>
<?php include 'includes/templates/sidebar.php'; ?>
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">العملاء</h1>
			<div class="table-responsive" style="width: 90%;margin: auto;">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الاسم</th>
						<th>الرقم القومى</th>
						<th>رقم الهاتف</th>
						<th>البريد الالكترونى</th>
						<th>النوع</th>
						<th>الحالة الاجتماعية</th>
						<th>التحكم</th>
					</tr>
					
<?php $count=1; foreach ($data as $value) { ?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['national_number']; ?></td>
						<td><?php echo $value['phone']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><?php echo $value['gender']; ?></td>
						<td><?php echo $value['marital_statues']; ?></td>

 						<td>
							<a href="delete_guests.php?id=<?php echo $value['national_number']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
						</td>
					</tr>
<?php $count++ ; } ?>
				</table>
				
			</div>
			

</div>