<?php
// start or resume the session
session_start();
// Database connection details
$servername = "sql104.freeinfinity.com";
$username = "if0_35637657";
$password = "UZk7aK9d8J";
$dbname = "if0_35637657_login";

// Connect to the database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch user from the database based on the provided username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        // User found, verify the entered password
        $storedPassword = $user['password'];

        if (password_verify($password, $storedPassword)) {
            echo "Login successful!";
            // Redirect the user to a different page or perform other actions
        } else {
            $_SESSION['error_msg'] = "Incorrect password";
            header("Location: index.html");
            exit();
            // Optionally redirect to the login page with an error message
        }
    } else {
            $_SESSION['error_msg'] = "ser not found";
            header("Location: index.html");
            exit();
        // Optionally redirect to the login page with an error message
    }
}

// Close the connection
$conn = null;
?>
