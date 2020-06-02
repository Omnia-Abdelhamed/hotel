<?php
session_start();
	if(!isset($_SESSION['admin_id'])){
		header("location: index.php");
	}
	include 'init.php';
	$sql="SELECT * FROM `rooms` INNER JOIN room_categories ON rooms.cat_id=room_categories.cat_id";
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
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">الغرف</h1>
			<div class="table-responsive" style="width: 90%;margin: auto;">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الرقم</th>
						<th>الطابق</th>
						<th>النوع</th>
						<th>التحكم</th>
					</tr>
					
<?php $count=1; foreach ($data as $value) { ?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['number']; ?></td>
						<td><?php echo $value['floor']; ?></td>
						<td><?php echo $value['cat_name']; ?></td>
						 
 						<td>
							<a href="edit_room.php?id=<?php echo $value['room_id']; ?>" class="btn btn-success"><i class="fa fa-edit"></i>
								تعديل
							</a>
							<a href="delete_room.php?id=<?php echo $value['room_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
					
						</td>
					</tr>
<?php $count++ ; } ?>
				</table>
				<a href='add_room.php' class="btn btn-primary">
				<i class="fa fa-plus"> </i> اضافة  غرفة   </a>
			</div>
			

</div>