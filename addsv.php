<!DOCTYPE html>
<html>
<head>
	<title>Thêm sinh viên</title>
</head>
<body>
	<h1>Thêm sinh viên</h1>
	<form action="addsv.php" method="POST">
		<label for="ho_ten">Họ tên:</label>
		<input type="text" name="ho_ten" id="ho_ten" required><br><br>
		<label for="nam_sinh">Năm sinh:</label>
		<input type="number" name="nam_sinh" id="nam_sinh" required><br><br>
		<label for="email">Email:</label>
		<input type="email" name="email" id="email"><br><br>
		<input type="submit" value="Thêm">
	</form>

	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Lấy dữ liệu từ form
		$ho_ten = $_POST['ho_ten'];
		$nam_sinh = $_POST['nam_sinh'];
		$email = $_POST['email'];

		// Kết nối đến MySQL
		$conn = mysqli_connect("host", "username", "password", "database_name");

		// Kiểm tra kết nối
		if (!$conn) {
		    die("Kết nối thất bại: " . mysqli_connect_error());
		}

		// Thêm sinh viên vào cơ sở dữ liệu
		$sql = "INSERT INTO masv_cua_ban_qlsv (ho_ten, nam_sinh, email)
				VALUES ('$ho_ten', '$nam_sinh', '$email')";

		if (mysqli_query($conn, $sql)) {
		    echo "Thêm sinh viên thành công";
            else {
                echo "Thêm sinh viên thất bại: " . mysqli_error($conn);
            }
    
            // Đóng kết nối
            mysqli_close($conn);
        }
        ?>
    
        <a href="index.php">Quay lại trang chủ</a>
    </body>
    </html>
    