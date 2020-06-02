<?php
session_start();
	if(!isset($_SESSION['admin_id'])){
		header("location: index.php");
	}
	include 'init.php';
	$sql="SELECT * FROM `room_reservation` INNER JOIN customers ON room_reservation.customer_id=customers.national_number WHERE room_id!=0";
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
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">النزلاء</h1>
			<div class="table-responsive" style="width: 90%;margin: auto;">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>الاسم</th>
						<th>الرقم القومى</th>
						<th>نوع الغرفة</th>
						<th>تاريخ الحجز</th>
						<th>بداية من </th>
						<th>المدة </th>
						<th>التحكم</th>
					</tr>
					
<?php $count=1; foreach ($data as $value) { 
$cat_id=$value['room_cat'];
$sql1="SELECT * FROM `room_categories` WHERE cat_id=$cat_id";
$result1=mysqli_query($connect,$sql1);
$row1=mysqli_fetch_assoc($result1);
?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['customer_id']; ?></td>
						<td><?php echo $row1['cat_name']; ?></td>
						<td><?php echo $value['reservation_date']; ?></td>
						<td><?php echo $value['check_in_date']; ?></td>
						<td><?php echo $value['duration']; ?></td>

 						<td>
 							<a href="details.php?id=<?php echo $value['customer_id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i>
								عرض التفاصيل
							</a>
							<a href="delete_guests.php?id=<?php echo $value['reserve_id']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>
								حذف</a>
						</td>
					</tr>
<?php $count++ ; } ?>
				</table>
				
			</div>
			

</div>