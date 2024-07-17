<?php
header('Access-Control-Allow-Origin: *');
require_once './modelo/ModeloVeiculo.php';
require_once './database/Conexao.php';
require_once './database/DaoVeiculo.php';
require_once './controle/ControleVeiculo.php';

$modulo = filter_input(INPUT_GET,'mod', FILTER_SANITIZE_STRING);
$acao = filter_input(INPUT_GET,'acao', FILTER_SANITIZE_STRING);

$modulo = 'Controle' . ucfirst($modulo);

if (class_exists($modulo)) {
    $obj = new $modulo();
    if(method_exists($modulo, $acao)){
        echo $obj->$acao();
    } else {
        echo 'No action...';
    }
} else {
    echo 'No module...';
}
