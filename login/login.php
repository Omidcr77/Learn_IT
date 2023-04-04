<?php
// Set up database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Prepare the SQL statement
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Login success
    session_start();
    $_SESSION['username'] = $username;
    header("Location: ./dashboard.php "); // Redirect to dashboard page
  } else {
    // Login failed
    $error = "Invalid username or password";
  }
}

$conn->close();
?>