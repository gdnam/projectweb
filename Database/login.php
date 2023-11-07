<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "mywebdb";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin từ biểu mẫu đăng nhập
$username = $_POST['username'];
$password = $_POST['password'];

// Kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Đăng nhập thành công!";
        // Thực hiện hành động sau khi đăng nhập thành công (ví dụ: thiết lập phiên làm việc, chuyển hướng, v.v.)
    } else {
        echo "Sai mật khẩu.";
    }
} else {
    echo "Tài khoản không tồn tại.";
}

$conn->close();
?>
