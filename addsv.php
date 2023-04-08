<?php
// Kết nối đến MySQL
$conn = mysqli_connect("host", "username", "password", "database_name");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $hoTen = $_POST["ho_ten"];
    $namSinh = $_POST["nam_sinh"];
    $email = $_POST["email"];

    // Tạo câu truy vấn SQL
    $sql = "INSERT INTO masv_cua_ban_qlsv (ho_ten, nam_sinh, email) VALUES ('$hoTen', '$namSinh', '$email')";

    // Thực hiện câu truy vấn
    if (mysqli_query($conn, $sql)) {
        echo "Thêm sinh viên thành công!";
    } else {
        echo "Thêm sinh viên thất bại: " . mysqli_error($conn);
    }
}

// Đóng kết nối
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên mới</title>
</head>
<body>
    <h1>Thêm sinh viên mới</h1>
    <form method="POST">
        Họ tên: <input type="text" name="ho_ten"><br>
        Năm sinh: <input type="text" name="nam_sinh"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" value="Thêm">
    </form>
    <br>
    <a href="index.php">Quay lại trang chủ</a>
</body>
</html>
