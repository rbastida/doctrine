<?php

class Pessoa
{
    private $nome;
    private $email;
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function save()
    {
        // insert
        //$pdo = new PDO("dsn","usuario","senha");
        // $pdo->execute....
        //$this->db->exec(.....)
    }
}

$pdo = new PDO("dsn","usuario","senha");
$pessoa = new Pessoa($pdo);
