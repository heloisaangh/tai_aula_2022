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

    public function select()
    {
        $conn = $this->conn();
        $st = $conn->prepare("SELECT * FROM usuario;");
        $st->execute();
        return $st;
    }
    public function inserir($dados)
    {
        $conn = $this->conn();
        $sql = "INSERT INTO usuario(nome,telefone,cpf) value(?,?,?)";
        $st = $conn->prepare($sql);
        $arryDados = []; //receber valores do formulario em forma de array
        $arryDados[] = $dados['nome'];
        $arryDados[] = $dados['telefone'];
        $arryDados[] = $dados['cpf'];
        $st->execute($arryDados);//passa o vetor 

        return $st;
    }
    public function insert()
    {
    }
}
