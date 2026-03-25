<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
	$group = htmlspecialchars($_POST['group']);
	
	include_once('baza_connect.php');
	
	// З'єднатися з базою даних
	$conn = new mysqli($servername, $username, $password, $dbname);	
	$sql = "INSERT INTO students (name, age, groupp) VALUES ('$name', '$age', '$group')";
	if ($conn->query($sql) === FALSE) {
        echo "Error inserting record: " . $conn->error;
    }
}
$sql  = "SELECT * FROM students ORDER BY age";
$result = $conn->query($sql); 
$sql_1 = "SELECT SUM(age) as sum, groupp FROM students  GROUP BY groupp";
$result_1 = $conn->query($sql_1);


if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<div>	Привіт  ". $row['name'] . "! твій вік ". $row['age'] . " група  " . $row['groupp'] . "</div>";
}	}	
while($row1 = $result_1->fetch_assoc()){ 
echo "<div >Сумарний вік: група " . $row1['groupp'] . " -> " . $row1['sum'] . "</div>";
}
echo "<div>Всього найкращого</div>";