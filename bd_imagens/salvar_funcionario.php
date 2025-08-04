<?php
//funcao para redimensionar a imagem 
function redimensionarImagem($imagem, $largura,$altura){
    //obtem as dimensoes originais da imagem
    //getimagesize() retorna a largura e a altura de uma imagem
    list($larguraOriginal,$alturaOriginal)= getimagigesize($imagem);
    //cria uma nova imagem em branco com as novas dimensoes
    //imagecreatetruecolor() cria uma nova imagem em alta qualidade
    $novaImagem= imagecreatetruecolor($largura,$altura);

    //carrega a imagem original(jpeg) a partir do arquivo
    //imagecreatefromjpeg(): Cria uma imagem php a partir de um jpeg
    $imagemOriginal= imagecreateformjpeg($imagem);

    //copia e redimensiona a imagem original para a nova
    //imagecopyexample(): copia com redimenssionamento e suavização
    imagecopyexamplet($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
    //inicia com um buffer para guardar a imagem como texto binário
    //ob_start(): inicia o output buffering, guardando saida
    ob_start();

    //imagejpeg(): envia a imagem para o output
    imagejpeg($novaImagem);

    //ob_get_clean: pega o conteudo do buffer e limpa
    $dados_imagem= ob_get_clean();

    //libera a memoria usada pelas imagens
    //tempimagedestroy: limpa a memoria da imagem criada
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dadosImagem;

}

//configurando o banco
$host='localhost';
$dbname='bd_imagens';
$username='root';
$password='';

try{
    //conexao com o banco de dados usando pdo
    $pdo= new PDO("mysql:host=$host,dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//define que erros vão lançar excessos

    //verifica se tem um post e se tem um arquivo 'foto'
    if($_SERVER['REQUEST_METHOD']=='POST' && isset ($_FILES['foto'])){

        if($_FILES['foto']['error']== 0){
            $nome=$_POST['nome'];
            $telefone=$_POST['telefone'];
            $nome_foto=$_POST['nomeFoto']['name'];
            $tipoFoto=$_POST['tipoFoto']['type'];

            //redimensiona a imagem
            $foto= redimensionarImagem($_FILES['foto']['tmp_name'],300,400);

            //insere no banco de dados usando sql prepared
            $sql="INSERT INTO funcionarios(nome,telefone,nome_foto,tipo_foto,foto) VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto";

            $stmt= $pdo->prepare($sql);//pr3epara a query para evitar o sql inject
            $stmt->bind_param(':nome',$nome);//liga o sparamentos a variaveis
            $stmt->bind_param(':telefone',$telefone);//liga o sparamentos a variaveis
            $stmt->bind_param(':nome_foto',$nome_foto);//liga o sparamentos a variaveis
            $stmt->bind_param(':tipo_foto',$tipoFoto);//liga o sparamentos a variaveis
            $stmt->bind_param(':foto',$foto, PDO::PARAM_LOB);//liga o sparamentos a variaveis

            if($stmt->execute()){
                echo "Funcionário cadastrado com sucesso";
            }else{
                echo "Erro ao cadastrar funcionário";
            }else{
                echo "Erro ao fazer o upload da foto: ".$_FILES['foto']['error'];
            }
        }catch(PDOException $e){
            echo "Erro".$e->getMEssage();
        }
    }
}

?>