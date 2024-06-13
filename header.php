<?php if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}  ?>

<header class="bg-black text-white flex flex-col w-full items-center mb-7">
    <img class="w-16 h-16 m-4" src="/PWA-projekt/slike/maca.ico" alt="logo" id="logo">
    <nav class="navbar main_nav" role="navigation">
        <ul class="main nav navbar-nav flex gap-x-6">
            <li><a href="/PWA-projekt/index.php" class="">Početna</a></li>

            <?php if (isset($_SESSION['korisnicko_ime']) && isset($_SESSION['razina']) && $_SESSION['razina'] === 1) {
                echo "<li><a href='/PWA-projekt/forma/unos.php' class=''>Novi članak</a></li>";
            } ?>

            <li><a href="/PWA-projekt/clanci/kategorija.php?id=odjeca" class="">Odjeća</a></li>

            <li><a href="/PWA-projekt/clanci/kategorija.php?id=glazba" class="">Glazba</a></li>

            <?php if (isset($_SESSION['korisnicko_ime']) && isset($_SESSION['razina']) && $_SESSION['razina'] === 1) {
                echo "<li><a href='/PWA-projekt/clanci/administracija.php' class=''>Administracija</a></li>";
            } ?>

            <li><a href="/PWA-projekt/forma/login.php" class="">Log in</a></li>
        </ul>
    </nav>
</header>
