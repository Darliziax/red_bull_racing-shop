<?php

require_once __DIR__ . '/admin/src/php/utils/all_includes.php';

if (!isset($_GET['page'])) {
    $_SESSION['page'] = './content/accueil.php';
}

if (isset($_GET['page'])) {
    $_SESSION['page'] = './content/' . basename($_GET['page']);
}

if (!file_exists($_SESSION['page'])) {
    $_SESSION['page'] = './content/page_404.php';
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Red Bull Racing Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./admin/assets/css/style.css">
    <link rel="stylesheet" href="./admin/assets/css/custom.css">
</head>
<body>

<?php

include __DIR__ . '/admin/src/php/utils/header.php';
include __DIR__ . '/admin/src/php/utils/public_menu.php';

echo '<main>';
include $_SESSION['page'];
echo '</main>';

include __DIR__ . '/admin/src/php/utils/footer.php';

?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="./admin/assets/js/fonctions.js"></script>

</body>
</html>