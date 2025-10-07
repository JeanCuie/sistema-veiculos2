<?php
session_start();
include "conexao.php";

// Recebe usuário e senha
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']); // Criptografa com MD5 (mesmo que no banco)

// Verifica se existe usuário no banco
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md max-w-md w-full text-center">
    <?php
    if ($result->num_rows > 0) {
        // Usuário válido -> cria sessão
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php"); // Redireciona para tela inicial
        exit;
    } else {
        ?>
        <p class="text-red-600 dark:text-red-400 text-lg font-semibold mb-6">❌ Usuário ou senha inválidos!</p>
        <a href="login.php" class="inline-block px-6 py-2.5 bg-primary-700 hover:bg-primary-800 text-white rounded-lg focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 font-semibold">Tentar novamente</a>
        <?php
    }
    $conn->close();
    ?>
    </div>
</body>
</html>
