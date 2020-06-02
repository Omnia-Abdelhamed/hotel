<?php
include 'header.php';

if (isset($_GET['id'])) {
    $customer_id=$_GET['id'];
}else{
    $customer_id=0;
}

$select_fav_sql="SELECT * FROM favorites";
$select_fav_result=mysqli_query($connect,$select_fav_sql);
$favs=array();
while($fav_row=mysqli_fetch_assoc($select_fav_result)){
    $favs[]=$fav_row;
}

$select_cust_sql="SELECT * FROM customers WHERE national_number=$customer_id";
$select_cust_result=mysqli_query($connect,$select_cust_sql);
$cust_row=mysqli_fetch_assoc($select_cust_result);

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
                       <h3 style="font-size: 25px;color: #F9AD81;margin-top: 55px;">المفضلات </h3>
                        <div style="margin-top: 30px;margin-right: -2px;">
                        <?php foreach ($favs as $fav_value){
                            $fav_id=$fav_value['fav_id'];
                            $select_desc_sql="SELECT * FROM fav_desc WHERE fav_id=$fav_id";
                            $select_desc_result=mysqli_query($connect,$select_desc_sql);
                            $descs=array();
                            while($desc_row=mysqli_fetch_assoc($select_desc_result)){
                                $descs[]=$desc_row;
                            }
                        ?>
                            <div class="room-selector" style="float: right;width: calc(32% - 16px);letter-spacing: 0">
                                <p><?php echo $fav_value['fav_name']; ?></p>
                                <select class="suit-select" name="<?php echo $fav_id; ?>">
                                <?php foreach ($descs as $desc_value) { ?>
                                    <option value="<?php echo $desc_value['desc_id']; ?>" style="letter-spacing: 0;"><?php echo $desc_value['description'] ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        <?php } ?>   
                        </div><div class="clearfix"></div>
                        
                        
                        <button type="submit" style="width: 200px;height: 58px;padding: 4px;font-size: 30px;margin-top: 45px;margin-right: 445px;border-radius: 20px;" name="add">موافق </button>
                    </form>
                    <div class="check-form" style="display: none; direction: rtl;text-align: center;font-size: 18px;color: #fff;height: 150px;word-spacing: 3px;" id="respond">
                        مرحبا بك يا <?php echo " ".$cust_row['name']; ?><i class="fa fa-heart-o" aria-hidden="true"></i>
                        <br><br>
                        لقد تم تسجيل طلبك بنجاح سوف تصلك رسالة لتأكيد الطلب  فى أقرب وقت ..
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Filter Section End -->
<?php 

if (isset($_POST['add'])) {
    array_pop($_POST);
    foreach ($_POST as $key => $value) {
        $sql="INSERT INTO `customer_fav`(`customer_id`, `fav_id`, `desc_id`) VALUES ('$customer_id','$key','$value')";
        //echo $sql;die();
        $result=mysqli_query($connect,$sql);
        if ($result) { ?>
            <script>
                document.getElementById('form1').style.display="none";
                document.getElementById('respond').style.display="block";
            </script>
        <?php }
    }
}

        include 'footer.php';
    ?>