<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include "conexao.php";

$mensagem = "";
$tipoMensagem = ""; // 'success' ou 'error'

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = strtoupper(trim($_POST['placa']));
    $modelo = trim($_POST['modelo']);
    $cor = trim($_POST['cor']);
    $responsavel = trim($_POST['responsavel']);

    // Verifica se a placa já existe
    $stmtCheck = $conn->prepare("SELECT id FROM veiculos WHERE placa = ?");
    $stmtCheck->bind_param("s", $placa);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows > 0) {
        // Placa já existe
        $mensagem = "❌ A placa <strong>$placa</strong> já está cadastrada!";
        $tipoMensagem = "error";
    } else {
        // Insere novo veículo
        $stmtInsert = $conn->prepare("INSERT INTO veiculos (placa, modelo, cor, responsavel, telefone, registro) VALUES (?, ?, ?, ?, ?, ?)");
        $stmtInsert->bind_param("ssssss", $placa, $modelo, $cor, $responsavel, $telefone, $registro);

        if ($stmtInsert->execute()) {
            $mensagem = "✅ Veículo cadastrado com sucesso!";
            $tipoMensagem = "success";
        } else {
            $mensagem = "❌ Erro ao cadastrar veículo: " . $stmtInsert->error;
            $tipoMensagem = "error";
        }

        $stmtInsert->close();
    }

    $stmtCheck->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Cadastro de Veículo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900">

<section class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
  <h1 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Cadastrar Veículo</h1>

  <?php if ($mensagem): ?>
    <div class="<?php
      echo $tipoMensagem === 'success'
          ? 'bg-green-100 border border-green-400 text-green-700'
          : 'bg-red-100 border border-red-400 text-red-700';
    ?> px-4 py-3 rounded mb-6" role="alert">
      <p class="font-bold"><?php echo $mensagem; ?></p>
    </div>
  <?php endif; ?>

  <form action="" method="post">
      <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          <div class="sm:col-span-2">
              <label for="responsavel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Responsável</label>
              <input type="text" name="responsavel" id="responsavel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nome do Responsável" required>
          </div>
          <div class="w-full">
              <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
              <input type="text" name="modelo" id="modelo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Modelo do Veículo" required>
          </div>
          <div class="w-full">
              <label for="placa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Placa</label>
              <input type="text" name="placa" id="placa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ABCD1234" required>
          </div>
          <div class="w-full">
              <label for="cor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cor</label>
              <input type="text" name="cor" id="cor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cor do Veículo" required>
          </div>
          <div class="w-full">
              <label for="registro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Registro</label>
              <input type="text" name="registro" id="registro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="R.A ou Matricula de Professor" required>
          </div>
          <div class="w-full">
              <label for="telefone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
              <input type="text" name="telefone" id="telefone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="(99)9999-9999" required>
          </div>
      </div>

      <div class="mt-6 flex space-x-4">
          <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
              Cadastrar Veículo
          </button>
          <a href="index.php" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-900">
              Voltar
          </a>
      </div>
  </form>
</section>

</body>
</html>
