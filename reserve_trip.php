<?php
include 'header.php';
if (isset($_GET['id'])) {
    $trip_id=$_GET['id'];
}else{
    $trip_id=0;
}
?>

<style>
    .the_input{
        width: 100%;
        font-size: 17px;
        font-weight: 700;
        text-transform: uppercase;
        border: none;
        color: #242424;
        opacity: 0.5;
        line-height: 42px;
        border-bottom: 1px solid #888888;
    }
</style>

    <!-- Hero Area Section Begin -->
    <section class="hero-area set-bg" data-setbg="img/hero-bg.jpg" style="    height: 1000px;">
  
    </section>
    <!-- Hero Area Section End -->

    <!-- Search Filter Section Begin -->
    <section class="search-filter" style="margin-top: -768px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="check-form" style="direction: rtl;text-align: right;" method="post" id="form1">
                       <h3 style="font-size: 25px;color: #F9AD81;margin-top: 55px;">حجز الرحلة </h3>
                        <div style="margin-top: 30px;margin-right: -2px;">
                            <div class="room-selector" style="float: right;width: calc(32% - 16px);">
                                <p>الرقم القومى</p>
                                <input type="text" class="the_input" name="national_number">
                            </div> 
                        </div><div class="clearfix"></div>
                        
                        
                        <button type="submit" style="width: 200px;height: 58px;padding: 4px;font-size: 30px;margin-top: 45px;margin-right: 445px;border-radius: 20px;" name="add">موافق </button>
                    </form>
                    <div class="check-form" style="display:none;direction: rtl;text-align: center;font-size: 18px;color: #fff;height: 150px;word-spacing: 3px;" id="respond1">
                        مرحبا بك يا   <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <br><br>
                        لقد تم حجز الرحلة بنجاح سوف تصلك رسالة لتأكيد الطلب  فى أقرب وقت ..
                    </div>

                    <div class="check-form" style="display:none;direction: rtl;text-align: center;font-size: 18px;color: #fff;height: 150px;word-spacing: 3px;line-height: 90px;" id="respond2">
                        عفوا انت لست نزيل فى الفندق هذه الرحلة للنزلاء  فقط ..
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Filter Section End -->
<?php 
if (isset($_POST['add'])) {
    $national_number=$_POST['national_number'];
    $the_date=date("Y-m-d");
    if (!empty($national_number)) {
        $select_reserve_sql="SELECT * FROM room_reservation WHERE customer_id=$national_number";
        //echo $select_reserve_sql;die();
        $select_reserve_result=mysqli_query($connect,$select_reserve_sql);
        $reserve_row=mysqli_fetch_assoc($select_reserve_result);
        $count=mysqli_num_rows($select_reserve_result);
        if($count>0){
            $sql="INSERT INTO `trips_reservation`(`customer_id`, `trip_id`, `reservation_date`) VALUES ('$national_number','$trip_id','$the_date')";
            $result=mysqli_query($connect,$sql);
            if ($result) { ?>
                <script>
                    document.getElementById('form1').style.display="none";
                    document.getElementById('respond1').style.display="block";
                </script>
            <?php }
        }elseif($count==0){ ?>
            <script>
                    document.getElementById('form1').style.display="none";
                    document.getElementById('respond2').style.display="block";
            </script>
       <?php }
    }
}

include 'footer.php';
?>