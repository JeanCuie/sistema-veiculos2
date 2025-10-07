<?php
session_start();
// Se não estiver logado, volta para login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Veículos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900">
    <section class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h1 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">Consultar Veículos</h1>

        <!-- Formulário para digitar a placa -->
        <form method="GET" action="resultado.php" class="flex flex-col sm:flex-row items-center gap-4">
            <input 
                type="text" 
                name="placa" 
                placeholder="Digite a placa" 
                required 
                class="w-full sm:w-72 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
            <button 
                type="submit" 
                class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800"
            >
                 Buscar
            </button>
        </form>

        <!-- Botões de navegação -->
        <div class="mt-6 flex flex-col sm:flex-row gap-4">
            <a 
                href="cadastrar.php" 
                class="inline-block px-5 py-2.5 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg text-center dark:bg-green-500 dark:hover:bg-green-600"
            >
                 Cadastrar novo veículo
            </a>

            <a 
                href="listar.php" 
                class="inline-block px-5 py-2.5 text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 rounded-lg text-center dark:bg-gray-500 dark:hover:bg-gray-600"
            >
                 Ver todos os veículos
            </a>
        </div>
    </section>
</body>
</html>
