<?php
class BD
{

    private $host = "localhost"; // ip que está conectando 
    private $dbname = "db_aula_tai"; // nome do bd criado
    private $port = 3306; // porta que vai se conectar
    private $usuario = "root"; //
    private $senha = "";
    private $db_charset = "utf8";

    public function conn()
    { // função p/ conexão com bd
        $conn = "mysql:host=$this->host;
            dbname=$this->dbname; port=$this->port"; // $conn = string de conexão  

        return new PDO(
            $conn,
            $this->usuario,
            $this->senha,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->db_charset]
        );
    }

    public function select(){
        $conn = $this->conn();
        $st = $conn->prepare("SELECT * FROM usuario;");
        $st->execute();
        return $st;
    }

    public function inserir($dados){
        $conn = $this->conn();
        $sql = "INSERT INTO usuario(nome,telefone,cpf) value(?,?,?)"; //? recebe valores do formulário, nas posições do vetor
        $st = $conn->prepare($sql);
        $arryDados = []; //receber valores do formulario em forma de array
        $arryDados[] = $dados['nome'];
        $arryDados[] = $dados['telefone'];
        $arryDados[] = $dados['cpf'];
        $st->execute($arryDados); //passa o vetor 

        return $st;
    }
    public function update($dados){
        $conn = $this->conn();
        $sql = "UPDATE usuario SET 'nome'=?, 'telefone'=?, 'cpf'=? WHERE 'id'=?"; //? recebe valores do formulário, nas posições do vetor
        $st = $conn->prepare($sql);
        $arryDados = []; //receber valores do formulario em forma de array
        $arryDados[] = $dados['nome'];
        $arryDados[] = $dados['telefone'];
        $arryDados[] = $dados['cpf'];
        $arryDados[] = $dados['id'];
        $st->execute($arryDados); //passa o vetor 

        return $st;
    }

    public function remover($dados){
        $conn = $this->conn();
        $sql = "DELETE FROM usuario WHERE id=?"; //? deleta valores do formulário, nas posições do vetor
        $st = $conn->prepare($sql);
        $arryDados = []; //receber valores do formulario em forma de array
        $arryDados[] = $dados['id'];
        $st->execute($arryDados); //passa o vetor 

        return $st;
    }
    public function buscar($dados){
        $conn = $this->conn();
        $sql = "INSERT INTO * FROM usuario"; //? recebe valores do formulário, nas posições do vetor
        $st = $conn->prepare($sql);
        $arryDados = []; //receber valores do formulario em forma de array
        $arryDados[] = $dados['nome'];
        $arryDados[] = $dados['telefone'];
        $arryDados[] = $dados['cpf'];
        $st->execute($arryDados); //passa o vetor 

        return $st->fetchObject();
    }
}
