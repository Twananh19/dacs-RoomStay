<?php
include '../db_connect.php';

// Xử lý request method
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        // Lấy danh sách Guest
        $sql = "SELECT * FROM Guest";
        $result = $conn->query($sql);
        $guests = array();

        while ($row = $result->fetch_assoc()) {
            $guests[] = $row;
        }
        echo json_encode($guests);
        break;

    case 'POST':
        // Thêm Guest mới
        $data = json_decode(file_get_contents("php://input"), true);
        $name = $data['name'];
        $phone = $data['phone'];
        $email = $data['email'];
        $address = $data['address'];

        $sql = "INSERT INTO Guest (name, phone, email, address) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $phone, $email, $address);
        $stmt->execute();

        echo json_encode(array("message" => "Guest added successfully!"));
        break;

    default:
        echo json_encode(array("message" => "Invalid request method!"));
        break;
}
?>
