<?php

        session_start();
        include("conexao.php");
        
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
        $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));

        $sql = "select count(*) as total from usuario where usuario = '$usuario'";

        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row['total'] == 1) {
            
            $_SESSION['usuario_existe'] = true;
            header('Location: cadastro.php');
            exit;
        }

        $sql = "insert into usuario (nome, usuario, senha, data_cadastro) values ('$nome', '$usuario', '$senha', NOW())";

        if($conexao->query($sql) === TRUE){
            $_SESSION['status_cadastro'] = true;        
        }

        $conexao->close();

        header('Location: cadastro.php');
        exit;
?>