

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administracija</title>
</head>

<?php session_start();
include '../header.php'; 

echo "<div class='flex justify-center'>";
//redirectanje korisnika ukoliko nije admin 
if (isset($_SESSION['korisnicko_ime']) && isset($_SESSION['razina']) && $_SESSION['razina'] === 1) {
    echo "Dobrodošli, admin!";
} else {
    header('Location: ../forma/login.php');
}
?>
</div>

<body class="bg-black text-white mx-auto w-fit">

    <?php
    include '../connect.php';
    define('UPLPATH', '../forma/uploads/');

    $query = "SELECT * FROM clanak";
    $result = mysqli_query($dbc, $query);
    while ($row = mysqli_fetch_array($result)) { ?>

        <form enctype="multipart/form-data" action="" method="POST" class="mb-52 flex flex-col gap-y-3">

            <div class="form-item">
                <label for="title">Naslov članka:</label>
                <div class="form-field">
                    <input type="text" name="title" class="text-black p-2 w-full" value="<?= $row['naslov'] ?>" required>
                </div>
            </div>

            <div class="form-item">
                <label for="about">Kratki sadržaj članka:</label>
                <div class="form-field">
                    <textarea name="about" id="" cols="30" rows="10" class="text-black p-2 w-full" required> <?= $row['sazetak'] ?></textarea>
                </div>
            </div>

            <div class="form-item">
                <label for="content">Sadržaj članka:</label>
                <div class="form-field">
                    <textarea name="content" id="" cols="30" rows="10" class="text-black p-2 w-full" required> <?= $row['tekst'] ?> </textarea>
                </div>
            </div>

            <div class="form-item">
                <label for="photo">Slika:</label>
                <div class="form-field">
                    <input type="file" class="text-black p-2 w-full" id="photo" value="<?= $row['slika'] ?>" name="photo" required />
                    <br>
                    <img src="<?= UPLPATH . $row['slika'] ?> " width="100px">
                    <!-- pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike -->
                </div>
            </div>

            <div class="form-item">
                <label for="category">Kategorija članka:</label>
                <div class="form-field">
                    <select name="category" id="" class="text-black p-2 w-full" value="<?= $row['kategorija'] ?> required">
                        <option value="odjeca">Odjeća</option>
                        <option value="glazba">Glazba</option>
                    </select>
                </div>
            </div>

            <div class="form-item">
                <label>Spremiti u arhivu:
                    <div class="form-field">

                        <!--zatvaranje phpa-->
                        <?php
                        if ($row['arhiva'] == 0) {
                            echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                        } else {
                            echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                        }
                        ?>
                    </div>
                </label>
            </div>

            <div class="form-item flex gap-x-3">
                <input type="hidden" name="id" class="form-field-textual" value=" <?= $row['id'] ?>">

                <button type="reset" value="Poništi" class="form-button bg-white text-black p-2 hover:bg-black hover:border hover:border-white hover:text-white transition-all duration-500 ">Poništi</button>
                <button type="submit" name="update" value="Prihvati" class="form-button bg-white text-black p-2 hover:bg-black hover:border hover:border-white hover:text-white transition-all duration-500 ">Izmjeni</button>
                <button type="submit" name="delete" value="Izbriši" class="form-button bg-white text-black p-2 hover:bg-black hover:border hover:border-white hover:text-white transition-all duration-500 ">Izbriši</button>
            </div>
        </form>
    <?php
    }

    //AKO JE STISNUT GUMB IZBRIŠI:
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM clanak WHERE id=$id";
        $result = mysqli_query($dbc, $query);
    }

    //AKO JE STISNUT GUMB IZMJENI
    if (isset($_POST['update'])) {
        $picture = $_FILES['photo']['name'];
        $title = $_POST['title'];
        $about = $_POST['about'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $archive = isset($_POST['archive']) ? 1 : 0;

        $target_dir = '../forma/uploads/' . $picture;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);

        $id = $_POST['id'];
        $query = "UPDATE clanak SET naslov=?, sazetak=?, tekst=?, slika=?, kategorija=?, arhiva=? WHERE id=$id";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'sssssd', $title, $about, $content, $picture, $category, $archive);
            if (mysqli_stmt_execute($stmt)) {
                echo "Članak je uspješno ažuriran!";
            } else {
                echo "Izbio je problem kod ažuriranja članka. Molim vas pokušajte ponovno.";
            }
        }
    }
    ?>

    <?php include "../footer.php" ?>
</body>

</html>