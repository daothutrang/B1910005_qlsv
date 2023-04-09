<?php
    // Lấy thông tin kết nối đến cơ sở dữ liệu từ biến môi trường
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
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ho_ten VARCHAR(50) NOT NULL,
    nam_sinh INT NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE
    )";
    if (mysqli_query($conn, $sql)) {
        echo "\n\nTable created successfully.";
    } else {
        echo "\n\nERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>
