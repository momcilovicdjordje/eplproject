<?php
session_start();
?>
<?php 

$conn = mysqli_connect("localhost", "root", "", "fixturesdb");
if ($conn-> connect_error) {
    die("Connection failed:". $conn-> connect_error);
}

if (isset($_POST['submit'])) {

    $homeClubLogo = addslashes(file_get_contents($_FILES["homeClubLogo"]["tmp_name"]));

    $homeClub = $_POST['homeClub'];

    $awayClubLogo = addslashes(file_get_contents($_FILES["awayClubLogo"]["tmp_name"]));

    $awayClub = $_POST['awayClub'];

    $fixtureDateTime = $_POST['fixtureDateTime'];

    $sql = "INSERT INTO fixtures (homeClubLogo, homeClub, awayClubLogo, awayClub, fixtureDateTime) VALUES ('$homeClubLogo','$homeClub','$awayClubLogo','$awayClub','$fixtureDateTime')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New fixture created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

  }

$conn->close();

?>

<!DOCTYPE html>

<html>

<body>

<h2>Include a new fixture</h2>

<p class="cancel-shared"><a href="../fixtures.php">Cancel</a></p>
<form action="" method="POST" enctype="multipart/form-data">

    <label>Home club logo</label>

    <input type="file" name="homeClubLogo">

    <br>

    <label>Home club</label>

    <input type="text" name="homeClub">

    <br>

    <label>Away club logo</label>

    <input type="file" name="awayClubLogo">

    <br>

    <label>Away club</label>

    <input type="text" name="awayClub">

    <br>

    <label>Fixture date and time</label>

    <input type="text" name="fixtureDateTime">

    <br>

    <input type="submit" name="submit" value="submit">

</form>

</body>

</html>