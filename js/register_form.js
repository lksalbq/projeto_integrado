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


//Ajax deleta funcionario
jQuery(document).ready(function () {
    $(document).on('click', '.delete-btn', function () {
        if (confirm('Tem certeza que deseja deletar?')) {
            var id = $(this).closest('td').find('.idCliente').text();
            alert(id);
            $.ajax({
                type: 'POST',
                url: 'controller/deleteCliente.php',
                data: 'id=' + id,
                success: function (data) {
                    
                    alert(data);
                    $("#msgsucessodelete").fadeIn(150, function () {
                        window.setTimeout(function () {
                            $('#msgsucessodelete').fadeOut();
                        }, 3999);
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 4000);
                }
            });
        }
    });
});