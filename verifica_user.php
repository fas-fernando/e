<?php

    include 'admin/conexao.php';
    include 'admin/funcoes.php';

    if(isset($_POST['userName'])) {

        $user = limpaTexto($conexao, $_POST['userName']);
        $pass = limpaTexto($conexao, md5($_POST['password']));
    
        $sql = "SELECT * FROM `usuario` WHERE user = '$user' and senha = '$pass'";
        

        if($res = mysqli_query($conexao, $sql)) {

            $num_registro = mysqli_num_rows($res);

            if ($num_registro == 1) {

                $dados = mysqli_fetch_assoc($res);

                if (($user == $dados['user']) && ($pass == $dados['senha'])) {

                    session_start();
                    $_SESSION['login']   = $dados['nome'];
                    $_SESSION['id']      = $dados['id'];
                    $_SESSION['nivel']   = $dados['nivel'];
                    $_SESSION['vinculo']   = $dados['vinculo'];
                    header('location: admin');

                } 

            } else {

                mensagens('Usuário ou Senha invalidos. Por favor tente novamente', 'danger');

            }

        } else {

            mensagens('Estamos com problemas na comunição, nos desculpe pelo transtorno', 'danger');

        }



        

    }
?>