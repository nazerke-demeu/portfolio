<?php
// Подключение к базе данных PostgreSQL
$conn = pg_connect("host=localhost dbname=contact_db user=postgres password='zxccxz7705'") or die('Connection failed');

// Обработка формы при отправке
if (isset($_POST['send'])) {
    // Экранирование данных из формы
    $name = pg_escape_string($conn, $_POST['name']);
    $email = pg_escape_string($conn, $_POST['email']);
    $number = pg_escape_string($conn, $_POST['number']); // Исправлено на соответствие имени
    $msg = pg_escape_string($conn, $_POST['message']);

    // Проверка на дубликат сообщения
    $select_message = pg_query($conn, "SELECT * FROM contact_forms WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('Query failed: ' . pg_last_error());

    if (pg_num_rows($select_message) > 0) {
        $message[] = 'Message sent already!';
    } else {
        // Вставка нового сообщения
        pg_query($conn, "INSERT INTO contact_forms (name, email, number, message) VALUES ('$name', '$email', '$number', '$msg')") or die('Query failed: ' . pg_last_error());
        $message[] = 'Message sent successfully!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PORTFOLIO</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="final.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) { // Избегаем перезаписи $message
        echo '<div class="message">
        <span>' . htmlspecialchars($msg) . '</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>';
    }
}
?>

	<header class="header">

		<div id="menu-btn" class="fas fa-bars"></div>

		<a href="#home" class="logo">Portfolio</a>

		<nav class="navbar">
			<a href="#home" class="active">home</a>
			<a href="#about">about</a>
			<a href="#services">services</a>
			<a href="#portfolio">portfolio</a>
			<a href="#contact">contact</a>
		</nav>

		<div class="follow">
			<a href="#" class="fab fa-facebook-f"></a>
			<a href="#" class="fab fa-twitter"></a>
			<a href="#" class="fab fa-instagram"></a>
			<a href="#" class="fab fa-linkedin"></a>
			<a href="#" class="fab fa-github"></a>
		</div>
	</header>
	<section class="home" id="home">
		<div class="image">
			<img src="naz2.jpg" alt="">
		</div>
		<div class="content">
			<h3>hello, i am demeu nazerke</h3>
			<span>Digital Engineer student at Narxoz University</span>
			<p>I am Demeu Nazerke, I am 2nd year student at Narxoz University. I am Digital Engineering student learning Web Development and building projects</p>
			<a href="#about" class="btn">about me</a>
		</div>
	</section>

	<section class="about" id="about">
		<h1 class="heading"><span>biography</span></h1>
		<div class="biography">
			<p> Hi! I’m Nazereke, a 19-year-old second-year student at **Narxoz University**, majoring in Digital Engineering. I’m passionate about web development and exploring modern technologies. I work on projects like designing databases (e.g., for a social network called Meta), creating interactive web applications such as quizzes, and diving into information security.</p> 
			<div class="bio">
				<h3><span>name : </span> demeu nazerke</h3>
				<h3><span>email : </span> demeuova2005@gmail.com</h3>
				<h3><span>address : </span> almaty, qazaqstan</h3>
				<h3><span>phone : </span> +7(777)-777-7777</h3>
				<h3><span>age : </span> 19 years</h3>
				<h3><span>experience : </span> student</h3>
			</div>
			<a href="#" class="btn">download CV</a>
		</div>

		<div class="skills">
    <h1 class="heading"><span>skills</span></h1>
    <div class="progress">
        <div class="bar">
            <h3><span>HTML</span> <span>80%</span></h3>
        </div>
        <div class="bar">
            <h3><span>CSS</span> <span>75%</span></h3>
        </div>
        <div class="bar">
            <h3><span>JAVASCRIPT</span> <span>65%</span></h3>
        </div>
        <div class="bar">
            <h3><span>PHP</span> <span>60%</span></h3>
        </div>
    </div>
     <div class="edu-exp">
     	<h1 class="heading"> <span>education & experience</span></h1>
     	<div class="row">
     		<div class="box-container">
     			<h3 class="title">education</h3>
     			<div class="box">
     			<span>(2012 - 2023)</span>
     			<h3>as a student</h3>
     			<p>1. Completed High School — School No.3<br>2. Math Course — JUZ40<br>3. Informatics Course — JUZ40<br>4. English Language Course — JUZEnglish<br>5. Intensive English Course — Narxoz University<br></p>
     		</div>

     		<div class="box">
     			<span>(2023 - 2024)</span>
     			<h3>as a student</h3>
     			<p>1. Intensive English Course — Narxoz University<br>2. Currently a 2nd-Year Student — Narxoz University<br>4. Summer Camp = Impact Education</p></p>
     		</div>
     	</div>

     	<div class="box-container">
     			<h3 class="title">experience</h3>
     			<div class="box">
     			<span>(2012 - 2023)</span>
     			<h3>as a student</h3>
     			<p>1. Republican Olympiad in Informatics — 2nd Place<br>2. Republican Chess League — 2nd Place<br>
            3. Project: ICT Quiz (Python)<br>4. Project: Telegram Bot for ICT (Python)<br></p>
     		</div>

     		<div class="box">
     			<span>(2023 - 2024)</span>
     			<h3>as a student</h3>
     			<p>5. Project: "Bouncing Balls" Game (Pygame)<br>6. Experience as a Math Tutor<br>7. Experience as an Informatics Tutor</p>
     		</div>
     	</div>
     </div>
</div>

		</div>
	</section>

	<section class="services" id="services">
		<h1 class="heading"> <span>services</span> </h1>
		<div class="box-container">
			<div class="box">
				<i class="fas fa-chart-line"></i>
				<h3>game development</h3>
				<p>Project: ICT Quiz (Python)<br>Project: Telegram Bot for ICT (Python)<br>
					Project: "Bouncing Balls" Game (Pygame)<br></p>
			</div>

			<div class="box">
				<i class="fas fa-bullhorn"></i>
				<h3>math couch</h3>
				<p>Math Course — JUZ40<br>Experience as a Math Tutor</p>
			</div>

			<div class="box">
				<i class="fas fa-bootstrap"></i>
				<h3>informatics couch</h3>
				<p>Republican Olympiad in Informatics — 2nd Place<br>Experience as an Informatics Tutor</p>
			</div>

		</div>
	</section>

	<section class="portfolio" id="portfolio">
		<h1 class="heading"> <span>portfolio</span> </h1>
		<div class="box-container">
			<div class="box">
				<img src="naz4.jpg" alt="">
				<h3>math tutor</h3>
				<span>(2020 - 2022)</span>
			</div>

			<div class="box">
				<img src="naz4.jpg" alt="">
				<h3>web development</h3>
				<span>(2024)</span>
			</div>

			<div class="box">
				<img src="naz4.jpg" alt="">
				<h3>informatics tutor</h3>
				<span>(2019 - 2022)</span>
			</div>

		</div>
	</section>

	<section class="contact" id="contact">
		<h1 class="heading"> <span>contact me</span> </h1>
		<form action="" method="post">
			<div class="flex">
				<input type="text" name="name" placeholder="enter your name" class="box" required>
				<input type="email" name="email" placeholder="enter your email" class="box" required>
			</div>
			<input type="number" min="0" placeholder="enter your number" class="box" required>
			<textarea name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
			<input type="submit" value="send message" name="send" class="btn">
		</form>

		<div class="box-container">

<div class="box">

<i class="fas fa-phone"></i>

<h3>phone</h3>

<p>+123-456-7890</p>

</div>

<div class="box">

<i class="fas fa-envelope"></i>

<h3>email</h3>

<p>demeu.nazerke@gmail.com</p>

</div>

<div class="box">
	<i class="fas fa-map-marker-alt"></i>

<h3>address</h3>

<p>almaty, qazaqstan</p>

</div>

</div>


	</section>

	<div class="credit"> &copy; 2024 Nazerke <?php echo date('Y'); ?> by <span>ms. web designer</span> </div>


	<script src="final.js"></script>
</body>
</html>