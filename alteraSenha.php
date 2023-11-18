<?php
    include_once('include/componentes/cabecalho.php');
    if(!$_SESSION['logado']){
        header('location: loginUsuario.php');
    }
?>
<head>
    <link rel="stylesheet" href="./include/css/stylePerfilSenha.css">
    <title>Alterar Senha - Control</title>
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

        <div id="link">
            <ul>
               <a href="./perfilUsuario.php"> <li> Minha Conta</li> </a>
               <a href="./alteraSenha.php"><li>Altera Senha</li></a>
            </ul>
        </div>

        <div id="senha">
            <form action="include/logica/logica_usuario.php" method="post">
                <p> Sua Senha: <input name="senha" type="text"> </p>
                <p> Nova Senha: <input name="novaSenha" type="text"> </p>
                <p> Confirmar Senha: <input type="text" name="confSenha"> </p>
                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                <button id="alterarSenha" type="submit" name="alterarSenha" value="alterarSenha"> Alterar Senha </button>
            </form>
            
        </div>
    </div>
</body>