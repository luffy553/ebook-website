<?php
$host = 'localhost'; // Your database host
$db = 'bookverse'; // Your database name
$user = 'your_username'; // Your MySQL username
$pass = 'your_password'; // Your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password

    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    if ($stmt->execute([$email, $password])) {
        echo "Registration successful!";
        header("Location: index.html"); // Redirect after successful registration
        exit();
    } else {
        echo "Registration failed!";
    }
}
?>

<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Store user id in session
        echo "Login successful!";
        header("Location: dashboard.php"); // Redirect to a protected page
        exit();
    } else {
        echo "Invalid email or password!";
    }
}
?>
