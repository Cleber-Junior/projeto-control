<?php
    session_start();
    include_once("include/logica/conecta.php");

?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./include/css/cabecalhoStyle.css">
</head>
    <body>
        <header>
            <nav class="navHead">
                <div class="logo">
                    <a href="index.php">
                        <img id="controle" src="include/imagens/logo(clara).svg" alt="">
                        <img id="titulo" src="include/imagens/control.svg" alt="Logo Control">
                    </a>
                </div>
                    <form id="pesquisa" action="include/logica/logica_jogos.php" method="post">
                        <p><input type="text" name="nome" id="nome" placeholder="Buscar">  
                        <button type="submit" name="Buscar"> <i class="fa-solid fa-magnifying-glass">  </i> </button> </p>
                    </form>
                    
                
                    <?php
                        if(isset($_SESSION['logado'])){
                            ?>
                            <div class="usuario">
                            <a href="carrinho.php"><img src="include/imagens/cart.svg" alt=""> </a>
                            <span></span>
                            <div class="logado">
                                <div class="perfil">
                                    <a href="perfilUsuario.php"><?php echo $_SESSION['username'] ?></a>
                                    <form action="include/logica/logica_usuario.php" method="post">
                                        <input class="logout" type="submit" name="Sair" id="Sair" value="Sair" >
                                    </form>
                                </div>
                                <p><img  id="userimg" src="<?php  echo 'include/img_user/' . $_SESSION['img_usuario']?>" width='60px' height='60px' alt=""></p>
                                
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="desclogado">
                                <a href="loginUsuario.php"><img src="include/imagens/cart.svg" alt=""></a>
                                <a href="loginUsuario.php" class="deslogado">Entrar</a>
                            </div>
                        <?php
                        }
                    ?>
            </div>
            </nav>
        </header>        
    </body>
    