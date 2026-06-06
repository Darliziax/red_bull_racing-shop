<?php
require_once './utils/all_includes.php';

if (isset($_GET['page'])) {
    $page = './content/' . basename($_GET['page']);

    if (file_exists($page)) {
        $_SESSION['page'] = $page;
    } else {
        $_SESSION['page'] = './content/page_404.php';
    }
} else {
    $_SESSION['page'] = './content/accueil.php';
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Red Bull Racing Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
</head>
<body>

<?php
include './utils/header.php';
include './utils/public_menu.php';
echo '<main>';
include $_SESSION['page'];
echo '</main>';
include './utils/footer.php';
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="./assets/js/fonctions.js"></script>
</body>
</html>