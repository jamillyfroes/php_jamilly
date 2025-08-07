<?php
// Função para redimensionar a imagem
function redimensionarImagem($imagem, $largura, $altura) {
    // Obtém as dimensões originais da imagem
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);

    // Cria uma nova imagem em branco com as novas dimensões
    $novaImagem = imagecreatetruecolor($largura, $altura);

    // Carrega a imagem original jpeg
    $imagemOriginal = imagecreatefromjpeg($imagem);

    // Copia e redimensiona a imagem original para a nova
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

    // Inicia um buffer para guardar a imagem como texto binário
    //ob_satart();
    ob_start();


    imagejpeg($novaImagem);
    $dados_imagem = ob_get_clean(); // Pega o conteúdo do buffer e limpa

    // Libera a memória usada pelas imagens
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dados_imagem;
}

// Configuração do banco
$host = 'localhost';
$dbname = 'bd_imagens';
$username = 'root';
$password = '';

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o método é POST e se há um arquivo 'foto'
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])) {

        if ($_FILES['foto']['error'] == 0) {
            $nome = $_POST['nome'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $nome_foto = $_FILES['foto']['name'];
            $tipoFoto = $_FILES['foto']['type'];

            // Redimensiona a imagem
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);

            // Insere no banco de dados usando SQL preparado
            $sql = "INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto) 
                    VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':nome_foto', $nome_foto);
            $stmt->bindParam(':tipo_foto', $tipoFoto);
            $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB); // LOB para dados binários

            if ($stmt->execute()) {
                echo "Funcionário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar funcionário.";
            }
        } else {
            echo "Erro ao fazer o upload da foto: " . $_FILES['foto']['error'];
        }
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Imagens</title>
</head>
<body>
    <h1>Lista de imagens</h1>    
    <a href="consulta_funcionario.php">Listar funcionários</a>

</body>
</html>