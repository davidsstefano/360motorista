$(document).ready(function () {
 
});

function fncCarregaHorarios() {
  //capturar os valores selecionados para passar pra api
  let partida = $('#partida').val();
  let destino = $('#destino').val();
  let dia = $('#dia').val();
  let motorista = $('#motorista').val();
 

  if (partida > 0 && destino > 0 && dia.length > 0 && motorista > 0 ) {
      $('#hora').prop('disabled', false).focus(); //habilitando a data para a selecao
      $('#hora').empty().append(new Option('carregando...', 0)); //limpou o campo e escreveu o aguarde
      //console.log(hora);
      $.post(
          '../api/retorna-horarios.php',
          {
              'partida': partida,
              'destino': destino,
              'dia': dia,
              'motorista' : motorista,
             
          },

         
          function (retornoJson) {
            
            alert(returnoJson);
              $('#hora').empty().append(new Option('Selecione o horário:', ''));
              retornoJson.horarios.forEach(element => {
              
          
                                 
              $('#hora').append(new Option(element, element));
             
                   
            
                 
               });

          },
            

          'json'
      );
  }
}

var check = function() {
  if (document.getElementById('senha').value ==
    document.getElementById('confirm_senha').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'OK';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'SENHAS DIFERENTES';
  }
}