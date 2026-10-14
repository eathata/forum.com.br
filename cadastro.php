<!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarios = simplexml_load_file("usuarios.xml");
            $novo = $usuarios->addChild("usuario");
            $novo->addChild("nome", $_POST['nome']);
            $novo->addChild("celular", $_POST['celular']);
            $novo->addChild("email", $_POST['email']);
            $novo->addChild("senha", md5($_POST['senha']));
            $usuarios->asXML("usuarios.xml");
            echo "Usuário cadastrado com sucesso! <a href='login.php'>Fazer login</a>";
        } else {
        ?>
            <h1>Cadastrar-se </h1>
            <form method="post">
                Nome: <br>
                <input type="text" name="nome" required><br>
                Celular:<br>
                <input type="text" name="celular" required><br>
                Email: <br>
                <input type="email" name="email" required><br>
                Senha: <br>
                <input type="password" name="senha" required><br>
                <br>
                <button type "submit">Cadastrar </button>
            </form>
        <?php } ?>
    </body>

    </html>