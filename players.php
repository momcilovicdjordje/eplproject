<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Premier League</title>
<meta charset="utf8">
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<header>
		<img src="./images/logo.png" alt="Logo">
		<div>
			<?php if (isset($_SESSION['username'])){ ?>
				<a href="logout.php">Logout</a>
			<?php }else{ ?>
				<a href="login.php">Login</a>
				<a href="./register.php">Register</a>
			<?php } ?>
		</div>
    </header>
	<nav>
		<div class="navbar">
			<a href="./index.php">HOME</a>
			<a href="./fixtures.php">FIXTURES</a>
			<a href="./news.php">NEWS</a>
			<a href="./stats.php">STATS</a>
			<a href="./players.php">PLAYERS</a>
		</div>
	</nav>
	<content>
		<main class="">
        	<h1>Players (2024)</h1>
		</main>
	</content>
	<footer>
		&copy;2023. Djordje Momcilovic |
		<secondary>
			<a href="https://www.singidunum.ac.rs" target="_blank">Univerzitet Singidunum</a>
		</secondary>
	</footer>
</body>
</html>