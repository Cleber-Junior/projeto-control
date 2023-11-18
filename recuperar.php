<?php
    $email = $_GET['email'];
?>

<title> Nova Senha - Control</title>
</head>
<body>
    <main>
        <h1> Nova Senha</h1>
        <section>
            <form action="include/logica/logica_usuario.php" method="post">
                <p>Digite sua nova senha no campo abaixo:</p>
                <p><input type="hidden" name="email" id="email" value="<?php echo $email ?>"></p>
                <p><input type="text" name="novasenha" id="novasenha" placeholder="Digite sua nova senha"></p>
                <p><input type="submit" name="novaSenha" id="novaSenha" value="novaSenha"></p>
            </form>
        </section>
    </main>
</body>

