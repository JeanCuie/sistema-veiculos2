<?php
// Configurações do banco de dados
$host = "localhost"; // Servidor (no XAMPP é sempre localhost)
$user = "root";      // Usuário padrão do MySQL no XAMPP
$pass = "";          // Senha padrão do MySQL no XAMPP (geralmente vazia)
$db   = "sistema_veiculos"; // Nome do banco de dados que vamos criar

// Criando a conexão com o banco de dados
$conn = new mysqli($host, $user, $pass, $db);

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
