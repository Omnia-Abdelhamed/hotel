<?php
session_start();
	if(!isset($_SESSION['admin_id'])){
		header("location: index.php");
	}
	include 'init.php';
	$sql="SELECT * FROM `room_categories`";
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
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">فئات الغرف</h1>
			<div class="table-responsive" style="width: 90%;margin: auto;">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الاسم</th>
						<th>الصورة</th>
						<th>الوصف</th>
						<th>التحكم</th>
					</tr>
					
<?php $count=1; foreach ($data as $value) { ?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['cat_name']; ?></td>
						<td><img style="width: 80px;height: 80px;" src="../img/rooms/<?php echo $value['image']; ?>"></td>
						<td style="width: 300px;"><?php echo $value['description']; ?></td>
						 
 						<td>
							<a href="edit_cat.php?id=<?php echo $value['cat_id']; ?>" class="btn btn-success"><i class="fa fa-edit"></i>
								تعديل
							</a>
							<a href="delete_cat.php?id=<?php echo $value['cat_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
						</td>
					</tr>
<?php $count++ ; } ?>
				</table>
				<a href='add_room_cat.php' class="btn btn-primary">
				<i class="fa fa-plus"> </i> اضافة فئة  </a>
			</div>
			

</div>