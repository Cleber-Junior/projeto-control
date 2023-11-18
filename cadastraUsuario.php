<title> Login </title>
</head>
<body>
    <main> 
        <h1> Cadastrar </h1>
        <section>
            <form action="include/logica/logica_usuario.php" method="post" enctype="multipart/form-data">
                <p><label for="nome">Nome </label><input type="text" name="nome" id="nome"></p>
                <p><label for="username">Username </label><input type="text" name="username" id="username"></p>
                <p><label for="email">Email </label><input type="text" name="email" id="email"></p>
                <p><label for="senha">Senha </label><input type="text" name="senha" id="senha"></p>           
                <p><label for="cpf">Cpf </label><input type="text" name="cpf" id="cpf"></p>
                <p><label for="img">Imagem Perfil <input type="file" name="img" id="img"></label></p>
                <p><button type="submit" id='Cadastrar' name='Cadastrar' value="Cadastrar"> Cadastrar </button></p>
            </form>        
        </section>
    </main>
</body>
