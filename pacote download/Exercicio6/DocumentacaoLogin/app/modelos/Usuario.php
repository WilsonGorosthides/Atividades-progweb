<?php

/**
* Esta classe cria novos usuarios ainda não cadastrados ou retorna informações referentes aos usuários já cadastrados.
*/
class Usuario {

    /**
    * Atributo de usuário.
    * @var string Documenta o tipo de variável.
    */
    private $email;

    /**
    * Atributo de usuário.
    * @var string Documenta o tipo de variável.
    */
    private $senha;

    /**
    * Atributo de usuário.
    * @var string Documenta o tipo de variável.
    */
    private $nome;

    /**
    *  Este é um método construtor de usuário, ele que contém tudo que é necessario armazenar para a criação de um usuário em seu parametro e também cria um valor de 
    * hash para a senha (para não armazenar a senha do usuário diretamente, comprometendo a sua segurança).
    */
    function __construct(string $email, string $senha, string $nome) {
        $this->email = $email;
        $this->senha = hash('sha256', $senha);
        $this->nome = $nome;
    }

    /**
    *  Este método retorna o  dado de uma propriedade inacessível.
    */
    public function __get($campo) {
        return $this->$campo;
    }

    /**
    *  Este método registra o dado de uma propriedade inacessível.
    */
    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }

    /**
    *  Este método retorna se o e-mail e senha correspondem aos dados contidos no registro.
    */
    public function igual(string $email, string $senha) {
        return $this->email === $email && $this->senha === hash('sha256', $senha);
    }
}

?>