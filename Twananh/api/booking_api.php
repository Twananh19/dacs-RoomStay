<?php
include '../db_connect.php';

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        // Lấy danh sách Booking
        $sql = "SELECT Booking.*, Guest.name AS guest_name, Room.room_number AS room_number 
                FROM Booking
                JOIN Guest ON Booking.guest_id = Guest.guest_id
                JOIN Room ON Booking.room_id = Room.room_id";
        $result = $conn->query($sql);
        $bookings = array();

        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row;
        }
        echo json_encode($bookings);
        break;

    case 'POST':
        // Thêm Booking mới
        $data = json_decode(file_get_contents("php://input"), true);
        $guest_id = $data['guest_id'];
        $room_id = $data['room_id'];
        $booking_date = $data['booking_date'];
        $status = "Pending"; // Mặc định là "Pending"

        $sql = "INSERT INTO Booking (guest_id, room_id, booking_date, status) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiss", $guest_id, $room_id, $booking_date, $status);
        $stmt->execute();

        echo json_encode(array("message" => "Booking added successfully!"));
        break;

    case 'PUT':
        // Cập nhật trạng thái Booking
        $data = json_decode(file_get_contents("php://input"), true);
        $booking_id = $data['booking_id'];
        $status = $data['status']; // "Confirmed" hoặc "Cancelled"

        $sql = "UPDATE Booking SET status = ? WHERE booking_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $booking_id);
        $stmt->execute();

        echo json_encode(array("message" => "Booking status updated successfully!"));
        break;

    default:
        echo json_encode(array("message" => "Invalid request method!"));
        break;
}
?>
