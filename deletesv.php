<?php
if (isset($_GET['id'])) {
	// Lấy id của sinh viên cần xóa
	$id = $_GET['id'];

	// Kết nối đến MySQL
	$conn = mysqli_connect("host", "username", "password", "database_name");

	// Kiểm tra kết nối
	if (!$conn) {
	    die("Kết nối thất bại: " . mysqli_connect_error());
	}

	// Xóa sinh viên từ cơ sở dữ liệu
	$sql = "DELETE FROM masv_cua_ban_qlsv WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
	    echo "Xóa sinh viên thành công";
	} else {
	    echo "Xóa sinh viên thất bại";
	}

	// Đóng kết nối
	mysqli_close($conn);
}

echo '<br><br><a href="index.php">Trang chủ</a>';
?>
