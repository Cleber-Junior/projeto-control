<?php
    
    include_once('include/componentes/cabecalho.php');
    if(!$_SESSION['logado']){
        header('location: loginUsuario.php');
    }
?>
<head>
    <link rel="stylesheet" href="./include/css/stylePerfil.css">
</head>
<body>
    <ul id="navegacao">
        <li><a href="">Biblioteca</a></li>
        <li><a class="" href="">Lista de Desejos</a></li>
        <li><a class="Mconta" href="perfilUsuario.php">Minha Conta</a></li>
        <li><a href="">Historico de Compras</a></li>
    </ul>
        
    <div id="dadosUser"> 
        <div class="areaUm">
            <img src="<?php  echo 'include/img_user/' . $_SESSION['img_usuario']?>" width='150px' height='150px' alt="">
            <p> <?php echo $_SESSION['username'] ?> </p>
            <p> <?php echo $_SESSION['email'] ?> </p>
        </div>

        <div id="areaDois">
            <ul>
               <a href="./perfilUsuario.php"> <li> Minha Conta</li> </a>
               <a href="./alteraSenha.php"><li>Altera Senha</li></a>
            </ul>
        </div>
        
        <div class="areaTres">
            <form action="./include/logica/logica_usuario.php" method="post">
                <p> Nome Completo: <input name="nome" type="text" value="<?php echo $_SESSION['nome'] ?>"> </p>
                <p> Nome de Exibição: <input name="username" type="text" value="<?php echo $_SESSION['username'] ?>"> </p>
                <p> Email Cadastrado: <input name="email" type="text" value="<?php echo $_SESSION['email'] ?>"> </p>
                <p> CPF: <input type="text" name="cpf" value="<?php echo $_SESSION['cpf'] ?>"> </p>
                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                <button id="altera" type="submit" name="Editar" value="Editar"> Salvar Alterações </button>
            </form>
        </div>
    </div>
</body>