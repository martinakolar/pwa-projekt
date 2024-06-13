<?php
include '../connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // podaci iz forme
    $picture = $_FILES['photo']['name'];
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $archive = isset($_POST['archive']) ? 0 : 1;

    // slika
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($picture);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $validFileTypes = ['jpg', 'png', 'jpeg', 'gif'];

    if (!in_array($imageFileType, $validFileTypes)) {
        die('Invalid file type.');
    }

    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        die('Error uploading file.');
    }

    // postavljanje datuma
    $mysqldate = date('Y-m-d H:i:s');

    // sql injection
    $query = "INSERT INTO clanak (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbc->prepare($query);
    if ($stmt === false) {
        die('Error preparing the statement: ' . $dbc->error);
    }

    $stmt->bind_param('ssssssi', $mysqldate, $title, $about, $content, $picture, $category, $archive);

    if (!$stmt->execute()) {
        die('Error executing the query: ' . $stmt->error);
    }

    $stmt->close();
    $dbc->close();
} else {
    die('Form not submitted correctly.');
}
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Prikaz artikla</title>
</head>

<body class="bg-black text-white">
    <?php include '../header.php'; ?>

    <!-- Prikaz članka -->
    <main class="max-w-screen-md mx-auto flex flex-col gap-y-5">
        <h1 class="text-red-500 text-xl font-semibold">Prikaz članka</h1>
        <article class="flex flex-col gap-y-5">
            <p><strong>Kategorija:</strong> <?php echo htmlspecialchars($category); ?></p>
            <h2><strong><?php echo "Naslov: </strong>" . htmlspecialchars($title); ?></h2>
            <p><strong><?php echo "Objavljeno: </strong>" . htmlspecialchars($mysqldate); ?></p>
            <p><strong>Slika:</strong></p>
            <img src="<?php echo htmlspecialchars($target_file); ?>" alt="Slika članka" style="max-width: 300px;">
            <p><strong>Kratki sadržaj:</strong> <?php echo htmlspecialchars($about); ?></p>
            <p><strong>Sadržaj:</strong> <?php echo htmlspecialchars($content); ?></p>
            <p><strong>Prikazati na stranici:</strong> <?php echo $archive ? 'Ne' : 'Da'; ?></p>
        </article>
    </main>

    <?php include "../footer.php" ?>
</body>

</html>