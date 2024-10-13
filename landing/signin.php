<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In & Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <!-- Sign In Form -->
            <form id="signInForm" class="form">
                <h2>Sign In</h2>
                <label for="signin-email">Email:</label>
                <input type="email" id="signin-email" required>
                
                <label for="signin-password">Password:</label>
                <input type="password" id="signin-password" required>

                <button type="submit">Sign In</button>
                <p class="switch-form">Don't have an account? <a href="#" onclick="switchToSignUp()">Sign Up</a></p>
            </form>

            <!-- Sign Up Form -->

            
            <form id="signUpForm" class="form hidden">
                <h2>Sign Up</h2>
                <label for="signup-email">Email:</label>
                <input type="email" id="signup-email" required>
                
                <label for="signup-password">Password:</label>
                <input type="password" id="signup-password" required>
                
                <label for="signup-confirm-password">Confirm Password:</label>
                <input type="password" id="signup-confirm-password" required>

                <button type="submit">Sign Up</button>
                <p class="switch-form">Already have an account? <a href="#" onclick="switchToSignIn()">Sign In</a></p>
            </form>
            <?php
// Database connection
$host = 'localhost';
$dbname = 'user_authentication';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>
