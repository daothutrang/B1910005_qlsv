<!DOCTYPE html>
<html>
<head>
	<title>Thêm sinh viên mới</title>
</head>
<body>
	<h1>Thêm sinh viên mới</h1>
	<form method="POST" action="addsv_process.php">
		<p>
			<label>Họ tên:</label><br>
			<input type="text" name="ho_ten" required>
		</p>
		<p>
			<label>Năm sinh:</label><br>
			<input type="number" name="nam_sinh" required>
		</p>
		<p>
			<label>Email:</label><br>
			<input type="email" name="email" required>
		</p>
		<button type="submit">Thêm sinh viên</button>
	</form>
	<a href="index.php">Trở về trang chủ</a>
</body>
</html>
