<?php
	include 'header.php';
	$select_trip_sql="SELECT * FROM trips";
	$select_trip_result=mysqli_query($connect,$select_trip_sql);
	$trips=array();
	while($trip_row=mysqli_fetch_assoc($select_trip_result)){
	    $trips[]=$trip_row;
	}
?>

<!-- Hero Area Section Begin -->
    <div class="hero-area set-bg other-page" data-setbg="img/about_bg.jpg">
    </div>
<!-- Hero Area Section End -->

<!-- Room Section Begin -->
    <section class="services-section spad" style="padding-top: 130px;">
        <div class="container">
            <div class="row" style="direction: rtl;">
            <?php foreach ($trips as $value) { ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="services-item">
                        <div class="si-pic set-bg" data-setbg="img/trips/<?php echo $value['place_image']; ?>">
                            <div class="service-icon">
                            	<a href="reserve_trip.php?id=<?php echo $value['trip_id'];?>" style="color: #fff;font-size: 18px;">حجز </a>
                            </div>
                        </div>
                        <div class="si-text">
                            <h3><?php echo $value['place']; ?></h3>
                            <p><?php echo $value['description']; ?></p>
                        </div>
                        <div style="text-align: right;">
                        	<span style="color: #F9AD81;font-weight: bold;font-size: 19px;font-family: cursive;">السعـر : </span>
                        	<span style="font-size: 15px;"><?php echo $value['price']; ?></span>
                        </div>
                        <div style="text-align: right;">
                        	<span style="color: #F9AD81;font-weight: bold;font-size: 19px;font-family: cursive;">التاريخ : </span>
                        	<span style="font-size: 15px;"><?php echo $value['date']; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
    <!-- Room Section End -->



<?php
	include 'footer.php';
?>