<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("location: index.php");
}
include 'init.php';

if (isset($_POST['add'])) {
		$place=$_POST['place'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$the_date=$_POST['the_date'];
		$image = $_FILES['image'];
        
        $image_name=$image['name'];
        $image_type=$image['type'];
        $image_temp=$image['tmp_name'];
        $image_size=$image['size'];

        
        $allowed_extensions=array("jpeg","jpg","png");
        $image_extension=explode('.', $image_name);
        $image_extension=strtolower(end($image_extension));

		if (!empty($place) & !empty($description) & !empty($price) & !empty($the_date) & !empty($image_name) ) {
			if(in_array($image_extension, $allowed_extensions)){
				$image_name=rand(0,100000).'_'.$image_name;
	            move_uploaded_file($image_temp, "..\img\\trips\\".$image_name);
	            
				$sql="INSERT INTO `trips`(`place`, `description`, `price`, `date`, `place_image`) VALUES ('$place','$description','$price','$the_date','$image_name')";
				
				$result=mysqli_query($connect,$sql);
				if($result)
				{	
					header("location: trips.php");
				}
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
<h1 class="text-center" style="margin-top:50px;color:gray;margin-bottom:28px;">اضافة رحلة</h1>
<div class="" style="direction: rtl;">
		<form class="form-horizontal" method="post" enctype="multipart/form-data" >
			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="text" name="place" autocomplete="off" required="required">	
				</div>
				<label class="col-sm-2 control-label">المكان</label>
			</div>	

			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="text" name="price" autocomplete="off" required="required">
				</div>
				<label class="col-sm-2 control-label">السعر </label>
			</div>

			<div class="form-group-lg">		
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="date" name="the_date" autocomplete="off" required="required">
				</div>
				<label class="col-sm-2 control-label">التاريخ </label>
			</div>

			<div class="form-group-lg">
				<div class="col-sm-10 col-md-8">
					<input class="form-control" type="text" name="description" autocomplete="off" required="required" style="height: 100px!important;">
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
					<input class="btn btn-primary btn-lg" type="submit" name="add" value="اضافة" style="margin-right: 522px;margin-top: 15px;width: 100px;">
				</div>
			</div>		
		</form>		
</div>

</div>