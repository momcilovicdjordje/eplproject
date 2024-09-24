<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "logindb";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

session_start();

error_reporting(0);

if (isset($_POST['submit'])) {
    $sql = "SELECT userLevel FROM users";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['userLevel'] = $row['userLevel'];
    }
}

?>