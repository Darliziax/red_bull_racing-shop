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
                    type: 'post',
                    data: {
                        id: id,
                        champ: champ,
                        valeur: nouveau
                    },
                    url: '../src/php/ajax/ajaxUpdateProduits.php',
                    success: function () {
                        console.log("modification OK");
                    },
                    error: function () {
                        console.log("erreur AJAX");
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
            type: 'get',
            data: {
                id_produit: id
            },
            url: '../src/php/ajax/ajaxDeleteProduit.php',

            success: function (data) {
                console.log("suppression OK", data);
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