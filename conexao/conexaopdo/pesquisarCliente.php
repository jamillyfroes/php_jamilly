<?php
require_once 'conexao.php';

$conexao = conectarBanco();

$busca = $_GET['busca'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Pesquisar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
            <li><a class="dropdown-item" href="inserirCliente.php">Cadastrar Cliente</a></li>
            <li><a class="dropdown-item" href="listarclientes.php">Lista de Clientes</a></li>
            <!--<li><a class="dropdown-item" href="pesquisarCliente.php">Pesquisar Cliente</a></li>-->
            <li><a class="dropdown-item" href="atualizarCliente.php">Atualizar Cliente</a></li>
            <li><a class="dropdown-item" href="deletarCliente.php">Deletar Cliente</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>



    <h2 class="text-center">Pesquisar Cliente</h2>

    <?php if (!$busca): ?>
        <form action="pesquisarCliente.php" method="GET" class="w-50 mx-auto mt-5">
            <label for="busca" class="form-label">Digite o ID ou Nome:</label>
            <input type="text" id="busca" name="busca" class="form-control" required>
            
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-dark">Pesquisar</button>
            </div>
        </form>

    <?php
        exit;
    endif;

    if (is_numeric($busca)) {
        $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id");
        $stmt->bindParam(":id", $busca, PDO::PARAM_INT);
    } else {
        $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE nome LIKE :nome");
        $buscaNome = "%$busca%";
        $stmt->bindParam(":nome", $buscaNome, PDO::PARAM_STR);
    }

    $stmt->execute();
    $clientes = $stmt->fetchAll();

    if (!$clientes) {
        echo '<div class="alert alert-warning text-center mt-4">Nenhum cliente encontrado.</div>';
        exit;
    }
    ?>

    <table class="table table-hover w-75 mx-auto text-center">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Email</th>
                <th>Telefone</th>
            </tr>

            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= htmlspecialchars($cliente['id_cliente']) ?></td>
                    <td><?= htmlspecialchars($cliente['nome']) ?></td>
                    <td><?= htmlspecialchars($cliente['endereco']) ?></td>
                    <td><?= htmlspecialchars($cliente['email']) ?></td>
                    <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>
<br>
    <address>
        <center>Jamilly Fróes- Estudante- Técnico de Desenvolvimento de Sistemas</center>
    </address>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>