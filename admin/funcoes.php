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