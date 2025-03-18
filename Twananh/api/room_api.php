<?php
include '../db_connect.php';

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        // Lấy danh sách Room
        $sql = "SELECT * FROM Room";
        $result = $conn->query($sql);
        $rooms = array();

        while ($row = $result->fetch_assoc()) {
            $rooms[] = $row;
        }
        echo json_encode($rooms);
        break;

    case 'POST':
        // Thêm Room mới
        $data = json_decode(file_get_contents("php://input"), true);
        $room_number = $data['room_number'];
        $room_type = $data['room_type'];
        $price = $data['price'];
        $availability_status = $data['availability_status'];

        $sql = "INSERT INTO Room (room_number, room_type, price, availability_status) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssds", $room_number, $room_type, $price, $availability_status);
        $stmt->execute();

        echo json_encode(array("message" => "Room added successfully!"));
        break;

    default:
        echo json_encode(array("message" => "Invalid request method!"));
        break;
}
?>
