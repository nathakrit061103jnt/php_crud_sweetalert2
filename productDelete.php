้
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

</body>

</html>
<?php
//เช็อกว่่ามีการส่งค่า Get p_id หรือไม่ (?p_id=xxx)
if (isset($_GET["p_id"])) {

    //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
    include_once("config/connectDB.php");

    // คำสั่ง sql ในการลบข้อมูล ตาราง tbl_products โดยจะลบข้อมูลสินค้า p_id ที่ส่งมา
    $sql = "DELETE FROM tbl_products WHERE p_id={$_GET["p_id"]}";


    if (mysqli_query($conn, $sql)) {
        echo
            "<script> 
                aler('[[');
            </script>";
        //header('Location: index.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    header('Location: index.php');
}