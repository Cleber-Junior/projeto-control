<?php

    function cadastraUsuario($conexao, $array){
        try{
            $query = $conexao->prepare("insert into usuario (email, senha, nome, username, cpf, confirmacao, img_usuario) values (?, ?, ?, ?, ?, ?, ?)");
            $resultado = $query->execute($array);


            return $resultado;
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    function logarUsuario($conexao, $array, $senha){
        try{
            $query = $conexao->prepare("select * from usuario where email=? and confirmacao= 1");
            if($query->execute($array)){
                $usuario = $query->fetch();
                if($usuario){
                    if(password_verify($senha, $usuario['senha'])){
                        return $usuario;
                    }else{
                        return false;
                    }
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    function logarAdmin($conexao, $arrayAdm, $senhaAdm){
        try{
            $query = $conexao->prepare('select * from admin where codAdmin = ?');
            if($query->execute($arrayAdm)){
                $admin = $query->fetch();
                if($admin){
                    if($admin['senha'] == $senhaAdm){
                        return $admin;
                    }else{
                        return false;
                    }
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

    function chamarEmail($conexao, $array){
        try{
            $query = $conexao->prepare("update usuario set chave= ? where email= ?");
            $resultado = $query->execute($array);
            return $resultado;
        
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    function novaSenha($conexao, $array){
        try{
            $query = $conexao->prepare('update usuario set senha= ?, chave= ? where email= ?');
            $resultado = $query->execute($array);
            return $resultado;
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    function editarUsuario($conexao, $array){
        try {
            $query = $conexao->prepare('update usuario set nome= ?, username= ?, email= ?, cpf= ? where id_usuario= ?');
            $resultado = $query->execute($array);
            return $resultado;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function alterarSenha($conexao, $array){
        try {
            $query = $conexao->prepare('update usuario set senha= ? where id_usuario= ?');
            $resultado = $query->execute($array);
            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function validaEmail($conexao, $array){
        $query = $conexao->prepare('select confirmacao from usuario where email= ? and confirmacao= 0');
        $conf = $query->execute($email);
        if($conf){
            try{
                $query = $conexao->prepare('update usuario set confirmacao = 1 where email= ?');
                $val = $query->execute($array);
                return $$val;
            }catch(PDOException $e){
                echo 'Error: ' . $e->getMessage();
            }
        }else{
            echo 'Validação não confirmada';
        }
    }
?>