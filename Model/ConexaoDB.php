<?php
class ConexaoBD{
    public function abrirConexaoDB(){
        // dados pra conexão (localhost)
        $banco = "agenda_php";
        $servidor = "localhost";
        $usuario = "root"; 
        $senha = "";

        //conexao
        $conexao = mysqli_connect($servidor, $usuario, $senha);

        //seleciona o DB
        mysqli_select_db($conexao, $banco);

        //força os dados a serem gravados no BD com o encoding correto
        mysqli_query($conexao, "SET NAMES 'uft8'");
        mysqli_query($conexao, "SET character_set_connection=utf8");
        mysqli_query($conexao, "SET character_set_client=utf8");
        mysqli_query($conexao, "SET character_set_results=utf8");

        //encerra tentativa se der erro 
        if(mysqli_connect_errno()){
            die(mysqli_connect_error());
        }

        return $conexao;
    }

    public function fecharConexaoDB($conexao){
        mysqli_close($conexao);
    }
} 

?>