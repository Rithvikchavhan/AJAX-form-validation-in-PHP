$(document).ready(function() {
    $("#registrationForm").submit(function(event) {
        event.preventDefault();

        var formData = {
            firstName: $("#firstName").val(),
            lastName: $("#lastName").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            confirmPassword: $("#confirmPassword").val()
        };

        $.ajax({
            type: "POST",
            url: "register.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.success) {
                    alert("Registration successful!!");
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert("An error occurred");
            }
        });
    });

    $("#loginForm").submit(function(event) {
        event.preventDefault();

        var formData = {
            email: $("#email").val(),
            password: $("#password").val(),
        };

        $.ajax({
            type: "POST",
            url: "login.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.success) {
                    alert("Login successful!!");
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert("An error occurred");
            }
        });
    });
});
