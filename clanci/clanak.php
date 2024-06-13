<?php
session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Članak</title>
</head>

<body>

    <?php
    include '../header.php';
    include '../connect.php';
    define('UPLPATH', '../forma/uploads/');

    // dohvaćanje podataka o članku
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $query = "SELECT * FROM clanak WHERE id=$id";
    $result = mysqli_query($dbc, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
    ?>

        <!-- prikaz sadržaja članka -->
        <section role="main">
            <div class="row">
                <h2 class="category">
                    <?php echo "<span>" . $row['kategorija'] . "</span>"; ?>
                </h2>
                <h1 class="title">
                    <?php echo $row['naslov']; ?>
                </h1>
                <p>AUTOR:</p>
                <p>OBJAVLJENO: <?php echo "<span>" . $row['datum'] . "</span>"; ?></p>
            </div>
            <section class="slika">
                <?php echo '<img src="' . UPLPATH . $row['slika'] . '">'; ?>
            </section>
            <section class="about">
                <p><?php echo "<i>" . $row['sazetak'] . "</i>"; ?></p>
            </section>
            <section class="sadrzaj">
                <p><?php echo $row['tekst']; ?></p>
            </section>
        </section>

    <?php
    } else {
        echo "<p>Članak nije pronađen.</p>";
    }
    ?>

    <?php include "../footer.php" ?>
</body>

</html>