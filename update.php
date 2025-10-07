<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include "conexao.php";

// Recebe dados do formulário
$id = $_POST['id'];
$placa = strtoupper($_POST['placa']);
$modelo = $_POST['modelo'];
$cor = $_POST['cor'];
$responsavel = $_POST['responsavel'];

// Atualiza no banco
$sql = "UPDATE veiculos SET 
        placa='$placa', 
        modelo='$modelo', 
        cor='$cor', 
        responsavel='$responsavel' 
        WHERE id=$id";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualização do Veículo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
    <section class="max-w-xl mx-auto p-6 mt-10">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
            <?php
            if ($conn->query($sql) === TRUE) {
                echo '<p class="text-green-600 dark:text-green-400 text-lg font-semibold mb-4">✅ Veículo atualizado com sucesso!</p>';
                echo '<a href="listar.php" class="inline-block px-6 py-2.5 bg-primary-700 hover:bg-primary-800 text-white rounded-lg focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 font-semibold">Voltar</a>';
            } else {
                echo '<p class="text-red-600 dark:text-red-400 font-semibold mb-4">❌ Erro: ' . htmlspecialchars($conn->error) . '</p>';
                echo '<a href="listar.php" class="inline-block px-6 py-2.5 bg-gray-700 hover:bg-gray-800 text-white rounded-lg focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-900 font-semibold">Voltar</a>';
            }
            $conn->close();
            ?>
        </div>
    </section>
</body>
</html>
