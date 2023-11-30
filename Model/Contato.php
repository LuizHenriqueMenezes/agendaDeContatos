<?php 
class Contato{
    //Atributos da classe
    private $id;
    private $nome;
    private $sobrenome;
    private $email; 
    private $senha;

    // get e set
    public function __get($valor)
    {
        return $this->$valor;
    }

    public function __set($atributo, $valor) //vai falar o seguinte: guarde nesse atributo, esse valor
    { 
        $this->$atributo = $valor;
    }

}

?>