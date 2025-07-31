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
<?php 
require_once ('conexao.php');

if($_SERVER["REQUEST_METHOD"] =="POST") {
    $conexao = conectarBanco();

    $sql = "INSERT INTO cliente (nome, endereco, telefone, email ) VALUES (:nome, :endereco, :telefone, :email )";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $_POST["nome"]);
    $stmt->bindParam(":endereco", $_POST["endereco"]);
    $stmt->bindParam(":telefone", $_POST["telefone"]);
    $stmt->bindParam(":email", $_POST["email"]);

    try {
        $stmt->execute();
        echo "Cliente cadastrado com sucesso!";
    } catch (PDOException $e) {
        error_log("Erro ao inserir cliente: ".$e->getMessage());
        echo "Erro ao cadastrar cliente";
    }

}

?>

<br>
    <address>
        <center>Jamilly Fróes- Estudante- Técnico de Desenvolvimento de Sistemas</center>
    </address>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>  