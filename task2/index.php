<!DOCTYPE html>
<html>
<head>
    <title>Registration Form with AJAX Validation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <h1>Registration Form</h1>
    <form id="registrationForm" method="post">
        <div>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName">
        </div>
        <br>
        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName">
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </div>
        <br>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">        
        </div>
        <br>
        <div>
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword">
        </div>
        <br>
        <div>
            <input type="submit" value="Register">
            <button><a href = "loginhtml.php">Login</a></button> 
        </div>

    </form>

</body>
</html>

