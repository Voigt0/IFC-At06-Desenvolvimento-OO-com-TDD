<?php
// Pega os elementos enviados do input
$input = $_GET['input'];
$value = $_GET['value'];


// Verificação dos valores inseridos:

	// Verificando o input de Nome:
	if ($input == "nome") {
		if ($value == "") {
			echo "Insira seu nome";
		} else if (strlen($value) > 28) {
			echo "O nome deve ter no máximo 28 caracteres";				
		} else if (strlen($value) < 4) {
			echo "O nome deve ter no minímo 4 caracteres";		
		} 
	}

	// Verificando o input de CRM
	if($input == "crm"){
		if($value == ""){
			echo "Insira o CRM";
		}
	}


	// Verificando o input de Especialização
	if($input == "especializacao"){
		if($value == ""){
			echo "Insira a especialização";
		}
	}


	// Verificando o input de Telefone
	if($input == "telefone"){
		if($value == ""){
			echo "Insira a telefone";
		} else if(strlen($value)<12){
			echo "O telefone deve ser DDD 9 9999-9999";
		} 
	}


	// Verificando o input de Email
	if ($input == "email-cad") {
		if($value == ""){
			echo "Insira o email";
		} else if(!mb_eregi("^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$", $value)) {
			echo "Preencha com um email válido";
		}
	}


	// Verificando o input de Senha
	if($input == "senha-cad"){
		if($value == ""){
			echo "Insira a senha";
		} else if(strlen($value)>20){
			echo "A senha deve ter no máximo 20 caracteres";
		} else if(strlen($value)< 8){
			echo "A senha deve ter no minímo 8 caracteres";
		}
	}
	

	// Verificando o input de Conferencia de Senha
	if($input == "confSenha"){
		if($value == ""){
			echo "Insira a senha";
		} else if(strlen($value)>20){
			echo "A senha deve ter no máximo 20 caracteres";
		} else if(strlen($value)< 8){
			echo "A senha deve ter no minímo 8 caracteres";
		}
	}
?> 

