<?php
include 'header.php';

$select_room_sql="SELECT * FROM room_categories";
$select_room_result=mysqli_query($connect,$select_room_sql);
$rooms=array();
while($room_row=mysqli_fetch_assoc($select_room_result)){
    $rooms[]=$room_row;
}

if (isset($_POST['add'])) {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $national_number=$_POST['national_number'];
    $marital=$_POST['marital'];
    $the_date=date("Y-m-d");
    $room_cat=$_POST['room_cat'];
    $check_in_date=$_POST['from_date'];
    $duration=$_POST['duration'];
   

    if (!empty($name) & !empty($phone) & !empty($gender) & !empty($national_number) & !empty($marital) & !empty($email) & !empty($room_cat) & !empty($check_in_date) & !empty($duration) ) {

            $sql="INSERT INTO `customers`(`name`, `email`, `phone`, `national_number`, `marital_statues`, `gender`) VALUES ('$name','$email','$phone','$national_number','$marital','$gender')";
            
            
            $result=mysqli_query($connect,$sql);
            if($result){   
                
                $room_sql="INSERT INTO `room_reservation` (`customer_id`, `room_cat`, `reservation_date`, `check_in_date`, `duration`) VALUES ('$national_number','$room_cat','$the_date','$check_in_date','$duration')";
            
                $room_result=mysqli_query($connect,$room_sql);
                if ($room_result) {
                    header("location: fav.php?id=$national_number");
                }
            }
        
    }
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
    <section class="hero-area set-bg" data-setbg="img/hero-bg.jpg" style="    height: 1300px;"></section>
    <!-- Hero Area Section End -->

    <!-- Search Filter Section Begin -->
    <section class="search-filter" style="margin-top: -1064px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="check-form" style="direction: rtl;text-align: right;" method="post" id="form1">
                        <h4 align="center">احجز غرفتك </h4>
                        <h3 style="font-size: 25px;color: #F9AD81;margin-top: 55px;">البيانات الشخصية </h3>
                        <div style="margin-top: 35px;">
                            <div class="room-selector" style="float: right;width: calc(32% - 16px);">
                                <p>الاسم </p>
                                <input type="text" class="the_input" name="name">
                            </div>
                            <div class="room-selector" style="float: right;width: calc(32% - 16px);">
                                <p>البريد الالكترونى </p>
                                <input type="email" class="the_input" name="email">
                            </div>
                            <div class="room-selector" style="float: right;width: calc(32% - 16px);">
                                <p>رقم الهاتف </p>
                                <input type="text" class="the_input" name="phone">
                            </div>
                        </div><div class="clearfix"></div>
                        <div style="margin-top: 30px;">
                            <div class="room-selector" style="float: right;width: calc(32% - 16px);">
                                <p>الرقم القومى</p>
                                <input type="text" class="the_input" name="national_number">
                            </div>
                            <div class="room-selector" style="float: right;width: calc(32% - 16px);font-weight: bold;font-size: 17px;letter-spacing: none;">
                                <p>النوع</p>
                                <select class="suit-select" style="direction: rtl;color: #242424;font-size: 17px;" name="gender">
                                    <option value="ذكر">ذكر</option>
                                    <option value="انثى">انثى</option>
                                </select>
                            </div>
                            <div class="room-selector" style="float: right;width: calc(32% - 16px);">
                                <p>الحالة الاجتماعية </p>
                                <select class="suit-select" name="marital">
                                    <option value="اعزب">اعزب </option>
                                    <option value="متزوج">متزوج</option>
                                </select>
                            </div>
                        </div><div class="clearfix"></div>
                        <h3 style="font-size: 25px;color: #F9AD81;margin-top: 55px;">بيانات الحجز </h3>
                        <div style="margin-top: 30px;margin-right: -2px;">
                            <div class="room-selector" style="float: right;width: calc(32% - 16px);">
                                <p>نوع الغرفة </p>
                                <select class="suit-select" name="room_cat">
                                <?php foreach ($rooms as $value) {?>
                                    <option value="<?php echo $value['cat_id']; ?>"><?php echo $value['cat_name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="datepicker" style="float: right;width: calc(32% - 16px);">
                                <p>بداية من </p>
                                <input type="text" class="datepicker-1" value="dd / mm / yyyy" style="padding-right: 32px;" name="from_date">
                                <img src="img/calendar.png" alt="">
                            </div>
                            <div class="datepicker" style="float: right;width: calc(32% - 16px);">
                                <p>مدة الحجز بالأيام </p>
                                <input type="number" class="the_input" min="1" max="30" name="duration">
                            </div>
                        </div><div class="clearfix"></div>
                        
                        
                        <button type="submit" style="width: 200px;height: 58px;padding: 4px;font-size: 30px;margin-top: 45px;margin-right: 445px;border-radius: 20px;" name="add">حـجـز</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Search Filter Section End -->


    <?php 
        include 'footer.php';
    ?>