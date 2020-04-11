var pessoa_Json = '{"nome": "Fulano", "idade": "27", "salario": "1983.31"}';

$.ajax({
    type: "POST",
    url: "https://127.0.0.1/testesPHP/tratarRequisicaoJSON/ws/",
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    cache: false,
    beforeSend: function() {
        $("h2").html("Carregando...");
    },
    error: function() {
        $("h2").html("O servidor não conseguiu processar o pedido");
    },
    success: function (msg) {
        $("h2").html("Carregado");
        if (msg) {
            // Interpretando retorno JSON...
            var itemRetornado = '<p>Nome: '+msg["nome_pessoa"]+'</p>';
            itemRetornado += '<p>Idade: '+msg["idade_pessoa"]+'</p>';
            itemRetornado += '<p>Salário: '+msg["salario_pessoa"]+'</p>';

            document.getElementById("conteudo").innerHTML = itemRetornado;
           
           console.log(msg);
           
        } else {
            alert("Algo deu errado!");
        }
    },
    data: pessoa_Json
  });