<?php

$conn = mysqli_connect("localhost", "root", "", "newsdb");
if ($conn-> connect_error) {
    die("Connection failed:". $conn-> connect_error);
}

$id = $_GET['id'];
$query = "DELETE FROM articles WHERE id = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location: news.php");
    exit();
} else {
    echo "Error deleting record";
}
?>