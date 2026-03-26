<?php 
include_once('baza_connect.php');

$conn = new mysqli($servername, $username, $password, $dbname);
$sql  = "SELECT * FROM students ORDER BY age";
$result = $conn->query($sql);
 
$sql_1 = "SELECT SUM(age) as sum, groupp FROM students  GROUP BY groupp";
$result_1 = $conn->query($sql_1);	

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Пробна сторінка</title>	
<link rel="stylesheet" href="styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">	
</head>
    <body>
		<section id='main'>
		<div class="main-block" id="main-block" >
				<?php
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
				?>
				<div>
					Добрий день <?= $row['name'] ?>! твій вік <?= $row['age']?> група <?= $row['groupp']?>
				</div>
				<?php 
					}}	
				
				?>
				<?php while($row1 = $result_1->fetch_assoc()){ ?>
				<div >
				 Сумарний вік: група <?=$row1['groupp']?> -> <?=$row1['sum']?>
				</div>
				<?php } ?>
				<div>
				 Всього найкращого
				</div>				
		</div>
		
		<div class="resort-button-wrap">
			<div hx-get="resort.php" hx-target="#main-block" class="resort-button" hx-trigger="click" id="resort-button">Пересортувати</div>		
		</div>
		<div class="row">
		<div class="col-md-3 col-lg-6">
			<div id="css-test"   class="main-block" >
				Ще раз Привіт! 
			</div>
		
			<button onclick="StartAnimation();">Розочати анімацію</button>
		</div>
		<div  class="col-md-9 col-lg-6">	
		
			<div id='last-block' class="main-block">
				І знову Привіт!
			</div>
		
			<button onclick="ChangeText();">Змінити текст</button>
		
		</div>
		</div>
		</section>
		<section id="user-form">
		<form name="contactForm" id="contactForm"  action="saveuser.php"  method='POST'>
			<div  class="input-wrap">
			  <input type="text" name="name" placeholder="Ваше ім'я *"  required>
			 </div>
			 <div  class="input-wrap">		
			   <input type="number" name="age" placeholder="Ваш вік *"  required>
			</div>
			<div  class="input-wrap">
			  <input type="number" name="group" placeholder="Група *"  required>
			</div>
			<div  class="input-wrap">
			  <input type="submit" value="надіслати">
			</div>
		</form>
		</section>
		
		
		<section id="footer">
			Me (C) <span id="current-year">****</span>
		</section> 

		<script src="script.js"></script>
		<script src="https://unpkg.com/htmx.org@1.9.10"></script>
	</body>

</html>