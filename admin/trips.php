<?php
session_start();
	if(!isset($_SESSION['admin_id'])){
		header("location: index.php");
	}
	include 'init.php';
	$sql="SELECT * FROM `trips`";
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
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">الرحلات</h1>
			<div class="table-responsive" style="width: 90%;margin: auto;">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>المكان</th>
						<th>السعر</th>
						<th>التاريخ</th>
						<th>الوصف</th>
						<th>الصورة</th>
						<th>التحكم</th>
					</tr>
					
<?php $count=1; foreach ($data as $value) { ?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['place']; ?></td>
						<td><?php echo $value['price']; ?></td>
						<td><?php echo $value['date']; ?></td>
						<td style="width: 300px;"><?php echo $value['description']; ?></td>
						<td><img style="width: 80px;height: 80px;" src="../img/trips/<?php echo $value['place_image']; ?>"></td>

 						<td>
 							<a href="edit_trips.php?id=<?php echo $value['trip_id']; ?>" class="btn btn-success confirm"><i class="fa fa-edit"></i>
								تعديل</a>
							<a href="delete_trips.php?id=<?php echo $value['trip_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
						</td>
					</tr>
<?php $count++ ; } ?>
				</table>
				<a href="add_trips.php" class="btn btn-primary confirm"><i class="fa fa-plus"></i>
								اضافة  رحلة</a>
				
			</div>
			

</div>