function cadastrarContato() {
    dados = {
        'email': $('#email').val(), // com esse .val() pega o valor do email
        'senha': $('#senha').val(),
        'nome': $('#nome').val(),
        'sobrenome': $('#sobrenome').val(),
        'cadastrar': $('#cadastrar').val()
    }

    carregarModalLoading() // Mostra o Loading

    //Envia e recebe os dados do Back-end
    $.ajax({
        url: '../Controller/contatoController.php', //vai pra dentro de uma pasta
        type: 'POST',
        data: dados,
        success: function(data){
            setTimeout(function(){
                esconderModalLoading() // terminou o 1 segundo ele esconde
                $('#status').text(data.mensagem) // aqui é aquela parte de mostrar o status no cadastro

                //Verificar o código retornado
                if (data.codigo == 1) {
                    $('#status').css({
                        "color": "#f1c40f"
                    })

                    // Redireciona pro index, depois do delay
                    setTimeout()
                    
                } else {
                    
                }

            }, 1000);// pra dar tempo de aparecer o negócio carregando (1000 = 1 segundo)
            // esse de cima, basicamente ele ta falando que vai executar a function em tal tempo

        }
    })
}

function carregarModalLoading() {
    $('#modalLoading').css({
        "display": "block"
    })
}

function esconderModalLoading(){
    $('#modalLoading').css({
        "display": "none"
    })
}