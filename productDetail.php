<?php
session_start();
if (isset($_SESSION['a_username'])) {
    if (isset($_GET["p_id"])) { ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crud By Php Mysqli พี่เจมส์ ตาโต</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png"
        href="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/119980752_337785307574954_1757152202764221432_o.jpg?_nc_cat=105&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeEdQ3uuMUpSNsKpHfjvpUDro1XX0a4IIyujVdfRrggjKx0oaTlnEEJRQqIYyg0KJMUxDMwjlPd-dN2hT7EGYqeo&_nc_ohc=0bT4uczorNcAX96yl_4&_nc_ht=scontent.fkkc3-1.fna&oh=6b8d05997d7e1dd2078a3062bc4a3886&oe=5FBB4911" />
    <!-- การลิ้ง css bootstrap เเบบ cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- การลิ้ง javascript ของ bootstrap เเบบ cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- การลิ้ง icon เพื่อใช้งาน icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>


    <!-- การนำเข้า Navbar -->
    <?php include_once("navBar.php"); ?>

    <div class="container my-5">

        <?php

                //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                include_once("config/connectDB.php");

                $sql = "SELECT * FROM tbl_products WHERE p_id='{$_GET["p_id"]}'";
                $result = mysqli_query($conn, $sql);


                // เเสดงข้อมูลจากฐานข้อมูล
                while ($item = mysqli_fetch_assoc($result)) { ?>

        <!-- เเสดงข้อมูลจากฐานข้อมูล -->

        <!-- Card -->
        <div class="card card-cascade wider reverse">

            <!-- Card image -->
            <div class="view view-cascade overlay">
                <img class="card-img-top" src="./images/img1.jpg" alt="Card image cap">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">
                <h4 class="card-title"><strong>ไอดีสินค้า <?php echo $item["p_id"]; ?></strong></h4>
                <!-- Title -->
                <h4 class="card-title"><strong>ชื่อสินค้า <?php echo $item["p_name"]; ?></strong></h4>
                <!-- Subtitle -->
                <h6 class="font-weight-bold indigo-text py-2">ราคา <?php echo $item["p_price"]; ?> บาท</h6>
                <!-- Text -->
                <p class="card-text">จำนวน <?php echo $item["p_count"]; ?></p>



            </div>

        </div>
        <!-- Card -->

        <?php
                }
                ?>

    </div>

</body>


</html>

<?php
    }
} else {
    header('Location: login.php');
    exit;
}
?>