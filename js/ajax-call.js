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

//Ajax edita
jQuery(document).ready(function () {
    $(document).on('click', '.edit-btn', function () {
        var id = $(this).closest('td').find('.idCliente').text();
        $('#page-edita').fadeOut(0, function () {
            $('#page-edita').load('view/view_updateCliente.php?id=' + id, function () {
                $('#page-edita').fadeIn(0);
            });
        });
    });
});

// ajax update
jQuery(document).ready(function () {
    $(document).on('submit', '#updateCliente', function () {
        var update = jQuery(this).serialize();
        jQuery.ajax({
            type: "POST",
            url: "controller/updateCliente.php",
            data: update,
            success: function (data) {
                alert(data);
                $('#updateCliente').hide();
                $("#msgsucessoupdate").fadeIn(150, function () {
                    window.setTimeout(function () {
                        $('#msgsucessoupdate').fadeOut();
                    }, 3999);
                });
                setTimeout(function () {
                    location.reload();
                }, 3000);
            }
        });
        return false;
    });
});
