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

<?php
include '../header.php';
?>

<body class="bg-black text-white mx-auto">
    <?php
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
        <main class="max-w-screen-md mx-auto flex flex-col gap-y-4">
            <div class="row">
                <h2 class="text-sm uppercase text-red-500 font-bold">
                    <?php echo "<span>" . $row['kategorija'] . "</span>"; ?>
                </h2>
                <h1 class="text-3xl uppercase">
                    <?php echo $row['naslov']; ?>
                </h1>
                <p class="text-sm text-gray-300">OBJAVLJENO: <?php echo "<span>" . $row['datum'] . "</span>"; ?></p>
            </div>
            <section class="slika">
                <?php echo '<img class="w-full object-cover max-h-96" src="' . UPLPATH . $row['slika'] . '">'; ?>
            </section>
            <section class="about">
                <p><?php echo "<i>" . $row['sazetak'] . "</i>"; ?></p>
            </section>
            <section class="sadrzaj">
                <p><?php echo $row['tekst']; ?></p>
            </section>
        </main>

    <?php
    } else {
        echo "<p>Članak nije pronađen.</p>";
    }
    ?>

    <?php include "../footer.php" ?>
</body>

</html>