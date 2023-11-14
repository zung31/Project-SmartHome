<?php

$email  = $_POST['email'];
$password = $_POST['password'];

if (!empty($email) && !empty($password)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "combined";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
    } else {
        $SELECT = "SELECT * FROM register WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum > 0) {
            // Nếu thông tin đăng nhập hợp lệ, thực hiện chuyển hướng trang
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid email or password";
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "Both email and password are required";
}
?>
