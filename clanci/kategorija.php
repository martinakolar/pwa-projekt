<?php
session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Početna stranica</title>
</head>

<body>

    <!--ispis članka-->
    <?php
    include '../header.php';
    include '../connect.php';
    define('UPLPATH', '../forma/uploads/');
    ?>

    <!--kategorija-->
    <section class="odjeca">
        <?php
        $kategorija = mysqli_real_escape_string($dbc, $_GET['id']); // Sanitize input
        $query = "SELECT * FROM clanak WHERE kategorija='$kategorija' AND arhiva=0"; // Add condition for non-archived articles
        $result = mysqli_query($dbc, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo '<article>';
            echo '<div class="article">';
            echo '<div class="odjeca_img">';
            echo '<img src="' . UPLPATH . $row['slika'] . '">';
            echo '</div>';
            echo '<div class="media_body">';
            echo '<h4 class="title">';
            echo '<a href="clanak.php?id=' . $row['id'] . '">';
            echo $row['naslov'];
            echo '</a></h4>';
            echo '</div></div>';
            echo '</article>';
        }
        ?>
    </section>

    <?php include "../footer.php" ?>
</body>

</html>