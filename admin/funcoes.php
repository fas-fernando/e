<?php

// FUNÇÃO PARA MENSAGENS
function mensagens ($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>
            $texto
          </div>";
}

// MANDAR O VALOR SEM CARACTERES
function limpaSiglas ($valor) {
  $valor = trim($valor);
  $valor = str_replace(".", "", $valor);
  $valor = str_replace(",", "", $valor);
  $valor = str_replace("-", "", $valor);
  $valor = str_replace("/", "", $valor);
  $valor = str_replace("(", "", $valor);
  $valor = str_replace(")", "", $valor);
  $valor = str_replace(" ", "", $valor);
  return $valor;
}

// LIMPAR O TEXTO PURO PARA EVITAR ATAQUES PELO INPUT
function limpaTexto($conexao, $texto_puro) {
  $texto = mysqli_real_escape_string($conexao, $texto_puro);
  $texto = htmlspecialchars($texto);
  return $texto;
}

// MOVE A FOTO PARA A PASTA CORRETA
function move_foto($vetor_foto) {

  $vtipo    = explode('/', $vetor_foto['type']);
  $tipo     = $vtipo[0] ?? '';
  $extensao = $vtipo[1] ?? '';

  if ((!$vetor_foto['error']) && ($vetor_foto['size'] <= 500000) && ($tipo == 'image')) {

    $nome_arquivo = date('Ymdhms') . "." . "$extensao";
    move_uploaded_file($vetor_foto['tmp_name'], 'img/' . $nome_arquivo );
    return $nome_arquivo;

  } else {

    return 0;

  }

}