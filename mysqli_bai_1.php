<?php
// khai báo các biến để kết nối đến csdl
$servername = "localhost";
$usename ="root";
$password = "";
$databasename ="BAI_TAP_1";
// kết nối 
$conn = mysqli_connect ($servername , $usename, $password,$databasename);
// kiểm tra sự kết nối 
if (!$conn){
    die ("Kết nối thất bại" . mysqli_connect_error ());
} else {
echo " Kết nối thành công ";
}
// tạo bảng 
$sql_stmt = " CREATE TABLE IF NOT EXISTS`SINH_VIEN` (
    `MaSV` varchar(10) PRIMARY KEY NOT NULL,
    `Hoten` varchar(50) NOT NULL,
    `Ngaysinh` datetime NOT NULL,
    `Lophoc` varchar (50) NOT NULL, 
    `DTB` float NOT NULL)";

$result = mysqli_query($conn , $sql_stmt);

if (!$result)
{
    die ("Tạo bảng thất bại ". mysqli_error());
} else {
echo " Tạo bảng thành công ";
}
// insert thông tin 
$sql_stmt = "INSERT INTO `SINH_VIEN` (`MaSV`, `Hoten`, `Ngaysinh`, `Lophoc`, `DTB` )
VALUES ('SV001', 'Phương Thanh', '2002-5-3', '12A1' , '8.5'),
       ('SV002', 'Thanh Thảo', '2002-16-3', '12A1' , '8.0'),
       ('SV003', 'Minh Hằng ', '2002-5-6', '12A1' , '7.5'),
       ('SV004', 'Thanh Tâm', '2002-24-8', '12A1' , '7.9'),
       ('SV005', 'Lan Phương ', '2002-25-2', '12A1' , '8.2')";

$result = mysqli_query ($conn, $sql_stmt);// thực thi 

// check 
if (!$result)
{
    die("Thêm dữ liệu thất bại ". mysqli_error());
} else { 
    echo "Thêm dữ liệu thành công "; 
}

 // Cập nhật điểm trung bình của sinh viên có mã "SV001" thành 8.5.
 $sql_stmt = "UPDATE `SINH_VIEN` SET `Diem_TB` = '8.5'";
 $sql_stmt = "WHERE `MaSV` = 'SV002' ";

 $result = mysqli_query( $conn, $sql_stmt);// thực thi 

 if (!$result)
{
    die ("Cập nhật điểm trung bình không thành công ". mysqli_error ());
} else {
    echo "Cập nhật điểm trung bình thành công ";
}

//Xoá thông tin của sinh viên có mã "SV003" khỏi bảng danh sách.
$sql_stmt = " DELETE `SINH_VIEN` ";
$sql_stmt = " WHERE `MaSV` = 'SV003'";

$result = mysqli_query ($conn, $sql_stmt);

if(!$result)
{
    die ("Xóa thông tin thất bại ". mysqli_error ());
} else {
    echo "Xóa thông tin thành công ";
}

//Tạo bảng lịch sử giao dịch với các cột: ngày giao dịch, loại giao dịch, số tiền, mô tả.
$sql_stmt= "CREATE TABLE IF NOT EXISTS `LSGD` (
    `Ngay_giao_dich` datetime NOT NULL,
    `Loai_giao_dich` varchar (50) NOT NULL,
    `So_tien` float NOT NULL,
    `Mo_ta` varchar (50) NOT NULL );"

$result = mysqli_query( $conn, $sql_stml );

if (!$result)
{
    die("Tạo bảng lịch sử giao dịch thất bại ". mysqli_error());
} else { 
    echo "Tạo bảng lịch sử giao dịch thành công "; 
}





