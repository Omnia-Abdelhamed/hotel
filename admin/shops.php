<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}
	include 'init.php';
	$sql="SELECT * FROM `shops` INNER JOIN `places` ON shops.place_id=places.place_id";
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
<h1 class="text-center">المحلات</h1>
		<div class="container">
			<div class="table-responsive">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الاسم</th>
						<th>العنوان</th>
						<th>رقم الهاتف</th>
						<th>البريد الالكترونى</th>
						<th>الصورة</th>
						<th>المنطقة</th>
						<th>التحكم</th>
					</tr>
				<?php $count=1; foreach ($data as $value) { ?>
				 	<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['address']; ?></td>
						<td><?php echo $value['phone']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><img style="width: 80px;height: 80px;" src="../img/<?php echo $value['image']; ?>"></td>
						<td><?php echo $value['place_name']; ?></td>
						<td>
							<a href="delete_shop.php?id=<?php echo $value['shop_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
					
						</td>
					</tr>
				<?php $count++ ; } ?>
				</table>
			</div>
			<a href='add_shop.php' class="btn btn-primary">
				<i class="fa fa-plus"> </i> اضافة محل زهور </a>