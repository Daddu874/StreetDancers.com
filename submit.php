<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StreetDancers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO Students (name, age, contact, address) VALUES (?, ?, ?,?)");
    $stmt->bind_param("siis", $name, $age, $contact, $address);

    // Execute the statement
   // Execute the statement
   if ($stmt->execute() === TRUE) {
    echo '<script>alert("Form submitted succesfully you can go back to main page")</script>'; 
  
} else {
    echo "Error submitting form.";
}

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
