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
    include_once "../Model/Contato.php";
    include_once "../Model/ContatoService.php";

    //Retorno do JSON (validação) 
    header('Content-Type: application/json');

    //Guarda as informações no formulário
    $email     = $_POST['email'];
    $senha     = $_POST['senha'];
    $nome      = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];

    //Cria objetos das classes Contato e ContatoService
    $contato = new Contato();
    $service = new ContatoService();

    //Preenche os objeto com os dados informados
    $contato->email     = $email;
    $contato->senha     = $senha;
    $contato->nome      = $nome;
    $contato->sobrenome = $sobrenome;

    //Envia objeto pra efetuar o cadastro
    $response = $service->cadastrarContatoService($contato);

    //Verifica o tempo de retorno
    if ($response['sucesso']) {
        //Mostra mensagem de sucesso
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'codigo' => 1
        ));

        exit(); // se nada der certo, sai
        
    } else {
        //Mostra mensagem de erro
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'campo' => $response['campo'],
            'codigo' => 0
        ));

        exit(); 
    }
}

?>