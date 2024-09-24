<style>
    <?php include '../css/style.css'?>
</style>

<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'newsdb');

$query = " SELECT * FROM `articles` ";
$query_run = mysqli_query($connection,$query);

while($row = mysqli_fetch_array($query_run)) {

    ?>

    <tr>
        <td> <?php echo $row['NewsTitle']; ?> </td>
        <td> <?php echo $row['NewsShortDesc']; ?> </td>
        <td> <?php echo $row['NewsAuthor']; ?> </td>
        <td> <?php echo $row['NewsPublishedOn']; ?> </td>
        <?php
        if($_SESSION['userLevel'] == TRUE) {
        ?>
        <td> <?php echo "<a href=\"deleteNews.php?id={$row['id']}\" onClick=\"return confirm('Are you sure you want to delete?')\"><button  type='button' class='button'value=''>Delete</button></a>" ?> </td>
        <?php
        }
        ?>
    </tr>

    <?php

}

?>