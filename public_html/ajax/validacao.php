<?php
$campo = $_GET['campo'];
$valor = $_GET['valor'];

// Verificando o campo nome
if ($campo == "nome") {
	
	if ($valor == "") {
		echo "Insira seu nome";
	} elseif (strlen($valor) > 28) {
		echo "O nome deve ter no máximo 28 caracteres";				
	} elseif (strlen($valor) < 4) {
		echo "O nome deve ter no minímo 4 caracteres";		
	} elseif (!preg_match('/^[a-z\d_]{4,28}$/i', $valor)) {
		echo "O nome deve conter somente letras e numeros.";
	} 
}
?> 