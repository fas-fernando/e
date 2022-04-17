<?php

// FUNÇÃO PARA MENSAGENS
function mensagens ($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>
            $texto
          </div>";
}