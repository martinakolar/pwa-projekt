<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<?php include '../header.php'; ?>

<body class="bg-black text-white ">


    <!--PHP DIO-->
    <?php
    include '../connect.php'; // Uključivanje skripte za povezivanje s bazom podataka

    // Provjera je li forma poslana
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $lozinka = $_POST['password'];
        $lozinka_rep = $_POST['password1'];

        // Provjera podudaranja lozinki
        if ($lozinka === $lozinka_rep) {
            $hashed_password = password_hash($lozinka, PASSWORD_BCRYPT);

            // Provjera postoji li korisnik s istim korisničkim imenom
            $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }

            echo "<div class='flex justify-center'>";
            if (mysqli_stmt_num_rows($stmt) > 0) {
                echo 'Korisničko ime već postoji!';
            } else {
                // Unos korisnika u bazu
                $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 'ssss', $ime, $prezime, $korisnicko_ime, $hashed_password);
                    mysqli_stmt_execute($stmt);
                    echo 'Korisnik je uspješno registriran!';
                }
            }
        } else {
            echo 'Lozinke se ne podudaraju!';
        }
        echo "</div>";

        mysqli_close($dbc);
    }
    ?>


    <main class="w-fit mx-auto flex flex-col mb-32">
        <h1 class="text-2xl font-bold text-red-500">Registracija</h1>
        <form action="registracija.php" method="POST" class="flex flex-col gap-y-3">

            <div class="form-item">
                <label for="ime">Ime</label>
                <div class="form-field">
                    <input type="text" id="ime" name="ime" class="text-black p-2" required>
                </div>
            </div>

            <div class="form-item">
                <label for="prezime">Prezime</label>
                <div class="form-field">
                    <input type="text" id="prezime" name="prezime" class="text-black p-2" required>
                </div>
            </div>

            <div class="form-item">
                <label for="korisnicko_ime">Korisničko ime</label>
                <div class="form-field">
                    <input type="text" id="korisnicko_ime" name="korisnicko_ime" class="text-black p-2" required>
                </div>
            </div>

            <div class="form-item">
                <label for="password">Lozinka</label>
                <div class="form-field">
                    <input type="password" id="password" name="password" class="text-black p-2" required>
                </div>
            </div>

            <div class="form-item">
                <label for="password1">Ponovite lozinku</label>
                <div class="form-field">
                    <input type="password" id="password1" name="password1" class="text-black p-2" required>
                </div>
            </div>

            <!-- Gumb za slanje -->
            <div class="flex gap-x-3 mt-2">
                <button type="submit" id="slanje" class="form-button bg-white text-black p-2 hover:bg-black hover:border hover:border-white hover:text-white transition-all duration-500 ">Registriraj se</button>
                <a href="login.php" class="form-button bg-white text-black p-2 hover:bg-black hover:border hover:border-white hover:text-white transition-all duration-500 ">Prijavi se</a>

            </div>
        </form>
    </main>

    <?php include "../footer.php" ?>
</body>

</html>