<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'fixturesdb');

$query = " SELECT * FROM `fixtures` ";
$query_run = mysqli_query($connection,$query);

while($row = mysqli_fetch_array($query_run)) {

    ?>

    <tr>
        <td> <?php echo '<img src="data:image;base64,'.base64_encode($row['homeClubLogo']).'" class="fixtures-club-logo">'; ?> </td>
        <td> <?php echo $row['homeClub']; ?> </td>
        <td> <?php echo '<img src="data:image;base64,'.base64_encode($row['awayClubLogo']).'" class="fixtures-club-logo">'; ?> </td>
        <td> <?php echo $row['awayClub']; ?> </td>
        <td> <?php echo $row['fixtureDateTime']; ?> </td>
        <?php
        if($_SESSION['userLevel'] == TRUE) {
        ?>
        <td> <?php echo "<a href=\"deleteFixture.php?fixtureID={$row['fixtureID']}\" onClick=\"return confirm('Are you sure you want to delete?')\"><button  type='button' class='button'value=''>Delete</button></a>" ?> </td>
        <?php
        }
        ?>
    </tr>

    <?php

}

?>