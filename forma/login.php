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

<body class="bg-black text-white">

<div class="flex justify-center w-full mb-3">
    <?php
    include '../connect.php'; // Uključivanje skripte za povezivanje s bazom podataka

    if (isset($_SESSION['korisnicko_ime'])) {
        $korisnicko_ime = $_SESSION['korisnicko_ime'];
        if ($_SESSION['razina'] == 1) {
            echo "Dobrodošli $korisnicko_ime, imate administratorska prava.";
        } else {
            echo "Dobrodošli $korisnicko_ime, nemate administratorska prava.";
        }
    }
    echo "</div>";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $lozinka = $_POST['password'];

        $sql = "SELECT id, lozinka, razina_dozvole FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashed_lozinka = $row["lozinka"];
                $razina = $row["razina_dozvole"];
                if (password_verify($lozinka, $hashed_lozinka)) {
                    $_SESSION['korisnicko_ime'] = $korisnicko_ime;
                    $_SESSION['razina'] = $razina;

                    if ($razina == 1) {
                        header('Location: ../clanci/administracija.php');
                    }
                } else {
                    echo 'Pogrešna lozinka!';
                }
            } else {
                echo 'Neispravno korisničko ime!';
            }
        }

        mysqli_close($dbc);
    }
    ?>



    <main class="max-w-screen-lg mx-auto mb-72">
        <section class="w-fit mx-auto">
            <h1 class="text-2xl font-bold text-red-500">Log in</h1>
            <form action="" method="POST" class="flex flex-col gap-y-3 mx-auto">

                <div class="form-item">
                    <label for="korisnicko_ime">Korisničko ime</label>
                    <div class="form-field">
                        <input type="text" id="korisnicko_ime" name="korisnicko_ime" class="form-field-textual" required>
                    </div>
                </div>

                <div class="form-item">
                    <label for="password">Lozinka</label>
                    <div class="form-field">
                        <input type="password" id="password" name="password" class="form-field-textual" required>
                    </div>
                </div>



                <!-- Gumb za slanje -->
                <div class="flex gap-x-3 mt-2">
                    <button type="submit" id="slanje" class="form-button bg-white text-black p-2 hover:bg-black hover:border hover:border-white hover:text-white transition-all duration-500 ">Prijavi se</button>
                    <a href="registracija.php" class="form-button bg-white text-black p-2 hover:bg-black hover:border hover:border-white hover:text-white transition-all duration-500 ">Registriraj se</a>
                </div>
            </form>
            
        </section>
    </main>

    <?php include "../footer.php" ?>
</body>

</html>