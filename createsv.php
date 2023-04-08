<?php
// Kết nối đến MySQL
$conn = mysqli_connect("host", "username", "password", "database_name");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Tạo bảng masv_cua_ban_qlsv
$sql = "CREATE TABLE masv_cua_ban_qlsv (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ho_ten VARCHAR(50) NOT NULL,
    nam_sinh INT(4) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE
)";

if (mysqli_query($conn, $sql)) {
    echo "Tạo bảng masv_cua_ban_qlsv thành công";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);

echo "<br><a href='index.php'>Quay lại trang chủ</a>";
?>
