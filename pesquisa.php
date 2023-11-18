<?php
    include_once('include/componentes/cabecalho.php');
    include_once('include/logica/conecta.php');
    include_once('include/logica/funcoesJogos.php');
?>

    <title> Pesquisa - Control </title>
</head>
<body>
    <main>
        <?php
            $array = [];
            $jogos = pesquisaJogo($conexao, $array);
            if(empty($jogos)){
                ?>
                <section> Não temos este jogo em estoque </section>
            <?php

            }else{
                foreach ($jogos as $jogo) {
                    ?>
                    <div>
                        <section>
                            <form action="">
                                <p><img src="include/img_jogos/<?php echo $jogo['img_jogo'] ?>" alt=""></p>
                                <p><input type="text" value="<?php echo $jogo['nome_jogo'] ?>"></p>
                                <p><input type="button" value="<?php echo $jogo['preco_jogo']?>"></p>
                            </form>
                        </section>
                    </div>
                    <?php
                }
            }

        ?>
    </main>
</body>