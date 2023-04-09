<?php
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "masv_cua_ban_qlsv";
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Tạo bảng sinh viên
$sql = "CREATE TABLE sinh_vien (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ho_ten VARCHAR(30) NOT NULL,
nam_sinh INT(4) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tạo bảng sinh viên thành công";
} else {
    echo "Tạo bảng sinh viên thất bại: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
<br><br>
<a href="index.php">Trở về trang chủ</a>
