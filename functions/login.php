<?php
// Login Function
function login($mysqli, $email, $password) {
    global $mysqli; // Access the global $mysqli object

    if(isset($_POST['email']) || isset($_POST['password'])) {
        $email = trim($_POST['email']); // Remove whitespace
        $password = trim($_POST['password']);

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid Email Address";
            return false;
        }

        // Validate password (simple check - can be improved)
        if (!preg_match('/^[a-zA-Z0-9]{8,}$/i', $password)) {
            echo "Invalid Password";
            return false;
        }


        $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$password'";
        $result = $mysqli->query($sql);

        if ($result) {
            // Success!  Retrieve user data.
            $usuario = $result->fetch_assoc();

            // Check if the user is logged in
            if (isset($_SESSION['id']) && $_SESSION['id'] == $usuario['id']) {
                // Successful login - proceed to registration
                return true; // Indicate successful login
            } else {
                // Login failed - display an error message
                echo "Login Failed";
                return false; // Indicate login failure
            }
        } else {
            // Login failed
            echo "Error during login";
            return false; //Indicate a failed login
        }

    }
    return false; // Indicates login failed.  Important for handling errors.
}