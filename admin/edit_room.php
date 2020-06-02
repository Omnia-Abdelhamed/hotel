<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}
include 'init.php';
if ( ! $_GET['id']) {
	header("location: room_cat.php");
}
$room_id=$_GET['id'];
$select_sql="SELECT * FROM `rooms` INNER JOIN room_categories ON rooms.cat_id=room_categories.cat_id WHERE room_id=$room_id";
$select_result=mysqli_query($connect,$select_sql);
$select_row=mysqli_fetch_assoc($select_result);

$cat=$select_row['cat_id'];

$sql1="SELECT * FROM `room_categories` WHERE cat_id!=$cat";
$result1=mysqli_query($connect,$sql1);
$data= array();
while ($row=mysqli_fetch_assoc($result1)) {
	$data[]=$row;
}

if (isset($_POST['add'])) {
		$number=$_POST['number'];
		$room_cat=$_POST['room_cat'];
		$the_floor = $_POST['the_floor'];
        
        ;

		if (!empty($number) & !empty($the_floor) & !empty($room_cat) ) {
			$sql="UPDATE `rooms` SET `number`='$number', `cat_id`='$room_cat',`floor`='$the_floor' WHERE room_id=$room_id";
			//echo $sql;die();
			
			$result=mysqli_query($connect,$sql);
			if($result)
			{	
				header("location: rooms.php");
			}
		}
	}
?>
<style type="text/css">
	body{
		direction: rtl;
	}
	.form-control{
		border: 1px solid gray;
		width: 70%;
		display: inline-block;
		margin-bottom: 10px;
	}
</style>
<?php include 'includes/templates/sidebar.php'; ?>
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">تعديل غرفة</h1>
<div class="" style="direction: rtl;">
		<form class="form-horizontal" method="post" enctype="multipart/form-data" >
			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="text" name="number" autocomplete="off" required="required" value="<?php echo $select_row['number']?>">	
				</div>
				<label class="col-sm-2 control-label">الرقم</label>
			</div>	

			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="text" name="the_floor" autocomplete="off" required="required" value="<?php echo $select_row['floor']?>">	
				</div>
				<label class="col-sm-2 control-label">الطابق</label>
			</div>

			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<select class="form-control" name="room_cat">
						<option value="<?php echo $select_row['cat_id']?>">	<?php echo $select_row['cat_name']?>	
						</option>
					<?php foreach ($data as $value) { ?>
						<option value="<?php echo $value['cat_id']; ?>"><?php echo $value['cat_name']; ?></option>
					<?php } ?> 
					</select>
				</div>
				<label class="col-sm-2 control-label">الفئة</label>
			</div>

			<div class="form-group-lg">
				<div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-primary btn-lg" type="submit" name="add" value="تعديل" style="margin-right: 522px;margin-top: 15px;width: 100px;">
				</div>
			</div>		
		</form>		
</div>

</div>