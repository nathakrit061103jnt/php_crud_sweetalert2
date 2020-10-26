<?php
session_start();
unset($_SESSION['a_username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>

    <link rel="icon" type="image/png"
        href="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/119980752_337785307574954_1757152202764221432_o.jpg?_nc_cat=105&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeEdQ3uuMUpSNsKpHfjvpUDro1XX0a4IIyujVdfRrggjKx0oaTlnEEJRQqIYyg0KJMUxDMwjlPd-dN2hT7EGYqeo&_nc_ohc=0bT4uczorNcAX96yl_4&_nc_ht=scontent.fkkc3-1.fna&oh=6b8d05997d7e1dd2078a3062bc4a3886&oe=5FBB4911" />
    <!-- การลิ้ง css bootstrap เเบบ cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- การลิ้ง javascript ของ bootstrap เเบบ cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- การลิ้ง css ของ data table เเบบ cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">


    <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg); background-size: cover; background-position: center center;">
    <div class="container my-5 px-0 z-depth-1">

        <!--Section: Content-->
        <section class="p-5 my-md-5 text-center">

            <div class="my-5 mx-md-5" action="">

                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <!-- Material form login -->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Form -->
                                <form class="text-center" style="color: #757575;" action="" method="POST">

                                    <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">เข้าสู่ระบบ</h3>

                                    <!-- Name -->
                                    <input type="text" class="form-control mb-4" name="a_username"
                                        placeholder="Username">

                                    <!-- Email -->
                                    <input type="password" class="form-control" name="a_password"
                                        placeholder="Password">

                                    <div class="text-center mt-3">
                                        <input type="submit" name="SubmitLogin" value="เข้าสู่ระบบ"
                                            class="btn btn-primary">
                                    </div>

                                </form>
                                <!-- Form -->

                            </div>

                        </div>
                        <!-- Material form login -->
                    </div>
                </div>

            </div>

        </section>
        <!--Section: Content-->


    </div>


</body>

</html>

<?php
if (isset($_POST["SubmitLogin"])) {

    include "config/connectDB.php";

    @$sql = "SELECT * FROM tbl_admin WHERE a_username = '{$_POST['a_username']}' and a_password = '{$_POST['a_password']}'";
    @$result = mysqli_query($conn, $sql);
    @$row = mysqli_fetch_assoc($result);

    @$count = mysqli_num_rows($result);

    if (@$count == 1) {
        @$_SESSION['a_username'] = @$_POST['a_username'];
        header("Location: index.php");
    } else {
        echo "<script>
                            Swal.fire({
                            icon: 'error',
                            title: 'รหัสผ่านไม่ถูกต้อง',
                            text: 'กรุณาตรวจสอบ รหัสผ่านหรือไอดีผู้ใช้ถูกต้องหรือไม่!', 
                            })
            </script>";
    }
}