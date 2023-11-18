<?php
    include_once('include/componentes/cabecalho.php');
?>

<title> Login - Control </title>
    <style>
        body{
            color:#FFFFFF;
        }
        a{
            color:#FFFFFF;
        }
    </style>
</head>
<body>
    <main>
        <h1> Login </h1>
        <section>
            <form action="include/logica/logica_usuario.php" method="post">
                <p><label for="email">Email </label><input type="text" name="email" id="email"></p>
                <p><label for="senha">Senha </label><input type="text" name="senha" id="senha"></p>
                <p><button type="submit" id='Entrar' name='Entrar' value="Entrar"> Entrar </button></p>
            </form>
            <a href="recuperaSenha.php"> Esqueci minha senha</a><br>
            <a href="cadastraUsuario.php"> Realizar cadastro</a><br>
            <a href="index.php"> Home Page</a>
        </section>
    </main>
</body>
