function cadastrarContato() {
    dados = {
        'email': $('#email').val(), // com esse .val() pega o valor do email
        'senha': $('#senha').val(),
        'nome': $('#nome').val(),
        'sobrenome': $('#sobrenome').val(),
        'cadastrar': $('#cadastrar').val()
    }

    // Mostra o Loading
}

function carregarModalLoading() {
    $('#modalLoading').css({
        "display": "block"
    });
}