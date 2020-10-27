<?php
session_start();
if (isset($_SESSION['a_username'])) { ?>
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
    <!-- การลิ้ง css ของ data table เเบบ cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!-- javascript ที่ทำงานกับ datatable ลิ้งมาเเบบ cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <!-- การลิ้ง icon เพื่อใช้งาน icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

    <!-- การนำเข้า Navbar -->
    <?php include_once("navBar.php"); ?>

    <br>

    <div class="container my-5" ">
        <div class=" row">
        <div class="col-md-10">
            <h3>
                รายการสินค้า จากฐานข้อมูล
                <span class="text-danger">php_crud_sweetalert2</span>
            </h3>
        </div>
        <div class="col-md-2 mt-2">
            <a href="formInsert.php" class="btn btn-primary">
                <i class="far fa-plus-square"></i><span class=" ml-2">เพิ่มสินค้า</span>
            </a>
        </div>
    </div>
    <br>

    <!-- data table ใช้เเสดงข้อมูลเเละเเบ่งหน้าให้อัตโนมัติ -->
    <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ไอดีสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>

            <?php

                //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                include_once("config/connectDB.php");

                $sql = "SELECT * FROM tbl_products";
                $result = mysqli_query($conn, $sql);

                ////การเช็กว่าข้อมูลมีมากกว่า 1 row 
                // if (mysqli_num_rows($result) > 0) 
                // {
                // เเสดงข้อมูลจากฐานข้อมูล
                while ($item = mysqli_fetch_assoc($result)) { ?>

            <!-- เเสดงข้อมูลจากฐานข้อมูล -->

            <tr>
                <td class="" width="15%"><?php echo $item["p_id"]; ?></td>
                <td><?php echo $item["p_name"]; ?></td>
                <td><?php echo $item["p_price"]; ?> บาท</td>
                <td><?php echo $item["p_count"]; ?></td>
                <td class="text-center">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-info" href="productDetail.php?p_id=<?php echo $item["p_id"]; ?>">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-warning" href="formEdit.php?p_id=<?php echo $item["p_id"]; ?>">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a class="btn btn-danger" href="index.php?deleteR=req&p_id=<?php echo $item["p_id"]; ?>">
                            <i class="fas fa-trash"> </i>
                        </a>
                    </div>
                </td>
            </tr>

            <?php
                }
                // } 
                // else {
                //     echo "ไม่พบข้อมูลสินค้า";
                // }

                ////การปิดการเชื่อมต่อฐานนข้อมูล เพื่อคืนค่าหน่วยความจำเเรมของเครื่อง
                // mysqli_close($conn);
                ?>

        </tbody>
        <!-- <tfoot>
                <tr>
                    <th>ไอดีสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ดำเนินการ</th>
                </tr>
            </tfoot> -->
    </table>
    <!-- จบ datatable -->

    </div>
    <!-- จบ คลาส container -->

    <!-- โค้ด pHP ลบข้อมูล -->

    <?php

        if (isset($_GET["deleteR"] )) {
                echo
                    "<script> 
                        Swal.fire({
                            icon: 'warning',
                            title: 'ยืนยันการลบข้อมูล?',
                            text: 'ท่านเเน่ใจว่า ท่าต้องการลบข้อมูล!',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ใช่',
                            cancelButtonText: 'ไม่!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location = 'index.php?deleteR2=req&p_id={$_GET["p_id"]}'
                            }else{
                                location = 'index.php'
                            }
                        }); 
                </script>";
        }

        //เช็อกว่่ามีการส่งค่า Get p_id หรือไม่ (?p_id=xxx)
        if (isset($_GET["deleteR2"])) {

            // คำสั่ง sql ในการลบข้อมูล ตาราง tbl_products โดยจะลบข้อมูลสินค้า p_id ที่ส่งมา
            $sql = "DELETE FROM tbl_products WHERE p_id={$_GET["p_id"]}";

            if (mysqli_query($conn, $sql)) {
                echo
                    "<script> 
                        Swal.fire(
                            'ลบข้อมูลสำเร็จ!',
                            'ท่านได้ลบข้อมูลเรียบร้อย',
                            'success'
                        ).then(()=> location = 'index.php')
                    </script>";
                //header('Location: index.php');
            } else {
                echo
                    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'ลบข้อมูลไม่สำเร็จ', 
                    }).then(()=> location = 'index.php')
                </script>";
            }

            mysqli_close($conn);
        }
        ?>

    <!-- javascript ที่ทำงานกับ datatable ถ้าไม่ใส่จะใช้ datatable ไม่ได้ -->
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

</body>

</html>
<?php
} else {
    header('Location: login.php');
    exit;
}
?>