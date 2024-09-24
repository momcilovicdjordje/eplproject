<?php
session_start();

if (!isset($_SESSION['userLevel'])) {
    $_SESSION['userLevel'] = null;
    
    error_reporting(0);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Premier League</title>
<meta charset="utf8">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script src="./js/srchRes.js"></script>
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
        <div class="navsearch">
			<form name="f1" action="" onSubmit="if(this.t1.value!=null && this.t1.value!='') findString(this.t1.value);return false">
    			<input type="text" name=t1 value="" placeholder="Find on page">
    			<input type="submit" name=b1 value="Search">
			</form>
		</div>
	</nav>
	<content>
		<main>
        	<h1>News</h1>
			<article>
				<?php
				if($_SESSION['userLevel'] == TRUE) {
				?>
				<a href="./includes/createNews.php">Include a new article</a>
				<?php
				}
				?>
				<table class="newsTable">
					<tr>
						<th>News title</th>
						<th>Short description</th>
						<th>News author</th>
						<th>Published on</th>
						<?php
						if($_SESSION['userLevel'] == TRUE) {
						?>
						<th>Action</th>
						<?php
						}
						?>
					</tr>
					<?php include './includes/newsTable.php';?>
				</table>
			</article>
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