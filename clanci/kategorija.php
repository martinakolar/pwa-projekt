<?php
session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Početna stranica</title>
</head>

<body class="bg-black text-white mx-auto max-w-screen-md ">

    <!--ispis članka-->
    <?php
    include '../header.php';
    include '../connect.php';
    define('UPLPATH', '../forma/uploads/');
    ?>

    <!--kategorija-->
    <section class="flex flex-col gap-y-10 text-lg font-medium">
        <?php
        $kategorija = mysqli_real_escape_string($dbc, $_GET['id']); // Sanitize input
        $query = "SELECT * FROM clanak WHERE kategorija='$kategorija' AND arhiva=0"; // Add condition for non-archived articles
        $result = mysqli_query($dbc, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo '<article>';
            echo '<div>';
            echo '<div class="media_body">';
            echo '<h4 class="title">';
            echo '<a href="clanak.php?id=' . $row['id'] . '">';
            echo $row['naslov'];
            echo '</h4>';
            echo '<div>';
            echo '<img class="w-full max-h-96 object-cover" src="' . UPLPATH . $row['slika'] . '">';
            echo '</div>';
            echo '</div></div> </a>';
            echo '</article>';
        }
        ?>
    </section>

    <?php include "../footer.php" ?>
</body>

</html>