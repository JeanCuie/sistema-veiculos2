  <?php
 //   session_start();
    // Se não estiver logado, volta para login
  //  if (!isset($_SESSION['usuario'])) {
   //     header("Location: login.php");
   //     exit;
    //}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Veículo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900">

<section class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
  <h1 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Cadastrar Veículo</h1>
  <form action="salvar.php" method="post">
      <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          <div class="sm:col-span-2">
              <label for="responsavel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Responsável</label>
              <input type="text" name="responsavel" id="responsavel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nome do Responsavel" required="">
          </div>
          <div class="w-full">
              <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
              <input type="text" name="modelo" id="modelo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Modelo do Veiculo" required="">
          </div>
          <div class="w-full">
              <label for="placa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Placa</label>
              <input type="text" name="placa" id="placa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ABCD1234" required="">
          </div>
          <div class="w-full">
              <label for="cor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cor</label>
              <input type="text" name="cor" id="cor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cor do Veiculo" required="">
          </div>
          <div class="w-full">
              <label for="registro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Registro</label>
              <input type="text" name="registro" id="registro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="R.A ou Matricula de Professor" required="">
          </div>
          <div class="w-full">
              <label for="telefone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
              <input type="text" name="telefone" id="telefone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="(99)9999-9999" required="">
          </div>
      </div>
      <div class="flex gap-4 mt-4 sm:mt-6">
          <button type="submit" 
            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Cadastrar Veículo
          </button>
          <a href="index.php" 
            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-gray-900 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            Voltar
          </a>
      </div>
  </form>
</section>

</body>
</html>
