<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}
	include 'init.php';
	$sql="SELECT * FROM `trips_reservation` INNER JOIN customers ON trips_reservation.customer_id=customers.national_number WHERE wait=1";
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
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">حجز الرحلات</h1>
			<div class="table-responsive" style="width: 90%;margin: auto;">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الاسم</th>
						<th>الرقم القومى</th>
						<th>مكان الرحلة</th>
						<th>تاريخ الحجز</th>
						<th>التحكم</th>
					</tr>
					
<?php $count=1; foreach ($data as $value) { 
$trip_id=$value['trip_id'];
$sql1="SELECT * FROM `trips` WHERE trip_id=$trip_id";
$result1=mysqli_query($connect,$sql1);
$row1=mysqli_fetch_assoc($result1);
?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['customer_id']; ?></td>
						<td><?php echo $row1['place']; ?></td>
						<td><?php echo $value['reservation_date']; ?></td>

 						<td>
							<a href="delete_trip_reserve.php?id=<?php echo $value['trip_id']; ?>&customer_id=<?php echo $value['customer_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
						</td>
					</tr>
<?php $count++ ; } ?>
				</table>
				
			</div>
			

</div>