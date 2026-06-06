<?php
require_once '../utils/all_includes.php';

if (!isset($_SESSION['admin'])) {
    $_SESSION['page'] = './content/login.php';
} else {
    if (!isset($_SESSION['page_admin'])) {
        $_SESSION['page_admin'] = './content/accueil.php';
    }

    if (isset($_GET['page'])) {
        $_SESSION['page_admin'] = './content/' . basename($_GET['page']);
    }

    if (!file_exists($_SESSION['page_admin'])) {
        $_SESSION['page_admin'] = './content/page_404.php';
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - Red Bull Racing Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>

<?php
include '../utils/header.php';

if (isset($_SESSION['admin'])) {
    include '../utils/admin_menu.php';

    echo '<main>';
    include $_SESSION['page_admin'];
    echo '</main>';
} else {
    echo '<main>';
    include './content/login.php';
    echo '</main>';
}

include '../utils/footer.php';
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="../assets/js/fonctions.js"></script>
</body>
</html>