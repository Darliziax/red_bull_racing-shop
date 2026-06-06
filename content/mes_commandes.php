<?php
if (!isset($_SESSION['client'])) {
    header('Location: index_.php?page=login_client.php');
    exit;
}

$commandeDAO = new CommandeDAO($cnx);
$commandes = $commandeDAO->getCommandesClient($_SESSION['client']);
?>

<div class="container">
    <h2>Mes commandes</h2>

    <?php if (empty($commandes)) { ?>

        <p>Vous n'avez pas encore passé de commande.</p>

    <?php } else { ?>

        <table class="table table-striped">
            <tr>
                <th>N° commande</th>
                <th>Date</th>
                <th>Montant total</th>
                <th>Statut</th>
            </tr>

            <?php foreach ($commandes as $commande) { ?>
                <tr>
                    <td><?= $commande->id_commande; ?></td>
                    <td><?= $commande->date_commande; ?></td>
                    <td><?= $commande->montant_total; ?> €</td>
                    <td><?= $commande->statut; ?></td>
                </tr>
            <?php } ?>
        </table>

    <?php } ?>
</div>