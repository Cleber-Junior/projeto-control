<?php

    require_once('conecta.php');
    require_once('funcoesJogos.php');
    
    #PESQUISAR
    if(isset($_POST['Buscar'])){
        $nome = strtoupper(($_POST['nome']));
        $array = array("%". $nome. "%");
        $jogos = pesquisaJogo($conexao, $array);
        header('location:../../pesquisa.php');
    }

?>