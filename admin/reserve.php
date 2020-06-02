<?php
session_start();
	if(!isset($_SESSION['admin_id'])){
		header("location: index.php");
	}
	include 'init.php';
	if ( ! $_GET['id'] & ! $_GET['customer_id']) {
		header("location: waiting.php");
	}
	$id=$_GET['id'];
	$customer_id=$_GET['customer_id'];
	$sql="SELECT * FROM `rooms` WHERE cat_id=$id";
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
	#dates div:last-child{
		border-bottom: none !important;
	}
</style>
<?php include 'includes/templates/sidebar.php'; ?>
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">الحجوزات </h1>
			<div class="table-responsive" style="width: 90%;margin: auto;">
				<table class="main-table text-center table table-bordered">
					<tr>
						<th>م</th>
						<th>رقم الغرفة </th>
						<th>الحجوزات</th>
						<th>التحكم</th>
					</tr>
					
<?php $count=1; foreach ($data as $value) { 
$room_id=$value['number'];
$sql1="SELECT * FROM `room_reservation` WHERE room_id=$room_id";
$result1=mysqli_query($connect,$sql1);
$data1=array();
while ($row1=mysqli_fetch_assoc($result1)) {
	$data1[]=$row1;
}
?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value['number']; ?></td>
						<td id="dates">
							<?php foreach ($data1 as $value1) {?>
								<div style="border-bottom:solid lightgray 1px">
									<span style="font-weight: bold;">من  : </span>
									<?php echo $value1['check_in_date']; ?>
									&nbsp;&nbsp;
									<span style="font-weight: bold;">المدة  : </span>
									<?php echo $value1['duration']; ?>
								</div>
							<?php }?>
						</td>

 						<td>
							<a href="reserve1.php?id=<?php echo $customer_id; ?>&room_id=<?php echo $room_id; ?>" class="btn btn-success"><i class="fa fa-plus"></i>
								حجز
							</a>
						</td>
					</tr>
<?php $count++ ; } ?>
				</table>
				
			</div>
			

</div>