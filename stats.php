<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Premier League</title>
<meta charset="utf8">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script src="./js/srchRes.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
		<main class="apiFootballData">
        	<h1>Stats</h1>
            <?php
                $uri = 'http://api.football-data.org/v4/competitions/PL/scorers';
                $reqPrefs['http']['method'] = 'GET';
                $reqPrefs['http']['header'] = 'X-Auth-Token: 35415363b05d4a4ba64b2ca84470cdd4';
                $stream_context = stream_context_create($reqPrefs);
                $response = file_get_contents($uri, true, $stream_context);
                $scorers = json_decode($response);

                $nameArr[] = $name = $scorers->scorers[0]->player->name;
                array_push($nameArr, $name = $scorers->scorers[1]->player->name, $name = $scorers->scorers[2]->player->name, $name = $scorers->scorers[3]->player->name, $name = $scorers->scorers[4]->player->name);
                $barLabels = implode('", "', $nameArr);

                $goalsArr[] = $goals = $scorers->scorers[0]->goals;
                array_push($goalsArr, $goals = $scorers->scorers[1]->goals, $goals = $scorers->scorers[2]->goals, $goals = $scorers->scorers[3]->goals, $goals = $scorers->scorers[4]->goals);
                $barDatasetsData = implode('", "', $goalsArr);
                
                echo '<table>';
                echo '<tr>';
                echo '<th>Player</th>';
                echo '<th>Club</th>';
                echo '<th>Goals</th>'; 
                echo '<th>Assists</th>';
                echo '<th>Penalties</th>';
                echo '</tr>';
                for ($i=0; $i < 10; $i++) {
                    ?>
                    <tr>
                        <td> <?php echo $name = $scorers->scorers[$i]->player->name; ?> </td>
                        <td> <?php echo $team = $scorers->scorers[$i]->team->name; ?> </td>
                        <td> <?php echo $goals = $scorers->scorers[$i]->goals; ?> </td>
                        <td> <?php echo $assists = $scorers->scorers[$i]->assists; ?> </td>
                        <td> <?php echo $penalties = $scorers->scorers[$i]->penalties; ?> </td>
                    </tr>
                    <?php
                }
                echo "</table>";
            ?>

            <canvas id="statsBar" ></canvas>

            <script>
                var canvasElement = document.getElementById("statsBar");
                var config = {
                    type: "bar",
                    data: {
                        labels: ["<?= $barLabels ?>"],
                        datasets: [{label: "Goals", data: ["<?= $barDatasetsData ?>"], backgroundColor: ["rgba(0, 0, 255, 1)", "rgba(0, 255, 255, 1)", "rgba(0, 0, 255, 1)", "rgba(0, 255, 255, 1)", "rgba(0, 0, 255, 1)"]}]
                    }
                }

                var statsBar = new Chart(canvasElement, config)
            </script>

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