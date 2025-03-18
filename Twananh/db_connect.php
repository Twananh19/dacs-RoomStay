<?php
$servername = "127.0.0.1"; // hoặc "localhost"
$username = "root"; // Tên người dùng MySQL (mặc định là "root")
$password = ""; // Mật khẩu MySQL (để trống nếu chưa thiết lập)
$dbname = "hotel_booking"; // Tên cơ sở dữ liệu
$port = 3307; // Cổng MySQL (mặc định là 3306)

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
