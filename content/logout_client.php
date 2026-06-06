<?php
unset($_SESSION['client']);
unset($_SESSION['nom_client']);
unset($_SESSION['prenom_client']);

header('Location: index_.php?page=accueil.php');
exit;