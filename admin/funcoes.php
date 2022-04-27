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

function alterarData($datas) {
  $dt = str_replace('/', '-', $datas); // 04/07/1991 => 04-07-1991

  $dt_explode = explode('-', $dt); // [04, 07, 1991]

  $dt_atual = $dt_explode[2] . '-' . $dt_explode[1] . '-' . $dt_explode[0];

  return $dt_atual; // 1991-07-04
}

function geraQrCode() {
  $data = 'https://api.whatsapp.com/send?phone=5511996466498';
  $width = 250;
  $height = 250;

  $url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$data}";
  return $output['img'] = $url;

}