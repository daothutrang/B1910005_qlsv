<!DOCTYPE html>
<html>
<head>
	<title>Danh sách sinh viên</title>
</head>
<body>
	<h1>Danh sách sinh viên</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Họ tên</th>
			<th>Năm sinh</th>
			<th>Email</th>
			<th></th>
		</tr>

		<?php
		// Kết nối đến MySQL
		$conn = mysqli_connect("host", "username", "password", "database_name");

		// Kiểm tra kết nối
		if (!$conn) {
		    die("Kết nối thất bại: " . mysqli_connect_error());
		}

		// Lấy danh sách sinh viên từ cơ sở dữ liệu
		$sql = "SELECT * FROM masv_cua_ban_qlsv";
		$result = mysqli_query($conn, $sql);

		// Hiển thị danh sách sinh viên
		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		        echo "<tr>";
		        echo "<td>" . $row["id"] . "</td>";
		        echo "<td>" . $row["ho_ten"] . "</td>";
		        echo "<td>" . $row["nam_sinh"] . "</td>";
		        echo "<td>" . $row["email"] . "</td>";
		        echo '<td><a href="deletesv.php?id=' . $row["id"] . '">Xóa</a></td>';
		        echo "</tr>";
		    }
		} else {
		    echo "Không có sinh viên nào trong cơ sở dữ liệu";
		}

		// Đóng kết nối
		mysqli_close($conn);
		?>
	</table>

	<br><br>
	<a href="index.php">Trang chủ</a>
</body>
</html>
