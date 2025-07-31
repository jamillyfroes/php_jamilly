<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Gestão de Clientes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSistema">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSistema">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Clientes
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <!--<li><a class="dropdown-item" href="inserirCliente.php">Cadastrar Cliente</a></li>-->
            <li><a class="dropdown-item" href="listarclientes.php">Lista de Clientes</a></li>
            <li><a class="dropdown-item" href="pesquisarCliente.php">Pesquisar Cliente</a></li>
            <li><a class="dropdown-item" href="atualizarCliente.php">Atualizar Cliente</a></li>
            <li><a class="dropdown-item" href="deletarCliente.php">Deletar Cliente</a></li>

          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <h2 align="center">Cadastro de Cliente</h2>
    <form action="processarInsercao.php" method="POST" class="w-50 mx-auto mt-5">
        <label for="nome" class="form-label">Nome:</label>
        <input class="form-control" type="text" id="nome" name="nome" required>
        <br>
        <label for="endereco" class="form-label">Endereço:</label>
        <input class="form-control" type="text" id="endereco" name="endereco" required>
        <br>
        <label for="telefone" class="form-label">Telefone:</label>
        <input class="form-control" type="tel" id="telefone" name="telefone" required>
        <br>
        <label for="email" class="form-label">E-mail:</label>
        <input class="form-control" type="email" id="email" name="email" required>
        <br>

        <div class="text-center mt-4">
        <button class="btn btn-dark" type="submit">Cadastrar Cliente</button>
        </div>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>