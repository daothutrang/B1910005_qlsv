<?php
// Kết nối đến MySQL
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "masv_cua_ban_qlsv";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Xác định nếu người dùng đã submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy tên sinh viên cần xóa từ form
  $ten_sv = $_POST["ten_sv"];

  // Xóa sinh viên khỏi cơ sở dữ liệu
  $sql = "DELETE FROM sinhvien WHERE ho_ten='$ten_sv'";
  if (mysqli_query($conn, $sql)) {
    echo "Đã xóa sinh viên có tên là $ten_sv thành công.";
  } else {
    echo "Lỗi: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>

<h2>Xóa sinh viên</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="ten_sv">Tên sinh viên cần xóa:</label>
  <input type="text" name="ten_sv" required><br><br>
  <input type="submit" value="Xóa">
</form>

<a href="index.php">Quay lại trang chủ</a>
