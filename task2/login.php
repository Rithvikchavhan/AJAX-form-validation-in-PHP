<?php

$success = false; 

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    echo json_encode(array("success" => false, "message" => "Please fill in all the fields"));
} 
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array("success" => false, "message" => "Invalid email format!"));
}
else {
    // conn
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "ajax";
    $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

    if (!$conn) {
        echo json_encode(array("success" => false, "message" => "Database connection error"));
    } else {
        $sql = "SELECT password FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];

            if (password_verify($password, $storedPassword)) {
                $success = true;
            }
        }
        
        $conn->close();
        echo json_encode(array("success" => $success, "message" => $success ? "Login successful!" : "Invalid Email or password"));
    }
}
?>
