<?php
	include 'header.php';
	if (isset($_POST['add'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    if (!empty($name) & !empty($email) & !empty($message)) {
        $sql="INSERT INTO `contact`(`name`,`email`,`message`,`subject`) VALUES ('$name','$email','$message','$subject')";
        $result=mysqli_query($connect,$sql);
    }
  }
?>

<!-- Hero Area Section Begin -->
    <div class="hero-area set-bg other-page" data-setbg="img/about_bg.jpg">
    </div>
    <!-- Hero Area Section End -->



    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row" style="direction: rtl;">
                <div class="col-lg-8">
                    <form class="contact-form" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="الاسم" name="name">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" placeholder="البريد الالكترونى" name="email">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" class="subject" placeholder="العنوان" name="subject">
                                <textarea placeholder="الرسالة" name="message"></textarea>
                                <button type="submit" style="margin-left: 295px;" name="add">ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="info-box">
                        <h2 align="center" style="color: #F9AD81;margin-bottom: 30px;">الفيروز</h2>
                        <ul>
                            <li>مصر, القاهرة, التجمع الخامس</li>
                            <li>elfayrouz@mail.com</li>
                            <li>01005687912</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


<?php
	include 'footer.php';
?>