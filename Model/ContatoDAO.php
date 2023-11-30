<?php 
class contatoDAO{
    public function cadastrarContatoDAO($contato){
        //Inclui o arquivo da classe ConexaoBD
        require_once "ConexaoDB.php";

        //Cria objeto da classe de ConexaoBD
        $db = new ConexaoBD();

        //Abre conexao com o DB
        $conexao = $db->abrirConexaoDB();

        //Monta a query (cadastro)
        $sql = "INSERT INTO contato (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";

        // Cria o Prepared Statement 
        $stmt = $conexao->prepare($sql);

        //Vincula o parametro que será inserido no DB
        $stmt->bind_param("ssss", $nome, $sobrenome, $email, $senha); // esse ssss é pq todos são strings

        //Recebe os valores guardados no objeto 
        $nome      = $contato->nome;
        $sobrenome = $contato->sobrenome; 
        $email     = $contato->email;
        $senha     = $contato->senha;

        //executa o statement 
        $cadastrou = $stmt->execute(); //ta dentro de uma variavel pra testar se cadastrou (se td certo vem 1)

        //fecha o statement e a conexao
        $stmt->close();
        $db->fecharConexaoDB($conexao);

        return $cadastrou;

    }
}

?>