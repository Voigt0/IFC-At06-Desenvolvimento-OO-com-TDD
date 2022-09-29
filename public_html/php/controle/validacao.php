<?php
$campo = $_GET['campo'];
$valor = $_GET['valor'];

// Verificando o campo nome
if ($campo == "nome") {
	
	if ($valor == "") {
		echo "Preencha o campo com seu nome";
	} elseif (strlen($valor) > 28) {
		echo "O nome deve ter no m�ximo 28 caracteres";				
	} elseif (strlen($valor) < 4) {
		echo "O nome deve ter no min�mo 4 caracteres";		
	} elseif (!preg_match('/^[a-z\d_]{4,28}$/i', $valor)) {
		echo "O nome deve conter somente letras e numeros.";
	} 

}

// Acentua��o
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>