<?php
$servername = "example-servername";
$username = "example-username";
$password = "example-password";
$dbname = "example-dbname";

// Tạo kết nối đến cơ sở dữ liệu
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
	die("Kết nối không thành công: " . mysqli_connect_error());
}

// Tạo table mới
$sql = "CREATE TABLE masv_cua_ban_qlsv (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ho_ten VARCHAR(30) NOT NULL,
nam_sinh INT(4) NOT NULL,
email VARCHAR(50)
)";

if (mysqli_query($conn, $sql)) {
	echo "Tạo table thành công";
} else {
	echo "Lỗi: " . mysqli_error($conn);
}

mysqli_close($conn);

echo "<br><a href='index.php'>Trở về trang chủ</a>";
?>
