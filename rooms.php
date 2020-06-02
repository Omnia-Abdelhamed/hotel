<?php
	include 'header.php';
	$select_room_sql="SELECT * FROM room_categories";
	$select_room_result=mysqli_query($connect,$select_room_sql);
	$rooms=array();
	while($room_row=mysqli_fetch_assoc($select_room_result)){
	    $rooms[]=$room_row;
	}
?>

<!-- Hero Area Section Begin -->
    <div class="hero-area set-bg other-page" data-setbg="img/about_bg.jpg">
    </div>
    <!-- Hero Area Section End -->



    <!-- Room Section Begin -->
    <section class="room-section">
        <div class="container-fluid">
        <?php foreach ($rooms as $value) {?>
			<div class="row">
                <div class="col-lg-6 order-lg-2">
                    <div class="ri-slider-item">
                        <div class="ri-sliders owl-carousel">
                            <div class="single-img set-bg" data-setbg="img/rooms/<?php echo $value['image']; ?>" style="height: 660px;background-size: cover;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="ri-text left-side">
                        <div class="section-title">
                            <div class="section-title">
                                <h2 align="center" style="color: #F9AD81"><?php echo $value['cat_name']; ?></h2>
                            </div>
                            <p style="text-align: right;direction: rtl;font-size: 18px;">
                            	<?php echo $value['description']; ?>
                            </p>
                          
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        </div>
    </section>
    <!-- Room Section End -->

<?php
	include 'footer.php';
?>