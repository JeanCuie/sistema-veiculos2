<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include "conexao.php";

// Pega o ID da URL
$id = $_GET['id'];

// Busca os dados do veículo
$sql = "SELECT * FROM veiculos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Veículo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
    <section class="max-w-2xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Editar Veículo</h2>
        <form method="POST" action="update.php" class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <div>
                <label for="placa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Placa <span class="text-red-500">*</span></label>
                <input type="text" id="placa" name="placa" value="<?php echo htmlspecialchars($row['placa']); ?>" required 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
            </div>
            
            <div>
                <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
                <input type="text" id="modelo" name="modelo" value="<?php echo htmlspecialchars($row['modelo']); ?>" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
            </div>
            
            <div>
                <label for="cor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cor</label>
                <input type="text" id="cor" name="cor" value="<?php echo htmlspecialchars($row['cor']); ?>" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
            </div>
            
            <div>
                <label for="responsavel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Responsável</label>
                <input type="text" id="responsavel" name="responsavel" value="<?php echo htmlspecialchars($row['responsavel']); ?>" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
            </div>
            
            <div class="flex items-center gap-4">
                <button type="submit" class="px-6 py-2.5 bg-primary-700 hover:bg-primary-800 text-white rounded-lg focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 font-semibold">
                    Salvar Alterações
                </button>
                <a href="listar.php" class="inline-block px-6 py-2.5 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg focus:ring-4 focus:ring-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:focus:ring-gray-700 font-semibold text-center">
                    Voltar
                </a>
            </div>
        </form>
    </section>
</body>
</html>
