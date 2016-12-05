$(document).ready(function () {
//Ajax login

    $('#loginform').submit(function () {
        var dados = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "controllers/logar.php",
            data: dados,
            success: function (result) {
                alert(result);
                if (result == 1) {
                    location.href = 'home.php';
                } else {
                    $("#msgerro").fadeIn(1500, function () {
                        window.setTimeout(function () {
                            $('#msgerro').fadeOut();
                        }, 10000);
                    });
                }
            }
        });
        return false;
    });
    
   


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
                alert(dados);
                $.ajax({
                type: "POST",
                url: "/projeto_integrado/controllers/clienteDAO.php",
                data: dados,
                success: function (data) {
                    alert(data);
                    
                    
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

    //ajax cadastra produto
    jQuery(document).ready(function () {
        jQuery('#cadastroProdutos').submit(function () {
            $("#load").html("<img src='images/load.gif'>");
            $("#load").fadeIn(100, function () {
                window.setTimeout(function () {
                    $('#load').fadeOut();
                }, 1400);
            });
            var dados = jQuery(this).serialize();
                alert(dados);
                $.ajax({
                type: "POST",
                url: "/projeto_integrado/controllers/produtoDAO.php",
                data: dados,
                success: function (data) {
                    alert(data);
                    
                    
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
                var id = $(this).closest('td').find('#idclientes').text();
                alert(id);
                $.ajax({
                    type: 'POST',
                    url: '/projeto_integrado/controllers/deleteCliente.php',
                    data: 'idclientes=' + id,
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
                $('#page-edita').load('views/view_updateCliente.php?id=' + id, function () {
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
                url: "controllers/updateCliente.php",
                data: update,
                success: function (data) {
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



    //Datepicker js

    $.fn.datepicker.noConflict = function () {
        $.fn.datepicker = old;
        return this;
    };

    $("#dataInicio").datepicker({
        todayBtn: 1,
        autoclose: true,
        clearBtn: true,
        language: "pt-BR",
        todayHighlight: true
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#dataFim').datepicker('setStartDate', minDate);
    });

    $("#dataFim").datepicker({
        clearBtn: true,
        language: "pt-BR",
        todayHighlight: true,
        autoclose: true}).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#dataInicio').datepicker('setEndDate', minDate);
    });
});

