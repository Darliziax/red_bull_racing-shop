<h2>Connexion administration</h2>

<form method="post" action="">
    <label for="login">Login</label>
    <input type="text" name="login" id="login" required>

    <br><br>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required>

    <br><br>

    <input type="submit" name="submit_login" value="Se connecter">
</form>

<?php
if (isset($_POST['submit_login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $adminDAO = new AdminDAO($cnx);
    $admin = $adminDAO->getAdmin($login, $password);

    if ($admin != null) {
        $_SESSION['admin'] = $admin->getNomAdmin();
        $_SESSION['statut'] = $admin->getStatut();

        header('Location: index_.php');
        exit;
    } else {
        echo "<p>Login ou mot de passe incorrect.</p>";
    }
}
?>