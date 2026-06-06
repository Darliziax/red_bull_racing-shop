$(document).ready(function () {

    console.log("fonctions.js chargé");

    $('td[contenteditable="true"]').click(function () {

        let ancien = $.trim($(this).text());
        let id = $(this).attr('id');
        let champ = $(this).data('champ');

        $(this).blur(function () {

            let nouveau = $.trim($(this).text());

            if (nouveau !== ancien) {

                $.ajax({
                    type: 'POST',
                    url: '/red_bull_racing_shop/admin/src/php/ajax/ajaxUpdateProduits.php',
                    data: {
                        id: id,
                        champ: champ,
                        valeur: nouveau
                    },
                    success: function () {
                        console.log("modification OK");
                    },
                    error: function (xhr) {
                        console.log("erreur modification");
                        console.log(xhr.responseText);
                    }
                });

            }

        });

    });

    $('#ajout_nouveau').hide();

    $('#inserer').click(function () {
        $('#ajout_nouveau').show();
    });

    $('.delete').click(function () {

        let id = $(this).data('id');
        let ligne = $(this).closest('tr');

        if (confirm("Voulez-vous supprimer ce produit ?")) {

            $.ajax({
                type: 'GET',
               url: '/red_bull_racing_shop/admin/src/php/ajax/ajaxDeleteProduit.php',
                data: {
                    id_produit: id
                },
                success: function (data) {
                    console.log("suppression OK");
                    console.log(data);
                    ligne.fadeOut('slow');
                },
                error: function (xhr) {
                    console.log("erreur suppression");
                    console.log(xhr.responseText);
                }
            });

        }

    });

});