<?php

    function pesquisaJogo($conexao, $array){
        try{
             $query = $conexao->prepare("select * from jogos where upper(nome_jogo) like ?");
            if($query->execute($array)){
                $jogos = $query->fetchAll();
                if($jogos){
                    return $jogos;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

?>