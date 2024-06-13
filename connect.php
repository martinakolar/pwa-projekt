<?php
header('Content-Type: text/html; charset=utf-8');

// konfiguracija
$servername = "localhost";
$username = "root";
$password = "";
$basename = "projekt";

// kreiranje konekcije
$dbc = new mysqli($servername, $username, $password, $basename);

// provjera konekcije
if ($dbc->connect_error) {
    die('Connection failed: ' . htmlspecialchars($dbc->connect_error));
}

// postavljanje utf charseta
if (!$dbc->set_charset("utf8")) {
    die('Error loading character set utf8: ' . htmlspecialchars($dbc->error));
}
