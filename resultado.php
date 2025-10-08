<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include "conexao.php";

$placa = strtoupper($_GET['placa']);
$sql = "SELECT * FROM veiculos WHERE placa='$placa'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Consulta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
    <section class="max-w-2xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Resultado da Consulta</h2>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <?php
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <ul class="space-y-3 text-gray-800 dark:text-gray-200">
                <li><strong>Placa:</strong> <?php echo htmlspecialchars($row['placa']); ?></li>
                <li><strong>Modelo:</strong> <?php echo htmlspecialchars($row['modelo']); ?></li>
                <li><strong>Cor:</strong> <?php echo htmlspecialchars($row['cor']); ?></li>
                <li><strong>Responsável:</strong> <?php echo htmlspecialchars($row['responsavel']); ?></li>
                <li><strong>Telefone:</strong> <?php echo htmlspecialchars($row['telefone']); ?></li>
                <li><strong>Registro:</strong> <?php echo htmlspecialchars($row['registro']); ?></li
            </ul>
            <?php
        } else {
            echo "<p class='text-red-600 dark:text-red-400 font-semibold'>Nenhum veículo encontrado!</p>";
        }
        ?>
        </div>

        <div class="mt-6">
            <a href="index.php" 
               class="inline-block px-6 py-2.5 bg-primary-700 hover:bg-primary-800 text-white rounded-lg focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 font-semibold text-center">
                Nova consulta
            </a>
        </div>
    </section>
</body>
</html>
