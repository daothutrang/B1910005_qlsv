<?php
    // Lấy thông tin kết nối MySQL từ biến môi trường
    $MYSQL_ADDON_HOST = getenv('MYSQL_ADDON_HOST');
    $MYSQL_ADDON_PORT = getenv('MYSQL_ADDON_PORT');
    $MYSQL_ADDON_DB = getenv('MYSQL_ADDON_DB');
    $MYSQL_ADDON_USER = getenv('MYSQL_ADDON_USER');
    $MYSQL_ADDON_PASSWORD = getenv('MYSQL_ADDON_PASSWORD');
    $MYSQL_ADDON_URI = getenv('MYSQL_ADDON_URI');

    // Kết nối đến MySQL
    $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB);

    // Kiểm tra kết nối
    if ($conn === false) {
        die("\n\nERROR: Could not connect. " . mysqli_connect_error());
    }

    // Tạo bảng masv_cua_ban_qlsv
    $sql = "CREATE TABLE masv_cua_ban_qlsv (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        ho_ten VARCHAR(50) NOT NULL,
        nam_sinh INT(4) NOT NULL,
        email VARCHAR(70) NOT NULL UNIQUE
    )";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Table 'masv_cua_ban_qlsv' created successfully.</p>";
        echo "<a href='index.php'>Back to home page</a>";
    } else {
        echo "<p>ERROR: Could not able to execute $sql. " . mysqli_error($conn) . "</p>";
        echo "<a href='index.php'>Back to home page</a>";
    }

    // Đóng kết nối
    mysqli_close($conn);
?>
