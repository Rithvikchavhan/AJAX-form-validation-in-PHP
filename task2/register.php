<?php

$success = false; 

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
    echo json_encode(array("success" => false, "message" => "Please fill in all the fields"));
} 

elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array("success" => false, "message" => "Invalid email format!"));
}

elseif ($password !== $confirmPassword) {
    echo json_encode(array("success" => false, "message" => "Passwords do not match!"));
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
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo json_encode(array("success" => false, "message" => "Email already exists, please type another email!"));
        } else {
            // Hash the password before storing it in the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);
            $success = $stmt->execute();

            $stmt->close();
            $conn->close();
            
            if ($success) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false, "message" => "Registration failed"));
            }
        }
    }
}
?>

