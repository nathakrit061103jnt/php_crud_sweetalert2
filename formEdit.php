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

</head>

<body class="">


    <!-- การนำเข้า Navbar -->
    <?php include_once("navBar.php"); ?>

    <br>


    <!-- จบ คลาส container -->

    <div class="container my-5 px-0 1">

        <!--Section: Content-->
        <section class="p-5 my-md-5 text-center">

            <?php

                    //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                    include_once("config/connectDB.php");

                    $sql = "SELECT * FROM tbl_products WHERE p_id='{$_GET["p_id"]}'";
                    $result = mysqli_query($conn, $sql);

                    // เเสดงข้อมูลจากฐานข้อมูล
                    while ($item = mysqli_fetch_assoc($result)) { ?>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <!-- Material form login -->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" action="" method="POST">
                                <h3 class="font-weight-bold my-4 pb-2 text-center text-danger">เเก้ไขสินค้า </h3>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $item["p_name"]; ?>" class="form-control"
                                        required autofocus placeholder="ชื่อสินค้า" name="p_name" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" value="<?php echo $item["p_price"]; ?>"
                                        required placeholder="ราคาสินค้า" name="p_price" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $item["p_count"]; ?>"
                                        required placeholder="จำนวนสินค้า" name="p_count" required>
                                </div>

                                <div class="text-center">
                                    <input type="submit" name="SubmitUpdate" value="เเก้ไข" class="btn btn-warning">
                                </div>

                            </form>
                            <!-- Form -->

                        </div>

                    </div>
                    <!-- Material form login -->
                </div>
            </div>


            <?php
                    } ?>

        </section>
        <!--Section: Content-->
    </div>
    <!-- จบ คลาส container -->

    <?php

            if (isset($_POST["SubmitUpdate"])) {
                //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                include_once("config/connectDB.php");

                //คำสั่ง SQL บันทึกข้อมูลลงฐานข้อมูล
                $sqlUp = "UPDATE tbl_products SET p_name = '{$_POST["p_name"]}', p_price = '{$_POST["p_price"]}', p_count = '{$_POST["p_count"]}' 
                      WHERE p_id = '{$_GET["p_id"]}';";

                if (mysqli_query($conn, $sqlUp)) {
                    echo
                        "<script> 
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เเก้ไขข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(()=> location = 'index.php')
                </script>";
                } else {
                    echo
                        "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'เเก้ไขข้อมูลไม่สำเร็จ', 
                        text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                    }) 
                </script>";
                }
                mysqli_close($conn);
            }

            ?>

    </bodyclass=>

</html>

<?php
    }
} else {
    header('Location: login.php');
    exit;
}
?>