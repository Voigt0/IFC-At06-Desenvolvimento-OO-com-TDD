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
	} 
}

// Verificando o campo de CRM
if($campo == "crm"){
	if($valor == ""){
		echo "Insira o CRM";
	}
}

// Verificando o campo especializacao
if($campo == "especializacao"){
	if($valor == ""){
		echo "Insira a especialização";
	}
}

// Verificando o telefone
if($campo == "telefone"){
	if($valor == ""){
		echo "Insira a telefone";
	} else if(strlen($valor)<12){
		echo "O telefone deve ser DDD 9 9999-9999";
	} 
}




// Verificando o campo email
if ($campo == "email-cad") {
	if($valor == ""){
		echo "Insira o email";
	} else if(!mb_eregi("^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$", $valor)) {
		echo "Preencha com um email válido";
	}
}

if($campo == "senha-cad"){
	if($valor == ""){
		echo "Insira a senha";
	} else if(strlen($valor)>20){
		echo "A senha deve ter no máximo 20 caracteres";
	} else if(strlen($valor)< 8){
		echo "A senha deve ter no minímo 8 caracteres";
	}
}


if($campo == "confSenha"){
	if($valor == ""){
		echo "Insira a senha";
	} else if(strlen($valor)>20){
		echo "A senha deve ter no máximo 20 caracteres";
	} else if(strlen($valor)< 8){
		echo "A senha deve ter no minímo 8 caracteres";
	}
}
?> 

