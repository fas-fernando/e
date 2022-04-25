<?php
    include 'conexao.php';
    include 'funcoes.php';
    
    $nome       = limpaTexto($conexao, $_POST['nome']);
    $cpf        = limpaTexto($conexao, limpaSiglas($_POST['cpf']));
    $nascimento = limpaTexto($conexao, limpaSiglas($_POST['nascimento']));
    $email      = limpaTexto($conexao, $_POST['email']);
    $cel        = limpaTexto($conexao, limpaSiglas($_POST['celular']));
    $user       = limpaTexto($conexao, $_POST['user']);
    $senha      = limpaTexto($conexao, $_POST['senha']);
    $foto       = $_FILES['foto'];
    $nome_foto  = move_foto($foto);

    if($nome_foto == 0) {
        $nome_foto = null;
    }

    $sql_bol = "INSERT INTO boleiro (nome, cpf, nascimento, email, celular, criado_em) VALUES ('$nome', '$cpf', '$nascimento', '$email', '$cel', now())";
    $res = mysqli_query($conexao, $sql_bol);

    $sql = "SELECT * FROM `boleiro` ORDER BY id DESC LIMIT 1";
    $res = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($res);
    $id = $dados['id'];

    $sql_user = "INSERT INTO `usuario` (nome, user, senha, nivel, tipo, `status`, foto, vinculo) VALUES ('$nome', '$user', md5('$senha'), '1', '1', 'A', '$nome_foto', '$id')";
    $res = mysqli_query($conexao, $sql_user);


    if ($res) {
        header("location: list_boleiro.php?cadastro=" . $res);
    }

?>