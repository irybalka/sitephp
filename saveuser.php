<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
	$group = htmlspecialchars($_POST['group']);
	
	echo "<h3>надіслані дані:</h3>";
    echo "Привіт " . $name . "<br>";
    echo "Тобі вже: " . $age . " років";
	echo "Твоя група: " . $group ;
	
	include_once('baza_connect.php');

	
	// З'єднатися з базою даних
	$conn = new mysqli($servername, $username, $password, $dbname);	
	$sql = "INSERT INTO students (name, age, groupp) VALUES ('$name', '$age', '$group')";
	if ($conn->query($sql) === FALSE) {
        echo "Error inserting record: " . $conn->error;
    }
}