<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Login - Sistema de Veículos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white text-center">Login</h2>
        <form method="POST" action="autenticar.php" class="space-y-6">
            <div>
                <label for="usuario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Usuário</label>
                <input type="text" id="usuario" name="usuario" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
            </div>
            <div>
                <label for="senha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Senha</label>
                <input type="password" id="senha" name="senha" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
            </div>
            <button type="submit" 
                class="w-full text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                       dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Entrar
            </button>
        </form>
    </div>
</body>
</html>
