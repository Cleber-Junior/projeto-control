<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require_once('conecta.php');
    require_once('funcoesUsuario.php');

    #CADASTAR USUARIO
    if(isset($_POST['Cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $cpf = $_POST['cpf'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $conf = '1';
        $img_nome = $_FILES['img']['name'];
        $img_tamanho = $_FILES['img']['size'];
        $img_temp = $_FILES['img']['tmp_name'];
        $array = array($email, $senha, $nome, $username, $cpf, $conf, $img_nome);
        $link = "https://sitetsi.000webhostapp.com/Projeto_Control/valida.php?email=$email&confirmacao=$conf";
        $retorno = cadastraUsuario($conexao, $array);
        if($retorno){
            $message = "Clique no link para validar seu Email: $link";
            $assunto = "Validação do Email";

            require "../../PHPMailer/src/PHPMailer.php";
            require "../../PHPMailer/src/SMTP.php";
            require "../../PHPMailer/src/Exception.php";
            $mail = new PHPMailer();

            $mail->isSMTP();

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;

            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ]
            ];

            $mail->Username = 'controlGamesCompany@gmail.com';
            $mail->Password = 'xptbanzfzksgwetr';

            $mail->setFrom('controlGamesCompany@gmail.com', 'Control');

            $mail->addAddress($email);

            $mail->CharSet = "utf-8";

            $mail->Subject = $assunto;

            $mail->Body = $message;

            $mail->isHTML(true);

            $mail->send();

        }

        if (!empty($img_nome)){
            
        //    if($limitar_tamanho=="sim" && ($img_tamanho > $tamanho_bytes))
          //  die("Arquivo deve ter o no máximo $tamanho_bytes bytes");
            
            //$ext = strrchr($img_nome,'.');
            //if (($limitar_ext == "sim") && !in_array($ext,$extensoes_validas))
            //die("Extensão de arquivo inválida para upload"); 
            
        //    if (move_uploaded_file($img_temp, "../img_user/$img_nome")) {
          //  echo " Upload do arquivo: ". $img_nome." foi concluído com sucesso";
            
          //  }
        }
            header('location:../../loginUsuario.php');
    }

    #LOGIN USUARIO
    if(isset($_POST['Entrar'])){ 
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $array = array($email);
        $usuario = logarUsuario($conexao, $array, $senha);

        if($usuario){
            session_start();
            $_SESSION['logado']  = true;
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['username'] = $usuario['username'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['img_usuario'] = $usuario['img_usuario'];
            $_SESSION['cpf'] = $usuario['cpf'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['senha'] = $senha;


            header('location:../../index.php');
        }
        else{
            header('location:../../loginUsuario.php');
        }
        
    }
    
    #LOGOUT USUARIO
    if(isset($_POST['Sair'])){
        session_start();
        session_destroy();
        header('location:../../index.php');
    }

    #LOGOUT ADM
    if(isset($_POST['sairAdmin'])){
        session_start();
        session_destroy();
        header('location:../../loginUsuario.php');
    }

    #EMAIL RECUPERAÇÃO
    if(isset($_POST['enviaEmail'])){
        $email = $_POST['email'];
        $chave = sha1(uniqid(mt_rand(), true));
        $array = array($chave, $email);
        $link = "https://sitetsi.000webhostapp.com/Projeto_Control/recuperar.php?email=$email&confirmacao=$chave";
        $cEmail = chamarEmail($conexao, $array);
        if($cEmail){
            $message = "Clique no link para redefinir sua nova senha: $link";
            $assunto = "Recupração de senha";

            require "../../PHPMailer/src/PHPMailer.php";
            require "../../PHPMailer/src/SMTP.php";
            require "../../PHPMailer/src/Exception.php";
            $mail = new PHPMailer();

            $mail->isSMTP();

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;

            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ]
            ];

            $mail->Username = 'controlGamesCompany@gmail.com';
            $mail->Password = 'xptbanzfzksgwetr';

            $mail->setFrom('controlGamesCompany@gmail.com', 'Control');

            $mail->addAddress($email);

            $mail->CharSet = "utf-8";

            $mail->Subject = $assunto;

            $mail->Body = $message;

            $mail->isHTML(true);

            $mail->send();

            header('location:../../loginUsuario.php');
        }
    }

    #NOVA SENHA
    if(isset($_POST['novaSenha'])){
        $novasenha = password_hash($_POST['novasenha'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $chave = '';
        $array = array($novaSenha, $chave, $email);
        novaSenha($conexao, $array);
        header('location:../../loginUsuario.php');
    }

    #EDITAR PERFIL
    if(isset($_POST['Editar'])){
        $codusuario = $_POST['id_usuario'];
        $nome = $_POST['nome'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $array = array($nome, $username, $email, $cpf, $codusuario);
        
        if(editarUsuario($conexao, $array)){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['nome'] = $nome;
            $_SESSION['cpf'] = $cpf;
            $_SESSION['email'] = $email;
            header('location:../../perfilUsuario.php');    
        }
      

        
    }

    #ALTERAR SENHA
    if(isset($_POST['alterarSenha'])){
        $codusuario = $_POST['id_usuario'];
        $novaSenha = password_hash($_POST['novaSenha'], PASSWORD_DEFAULT);
        $array = array($novaSenha, $codusuario);
        alterarSenha($conexao, $array,);
        header('location:../../loginUsuario.php');
    }

    #CONFIRMAÇÃO
    if(isset($_GET['confirmacao'])){
        $email = $_GET['email'];
        $array = array($email);
        validaEmail($conexao, $array);
        header('location:../../loginUsuario.php');
    }
?>