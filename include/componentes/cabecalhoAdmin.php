<!DOCTYPE html>
<head>  
    <link rel="stylesheet" href="./include/css/adminStyle.css">
    </head> 

    <body>
    <header>
        <nav>
            <div class="logo">
                <img class="icon" src="include/imagens/logo(clara).svg" alt="">
                <img class="titulo" src="include/imagens/control.svg" alt="">
            </div>

            <div class="financiamento">
                <img src="include/imagens/document.svg"  alt="">
                <a href="#" class="finan">Financiamento</a>
            </div>

            <div class="jogos">
                <img src="include/imagens/control_icon.svg" alt="">
                <a href="#" class="jogo">Jogos</a>
            </div>

            <div class="adm">
                <h3 class="logado">Administrador</h3>
                <form action="include/logica/logica_usuario.php" method="post">
                    <input class="logout" type="submit" name="sairAdmin" id="sairAdmin" value="Sair">
                </form>
            </div>
        </nav>
    </header>
    </body>