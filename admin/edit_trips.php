<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}
include 'init.php';
if ( ! $_GET['id']) {
	header("location: trips.php");
}
$trip_id=$_GET['id'];

$select_sql="SELECT * FROM `trips` WHERE trip_id=$trip_id";
$select_result=mysqli_query($connect,$select_sql);
$select_row=mysqli_fetch_assoc($select_result);

if (isset($_POST['add'])) {
	$place=$_POST['place'];
	$description=$_POST['description'];
	$price=$_POST['price'];
	$image = $_FILES['image'];
    
    $image_name=$image['name'];
    $image_type=$image['type'];
    $image_temp=$image['tmp_name'];
    $image_size=$image['size'];

    
    $allowed_extensions=array("jpeg","jpg","png");
    $image_extension=explode('.', $image_name);
    $image_extension=strtolower(end($image_extension));

    if (empty($image_name)) {
    	$image_name=$select_row['place_image'];
    }

	if (!empty($place) & !empty($description) & !empty($price)) {
		if (!empty($image_name)) {
			if(in_array($image_extension, $allowed_extensions)){
				$image_name=rand(0,100000).'_'.$image_name;
	            move_uploaded_file($image_temp, "..\img\\trips\\".$image_name);
	        } 
	    }       
		$sql="UPDATE `trips` SET `place_image`='$image_name',`place`='$place',`description`='$description',`price`='$price' WHERE trip_id=$trip_id";			
		$result=mysqli_query($connect,$sql);
		if($result){	
			header("location: trips.php");
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
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">تعديل الرحلة</h1>
<div class="" style="direction: rtl;">
		<form class="form-horizontal" method="post" enctype="multipart/form-data" >
			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="text" name="place" autocomplete="off" required="required" value="<?php echo $select_row['place']?>">	
				</div>
				<label class="col-sm-2 control-label">المكان</label>
			</div>	

			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="text" name="price" autocomplete="off" required="required" value="<?php echo $select_row['price']?>">
				</div>
				<label class="col-sm-2 control-label">السعر </label>
			</div>

			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="text" name="description" autocomplete="off" required="required" style="height: 100px!important;" value="<?php echo $select_row['description']?>">
				</div>
				<label class="col-sm-2 control-label">الوصف</label>
			</div>

			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="file" name="image" 
					 >
				</div>
				<label class="col-sm-2 control-label">الصورة</label>
			</div>

			<div class="form-group-lg">
				<div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-primary btn-lg" type="submit" name="add" value="تعديل" style="margin-right: 522px;margin-top: 15px;width: 100px;">
				</div>
			</div>		
		</form>		
</div>

</div>