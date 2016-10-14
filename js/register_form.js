 //ajax cadastra clientes
jQuery(document).ready(function () {
    jQuery('#cadastroCliente').submit(function () {
        $("#load").html("<img src='images/load.gif'>");
        $("#load").fadeIn(100, function () {
            window.setTimeout(function () {
                $('#load').fadeOut();
            }, 1400);
        });
        var dados = jQuery(this).serialize();

        jQuery.ajax({
            type: "POST",
            url: "controller/clienteDAO.php",
            data: dados,
            success: function (data) {
                $("#msgsucesso").fadeIn(1500, function () {
                    window.setTimeout(function () {
                        $('#msgsucesso').fadeOut();
                    }, 3999);
                });
                setTimeout(function () {
                    location.reload();
                }, 4000);
            }
        });
        return false;
    });
});