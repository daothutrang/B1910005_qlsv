<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "user", "password", "masv_cua_ban_qlsv");

// Lấy danh sách sinh viên
$sql = "SELECT * FROM masv_cua_ban_qlsv";
$result = $conn->query($sql);

// Hiển thị danh sách sinh viên
?>
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
			<th>Thao tác</th>
		</tr>
		<?php
		if ($result->num_rows > 0) {
			// Duyệt qua từng dòng kết quả
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["ho_ten"] . "</td>";
				echo "<td>" . $row["nam_sinh"] . "</td>";
				echo "<td>" . $row["email"] . "</td>";
				echo "<td>";
				echo "<a href='update.php?id=" . $row["id"] . "'>Sửa</a> ";
				echo "<a href='deletesv.php?id=" . $row["id"] . "'>Xóa</a>";
				echo "</td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
		}
		?>
	</table>
	<a href="index.php">Trở về trang chủ</a>
</body>
</html>
