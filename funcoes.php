<?php

// FUNÇÃO PARA MENSAGENS
function mensagens ($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>
            $texto
          </div>";
}

// MANDAR O VALOR LIMPO PARA O BANCO DE DADOS
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