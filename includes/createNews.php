<?php
session_start();
?>
<?php 

$conn = mysqli_connect("localhost", "root", "", "newsdb");
if ($conn-> connect_error) {
    die("Connection failed:". $conn-> connect_error);
}

  if (isset($_POST['submit'])) {

    $NewsTitle = $_POST['NewsTitle'];

    $NewsShortDesc = $_POST['NewsShortDesc'];

    $NewsAuthor = $_POST['NewsAuthor'];

    $NewsPublishedOn = $_POST['NewsPublishedOn'];

    $query = "INSERT INTO articles (NewsTitle, NewsShortDesc, NewsAuthor, NewsPublishedOn) VALUES ('$NewsTitle','$NewsShortDesc','$NewsAuthor','$NewsPublishedOn')";
    $query_run = mysqli_query($conn,$query);

    if ($query_run) {

      echo "New article created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    }

  }

$conn->close();

?>

<!DOCTYPE html>

<html>

<body>

<h2>Include a new article</h2>

<p class="cancel-shared"><a href="../news.php">Cancel</a></p>
<form action="" method="POST" enctype="multipart/form-data">

    <label>News title</label>

    <input type="text" name="NewsTitle">

    <br>

    <label>Short description</label>

    <input type="text" name="NewsShortDesc">

    <br>

    <label>News author</label>

    <input type="text" name="NewsAuthor">

    <br>

    <label>Published on</label>

    <input type="text" name="NewsPublishedOn">

    <br>

    <input type="submit" name="submit" value="submit">

</form>

</body>

</html>