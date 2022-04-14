<?php

$conexao = require '../conexao.php';

$nome = $_POST['nome_anfi'];

$sql = "INSERT INTO anfitriao(`nome`, `tipo`, `status`, `criado_em`) VALUES ('$nome', 'F', 'S', now())";

$res = mysqli_query($conexao, $sql);
