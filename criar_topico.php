<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar tópico</title>
    <style>
        form {
            border: 1px solid black;
            width: 170px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        echo "Você precisa estar logado para criar um tópico.";
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $topicos = simplexml_load_file("topicos.xml");
        $novo = $topicos->addChild("topico");
        $novo->addChild("autor", $_SESSION['usuario']);
        $novo->addChild("titulo", $_POST['titulo']);
        $novo->addChild("mensagem", $_POST['mensagem']);
        $novo->addChild("comentarios");
        $topicos->asXML("topicos.xml");
        echo "Tópico criado com sucesso! <a href='listar.php'>Ver tópicos</a>";
    } else {
    ?>
    <h1>Criar tópico</h1>
        <form method="post">
            Título: <br>
            <input type="text" name="titulo" required> <br>
            Mensagem: <br>
            <textarea name="mensagem" required></textarea><br>
            <br>
            <button type="submit">Criar tópico</button>
        </form>
    <?php } ?>
</body>

</html>