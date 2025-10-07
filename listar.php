<?php
//session_start();
//if (!isset($_SESSION['usuario'])) {
   // header("Location: login.php");
  //  exit;
//}
include "conexao.php";

$sql = "SELECT * FROM veiculos ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Veículos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
    <section class="max-w-6xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Painel Administrativo - Lista de Veículos</h2>
        <p class="mb-4">
            Usuário logado: <span class="font-semibold"><?php echo htmlspecialchars($_SESSION['usuario']); ?></span> | 
            <a href="logout.php" class="text-blue-600 hover:underline">Sair</a>
        </p>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Veículos cadastrados
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        Lista completa dos veículos registrados no sistema.
                    </p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Placa</th>
                        <th scope="col" class="px-6 py-3">Modelo</th>
                        <th scope="col" class="px-6 py-3">Cor</th>
                        <th scope="col" class="px-6 py-3">Responsável</th>
                        <th scope="col" class="px-6 py-3">Registro</th>
                        <th scope="col" class="px-6 py-3">Telefone</th>
                        <th scope="col" class="px-6 py-3"><span class="sr-only">Ações</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['id']; ?></td>
                                <td class="px-6 py-4"><?php echo htmlspecialchars($row['placa']); ?></td>
                                <td class="px-6 py-4"><?php echo htmlspecialchars($row['modelo']); ?></td>
                                <td class="px-6 py-4"><?php echo htmlspecialchars($row['cor']); ?></td>
                                <td class="px-6 py-4"><?php echo htmlspecialchars($row['responsavel']); ?></td>
                                <td class="px-6 py-4 text-right">
                                    <a href="editar.php?id=<?php echo $row['id']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Editar</a>
                                    <a href="excluir.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');" class="font-medium text-red-600 dark:text-red-500 hover:underline">Excluir</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="6" class="px-6 py-4 text-center">Nenhum veículo cadastrado</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex gap-4">
            <a href="index.php" class="inline-block px-5 py-2.5 bg-gray-600 hover:bg-gray-700 text-white rounded-lg">Voltar à consulta</a>
            <a href="cadastrar.php" class="inline-block px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg">Cadastrar novo veículo</a>
        </div>
    </section>
</body>
</html>
