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
        	<h1>Standings (2024)</h1>
			<div
				id="scoreaxis-widget-65dac" 
				style="border-width:1px;border-color:rgba(0, 0, 0, 0.15);border-style:solid;border-radius:8px;padding:10px;background:rgb(255, 255, 255);width:50%;margin:2em;margin-left:auto;margin-right:auto;container:1px" 
				data-reactroot=""><iframe id="Iframe" src="https://www.scoreaxis.com/widget/standings-widget/8?removeBorders=1&amp;widgetHomeAwayTabs=0&amp;font=2&amp;fontSize=14&amp;links=0&amp;inst=65dac" style="width:100%;border:none;transition:all 300ms ease"></iframe>
				<script>
					window.addEventListener("DOMContentLoaded",event=>{window.addEventListener("message",event=>{if(event.data.appHeight&&"65dac"==event.data.inst){let container=document.querySelector("#scoreaxis-widget-65dac iframe");container&&(container.style.height=parseInt(event.data.appHeight)+"px")}},!1)});
				</script>
			</div>
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