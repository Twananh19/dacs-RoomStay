<?php
include '../db_connect.php';

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        // Lấy danh sách Staff
        $sql = "SELECT * FROM Staff";
        $result = $conn->query($sql);
        $staffs = array();

        while ($row = $result->fetch_assoc()) {
            $staffs[] = $row;
        }
        echo json_encode($staffs);
        break;

    case 'POST':
        // Thêm Staff mới hoặc đăng nhập
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['action']) && $data['action'] === 'login') {
            // Đăng nhập
            $username = $data['username'];
            $password = $data['password'];

            $sql = "SELECT * FROM Staff WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $staff = $result->fetch_assoc();
                if (password_verify($password, $staff['password'])) {
                    echo json_encode(array("message" => "Login successful!", "staff" => $staff));
                } else {
                    echo json_encode(array("message" => "Invalid password!"));
                }
            } else {
                echo json_encode(array("message" => "Username not found!"));
            }
        } else {
            // Thêm nhân viên mới
            $name = $data['name'];
            $username = $data['username'];
            $password = password_hash($data['password'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO Staff (name, username, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $username, $password);
            $stmt->execute();

            echo json_encode(array("message" => "Staff added successfully!"));
        }
        break;

    default:
        echo json_encode(array("message" => "Invalid request method!"));
        break;
}
?>
