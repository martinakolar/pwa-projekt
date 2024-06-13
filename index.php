<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <title>Početna stranica</title>
</head>

<body class="bg-black text-white">
    <?php include 'header.php'; ?>
    <div class="flex justify-center w-full">

        <?php
        if (isset($_SESSION['korisnicko_ime']) && isset($_SESSION['razina']) && $_SESSION['razina'] === 1) {
            $korisnicko_ime = $_SESSION['korisnicko_ime'];
            echo "Dobrodošli, $korisnicko_ime!";
        }

        include 'connect.php';
        define('UPLPATH', 'forma/uploads/');
        ?> </div>
    <main class="max-w-screen-lg mx-auto">

        <!--odjeca-->
        <h2 class="text-2xl font-bold uppercase mb-3 ml-3 text-red-500">Odjeća</h2>
        <section class="flex gap-6">
            <?php
            $query = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='odjeca' ORDER BY datum DESC LIMIT 4";
            $result = mysqli_query($dbc, $query);
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                echo '<article class="basis-auto w-1/4 border border-white p-3">';
                echo '<div class="w-auto">';
                echo '<div class="object-cover h-32">';
                echo '<img class="w-full h-full object-cover" src="' . UPLPATH . $row['slika'] . '">';
                echo '</div>';
                echo '<div class="text-left">';
                echo '<h4 class="w-fit">';
                echo '<a class="w-full block p-0 text-xs text-red-500 uppercase font-semibold py-3 px-1"   href="clanci/clanak.php?id=' . $row['id'] . '">';
                echo $row['naslov'];
                echo '</a></h4>';
                echo '<p class="about">';
                echo '<a class="w-full block p-0 text-base px-1 mb-2" href="clanci/clanak.php?id=' . $row['id'] . '">';
                echo $row['sazetak'];
                echo '</a></p>';
                echo '</div></div>';
                echo '</article>';
            } ?>
        </section>

        <!--glazba-->
        <h2 class="text-2xl font-bold uppercase mb-3 ml-3 text-red-500 mt-3">Glazba</h2>
        <section class="flex gap-6 mb-8">
            <?php
            $query = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='glazba' LIMIT 4";
            $result = mysqli_query($dbc, $query);
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                echo '<article class="basis-auto w-1/4 border border-white p-3">';
                echo '<div>';
                echo '<div class="object-cover h-32">';
                echo '<img class="w-full h-full object-cover" src="' . UPLPATH . $row['slika'] . '">';
                echo '</div>';
                echo '<div class="text-left">';
                echo '<h4 class="w-fit">';
                echo '<a class="w-full block p-0 text-xs text-red-500 uppercase font-semibold py-3 px-1"   href="clanci/clanak.php?id=' . $row['id'] . '">';
                echo $row['naslov'];
                echo '</a></h4>';
                echo '<p class="about">';
                echo '<a class="w-full block p-0 text-base px-1 mb-2" href="clanci/clanak.php?id=' . $row['id'] . '">';
                echo $row['sazetak'];
                echo '</a></p>';
                echo '</div></div>';
                echo '</article>';
            } ?>
        </section>

    </main>



    <?php include "footer.php" ?>
</body>

</html>