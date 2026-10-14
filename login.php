<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form {
            border: 1px solid black;
            width: 170px;
            padding: 10px;
        }
    </style>
</head>

</head>

<body>
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuarios = simplexml_load_file("usuarios.xml");
        foreach ($usuarios->usuario as $u) {
            if ($u->email == $_POST['email'] && $u->senha == md5($_POST['senha'])) {
                $_SESSION['usuario'] = (string) $u->email;
                echo "Login realizado com sucesso! <a href='criar_topico.php'>Criar tópico</a>";
                exit;
            }
        }
        echo "Login Inválido";
    } else {
    ?>
        <h1>Login</h1>
        <form method="post">
            Email: <br>
            <input type="email" name="email" required><br>
            Senha: <br>
            <input type="password" name="senha" required><br>
            <br>
            <button type "submit">Entrar</button>
        </form>
    <?php } ?>
</body>

</html>