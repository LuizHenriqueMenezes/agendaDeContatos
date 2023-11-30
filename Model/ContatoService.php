<?php 
class ContatoService{
    public function cadastrarContatoService($contato){
        //Verifica se os campos obrigátorios foram preenchidos
        $campo = $this->verificarCampo($contato->nome, "nome");
        if(!$campo['sucesso']) return $campo;

        $campo = $this->verificarCampo($contato->sobrenome, "sobrenome");
        if(!$campo['sucesso']) return $campo;

        $campo = $this->verificarCampo($contato->email, "email");
        if(!$campo['sucesso']) return $campo;

        $campo = $this->verificarCampo($contato->senha, "senha");
        if(!$campo['sucesso']) return $campo;

        //Busca o contato pelo email informado
        /* 
        //Busca o contato pelo email informado
        //$resultado = $this->buscarContato($contato);

        //Se o email já estiver em uso
        if($resultado != null){
            return array{
                "mensagem" => "Este email já está sendo utilizado",
                "campo" => "#email",
                "sucesso" => false
            }

        }       
        */

        //Criptogrfia da senha com SHA256
        $contato->senha = $this->criptografarSHA256($contato->senha);

        //inclui o arquivo ContatoDAO
        include_once "ContatoDAO.php";

        //cria objeto da classe ContatoDAO
        $dao = new contatoDAO();

        //ENVIA OS DADOS PARA CADASTRAR NO DB
        $cadastrou = $dao->cadastrarContatoDAO($contato);

        if($cadastrou){
            return array(
                'mensagem' => "Cadastro efetuado com sucesso!",
                'sucesso' => true
            );
        }else {
            return array(
                'mensagem' => "Erro ao efetuar o cadastro",
                'campo' => "",
                'sucesso' => false
            );
        }

    }

    private function criptografarSHA256($senhaInformada){
        //Converte a senha informada pra SHA256
        $senhaNova = hash('sha256', $senhaInformada);

        //Informa o Sal e converte para SHA256
        $salt = hash('sha256', "Desenv. Web 2");

        //Mistura a senha e o sal
        $senhaNova = hash('sha256', $senhaNova.$salt);

        return $senhaNova;
    }

    private function verificarCampo($valorCampo, $nomeCampo){
        //Verifica se o campo foi preenchido
        if (strcmp($valorCampo, "") == 0) {
            return array(
                'mensagem' => "Preencha o campo $nomeCampo",
                'campo' => "#$nomeCampo",
                'sucesso' => false
            );
        }

        //caso tenha td sido preenchido 
        return array('sucesso' => true);
    }
}

?>