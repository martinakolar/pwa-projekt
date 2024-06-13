<?php
session_start();

//redirectanje korisnika ukoliko nije admin 
if (!(isset($_SESSION['korisnicko_ime']) && isset($_SESSION['razina']) && $_SESSION['razina'] === 1)) {
    header('Location: ../index.php');
}
?>



<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Novi artikl</title>

    <script type="text/javascript">
        // Provjera forme prije slanja
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("slanje").onclick = function(event) {
                var slanjeForme = true;

                // Naslov vjesti (5-50 znakova)
                var poljeTitle = document.getElementById("title");
                var title = document.getElementById("title").value;
                if (title.length < 5 || title.length > 50) {
                    slanjeForme = false;
                    poljeTitle.style.border = "1px dashed red";
                    document.getElementById("porukaTitle").innerHTML = "Naslov članka mora imati između 5 i 50 znakova!<br>";
                } else {
                    poljeTitle.style.border = "1px solid green";
                    document.getElementById("porukaTitle").innerHTML = "";
                }

                // Kratki sadržaj (10-255 znakova)
                var poljeAbout = document.getElementById("about");
                var about = document.getElementById("about").value;
                if (about.length < 10 || about.length > 255) {
                    slanjeForme = false;
                    poljeAbout.style.border = "1px dashed red";
                    document.getElementById("porukaAbout").innerHTML = "Kratki sadržaj mora imati između 10 i 255 znakova!<br>";
                } else {
                    poljeAbout.style.border = "1px solid green";
                    document.getElementById("porukaAbout").innerHTML = "";
                }

                // Sadržaj mora biti unesen
                var poljeContent = document.getElementById("content");
                var content = document.getElementById("content").value;
                if (content.length == 0) {
                    slanjeForme = false;
                    poljeContent.style.border = "1px dashed red";
                    document.getElementById("porukaContent").innerHTML = "Sadržaj mora biti unesen!<br>";
                } else {
                    poljeContent.style.border = "1px solid green";
                    document.getElementById("porukaContent").innerHTML = "";
                }

                // Slika mora biti unesena
                var poljeSlika = document.getElementById("photo");
                var photo = document.getElementById("photo").value;
                if (photo.length == 0) {
                    slanjeForme = false;
                    poljeSlika.style.border = "1px dashed red";
                    document.getElementById("porukaSlika").innerHTML = "Slika mora biti unesena!<br>";
                } else {
                    poljeSlika.style.border = "1px solid green";
                    document.getElementById("porukaSlika").innerHTML = "";
                }

                // Kategorija mora biti odabrana
                var poljeCategory = document.getElementById("category");
                if (document.getElementById("category").selectedIndex == 0) {
                    slanjeForme = false;
                    poljeCategory.style.border = "1px dashed red";
                    document.getElementById("porukaKategorija").innerHTML = "Kategorija mora biti odabrana!<br>";
                } else {
                    poljeCategory.style.border = "1px solid green";
                    document.getElementById("porukaKategorija").innerHTML = "";
                }

                if (slanjeForme != true) {
                    event.preventDefault();
                }
            };
        });
    </script>
</head>

<body class="bg-black text-white">
    <?php include '../header.php'; ?>

    <main class="max-w-screen-lg mx-auto">
        <section class="w-1/2 mx-auto">
        <h1 class="text-2xl font-bold text-red-500">Unesite novi članak</h1>
        <form action="skripta.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-2">
            <!-- Naslov članka -->
            <span id="porukaTitle" class="error-message"></span>
            <div class="form-item ">
                <label for="title" class="">Naslov članka</label>
                <div class="form-field text-black">
                    <input type="text" id="title" name="title" class="form-field-textual w-full p-2" required>
                </div>
            </div>

            <!-- Kratki sažetak članka -->
            <span id="porukaAbout" class="error-message"></span>
            <div class="form-item">
                <label for="about">Kratki sadržaj članka (do 50 znakova)</label>
                <div class="form-field w-full">
                    <textarea id="about" name="about" cols="30" rows="3" class="form-field-textual w-full p-2 text-black" required></textarea>
                </div>
            </div>

            <!-- Sadržaj članka -->
            <span id="porukaContent" class="error-message"></span>
            <div class="form-item">
                <label for="content">Sadržaj članka</label>
                <div class="form-field">
                    <textarea id="content" name="content" cols="30" rows="10" class="form-field-textual w-full p-2 text-black" required></textarea>
                </div>
            </div>

            <!-- Kategorija članaka -->
            <span id="porukaKategorija" class="error-message"></span>
            <div class="form-item">
                <label for="category">Kategorija članka</label>
                <div class="form-field">
                    <select id="category" name="category" class="form-field-textual w-1/2 p-2 text-black" required>
                        <option value="" disabled selected>Odaberite kategoriju</option>
                        <option value="odjeca">Odjeća</option>
                        <option value="glazba">Glazba</option>
                    </select>
                </div>
            </div>

            <!-- Odabir slike -->
            <span id="porukaSlika" class="error-message"></span>
            <div class="form-item">
                <label for="photo">Slika</label>
                <div class="form-field">
                    <input type="file" id="photo" name="photo" accept="image/*" class="w-full" required>
                </div>
            </div>

            <!-- Prikaz na stranici -->
            <div class="form-item flex gap-2">
                <label for="archive">Prikazati na stranici:</label>
                <div class="form-field">
                    <input type="checkbox" id="archive" name="archive">
                </div>
            </div>

            <!-- Gumbi za slanje i poništavanje -->
            <div class="form-item flex gap-x-3">
                <button type="reset" class="form-button bg-white text-black p-2 hover:bg-black hover:border hover:border-white hover:text-white transition-all duration-500 ">Poništi</button>
                <button type="submit" id="slanje" class="form-button bg-white text-black p-2  hover:bg-black hover:border hover:border-white hover:text-white transition-all duration-500">Prihvati</button>
            </div>
        </form>
        </section>
        
    </main>

    <?php include "../footer.php" ?>
</body>

</html>