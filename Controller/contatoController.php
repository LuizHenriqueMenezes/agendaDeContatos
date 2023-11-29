<?php 
// Inicia sessão 
session_start();

//1. Cadastrar 
if(isset($_POST['cadastrar'])){ //verifica se veio do botão cadastrar 
    cadastrarContato(); 


    //2.
}

function cadastrarContato(){
    //Inclui os arquivos(Model)

    //Retorno do JSON (validação) 
    header('Content-Type: application/json');

    //Guarda as informações no formulário
    $email     = $_POST['email'];
    $senha     = $_POST['senha'];
    $nome      = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];

    //Cria objetos das classes Contato e ContatoService

    //Preenche o objeto com os dados informados

    //Envia objeto pra efetuar o cadastro
    $response = "";

    //Verifica o tempo de retorno
    if ($response['sucesso']) {
        //Mostra mensagem de sucesso
        print json_encode('');
        
    } else {
        # code...
    }
    

}


?>