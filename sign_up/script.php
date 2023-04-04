<?php
$servername = "localhost";
$username = "root";
$password = "hope22";
$dbname = "mydatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Attempt insert query execution
$sql = "INSERT INTO users (name, lastname, gender, email, password) VALUES ('$name', '$lastname', '$gender', '$email', '$password')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
