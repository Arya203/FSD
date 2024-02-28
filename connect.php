<?php
$username = $_POST['username'];
$password1 = $_POST['password1'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("INSERT INTO registration (username, password1, age, gender, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisi", $username, $password1, $age, $gender, $phone);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration Successful.....";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
    $conn->close();
}
?>
