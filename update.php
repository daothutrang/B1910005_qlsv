<!DOCTYPE html>
<html>
<head>
	<title>Cập nhật sinh viên</title>
</head>
<body>
	<h1>Cập nhật sinh viên</h1>

	<?php
	if (isset($_GET['id'])) {
		// Lấy id của sinh viên cần cập nhật
		$id = $_GET['id'];

		// Kết nối đến MySQL
		$conn = mysqli_connect("host", "username", "password", "database_name");

		// Kiểm tra kết nối
		if (!$conn) {
		    die("Kết nối thất bại: " . mysqli_connect_error());
		}

		// Lấy thông tin của sinh viên từ cơ sở dữ liệu
		$sql = "SELECT * FROM masv_cua_ban_qlsv WHERE id=$id";
		$result = mysqli_query($conn, $sql);

		// Hiển thị thông tin của sinh viên trong form
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$ho_ten = $row['ho_ten'];
			$nam_sinh = $row['nam_sinh'];
			$email = $row['email'];
			?>
			<form action="update.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<label for="ho_ten">Họ tên:</label>
				<input type="text" name="ho_ten" id="ho_ten" value="<?php echo $ho_ten; ?>" required><br><br>
				<label for="nam_sinh">Năm sinh:</label>
				<input type="number" name="nam_sinh" id="nam_sinh" value="<?php echo $nam_sinh; ?>" required><br><br>
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" value="<?php echo $email; ?>"><br><br>
				<input type="submit" value="Cập nhật">
			</form>
			<?php
		} else {
			echo "Không tìm thấy sinh viên có id=$id";
		}
	} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Lấy dữ liệu từ form
		$id = $_POST['id'];
		$ho_ten = $_POST['ho_ten'];
		$nam_sinh = $_POST['nam_sinh'];
		$email = $_POST['email'];

		// Kết nối đến MySQL
		$conn = mysqli_connect("host", "username", "password", "database_name");

		// Kiểm tra kết nối
		if (!$conn) {
		    die("Kết nối thất bại: " . mysqli_connect_error());
		}

		// Cập nhật thông tin của sinh viên
		$sql = "UPDATE masv_cua_ban_qlsv SET ho_ten='$ho_ten', nam_sinh=$nam_sinh, email='$email' WHERE id=$id";

		if (mysqli_query($conn, $sql)) {
            echo "Cập nhật thành công!";
        } else {
            echo "Có lỗi xảy ra: " . mysqli_error($conn);
        }
    
        // Đóng kết nối
        mysqli_close($conn);
    } else {
        echo "Không có thông tin sinh viên cần cập nhật";
    }
    ?>
    </body>
    </html>
    
    
    
		   
