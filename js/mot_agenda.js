$(document).ready(function() {
    fncCarregaAgendamentos();

    $('#login').submit(function(e) {
        e.preventDefault();
        fnclogar();

        return (false);
    });

    $('#cadastro_carro').submit(function(e) {
        e.preventDefault();
        fnccadastroc();

        return (false);
    });


    $('#cadastro').submit(function(e) {
        e.preventDefault();
        fncRecebeCadastro();

        return (false);
    });
    $('#cadastro_emp').submit(function(e) {
        e.preventDefault();
        fncRecebeCadastroe();

        return (false);
    });

});


function fncCarregaAgendamentos() {


    var dataform = $('#formData').val();


    $('#divAgendamentos').html('<div class="spinner-border text-primary" role="status">\
        <span class="sr-only">Loading...</span>\
    </div>');
    $.getJSON("../api/retorna_agendamento.php", {



            'date': dataform,


        },
        function(data, textStatus, jqXHR) {
            if (data.agendamentos && data.agendamentos.length > 0 && textStatus != "error") {

                var tabela = document.createElement("table");
                var cabecalho = document.createElement("thead");
                var corpo = document.createElement("th");



                var lista = "";
                $('#divAgendamentos').text('carreguei legal');
                data.agendamentos.forEach(element => {

                    if (element.status_c == "Cancelado.") {
                        botao = '<td><br><strong>' + element.status_c + '<br><a class="btn  btn-outline-primary" onclick="fncexcluir(' + element.id + ')">Excluir.</a></td>'

                    } else if (element.status_c == 'Confirmado.') {
                        botao = '<td><br><strong>' + element.status_c + '</td></strong>';
                    } else {
                        botao = '<td><br><strong>' + element.status_c + '<br><a class="btn  btn-outline-primary" onclick="fncconfirma(' + element.id + ')">Confirmar.</a></td>'
                    }



                    lista = lista + '<tr><td><strong>' + element.nome + '</td><td><strong>|-|' + element.dia + '|-|' + element.horario + ':00 R$:|-|' + element.valor + '|-|' + botao + '</td><br></tr>';
                });
                // console.log(data.agendamentos);
                tabela.append(cabecalho);
                tabela.append(corpo);


                $('#divAgendamentos').append(tabela).html(lista);
                // $('#divAgendamentos');

            } else {
                $('#divAgendamentos').text('Nao hรก agendamento.');
            }
            // console.log(tabela);
            // console.log(botao);

        }

    );
}

function fnclogar() {



    $.post("../api/retorn-login.php", $('#login').serialize(),
        function(data, textStatus, jqXHR) {
            console.log(data.controle);
            if (data.controle == 1) {
                window.location.href = 'pag_inicial.php';
            } else if (data.controle == 2) {
                window.location.href = 'index.php';

            } else {
                alert("Email ou senha incorreta!");

            }
        }, "json"
    );


    /* 
 
     $.ajax({
         method: "POST",
         url: "../api/retorn-login.php",
         data: $('#login').serialize(),
 
         
         success: function (response) {
             console.log(response);
             
         }
     })  .done(function( msg ) {
         alert( "Data Saved: " + msg );
       });
  */

}

function fnccadastroc() {
    window.location = 'cadastro_carro.php';
}

function fncRecebeCadastro() {



    $.ajax({
        method: "POST",
        url: "../api/retorn-cadastro.php",
        data: $('#cadastro').serialize(),

    })
    window.location = 'index.php';

}


function fncRecebeCadastroe() {



    $.ajax({

        method: "POST",
        url: "../api/retorno-cadastro.php",
        data: $('#cadastro_emp').serialize(),



    })
    window.location = 'index.php';

}

function fncconfirma(id) {

    $.post("../api/confirma.php",

        {
            'id': id,
        },



        function(data) {



            if (data.erro == 0) {

                alert(data.msg);
            } else if (data.erro == 1) {
                alert(data.msg);
            }
            window.location = 'index.php';
        });
    "json"

}


function fncexcluir(id) {

    $.post("../api/ex_agd.php",

        {
            'id': id,
        },



        function(data) {



            if (data.erro == 0) {

                alert(data.msg);
            } else if (data.erro == 1) {
                alert(data.msg);
            }

            window.location = 'index.php';
        });


    "json"

}