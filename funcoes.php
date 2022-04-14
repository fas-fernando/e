<?php

// Mensagem de cadstro de Anfitrião
function cad_anfitriao ($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>
            $texto
          </div>";
}