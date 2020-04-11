<?php
	header('Content-Type: application/json; charset=utf-8');  

    $json = file_get_contents('php://input');
    
	if ($obj = json_decode($json)) 
    {
        if 	( isset ( $obj->nome ) && isset ( $obj->idade ) && isset ( $obj->salario ) ) 
        {
            converteJSON(200,true,$obj->nome,$obj->idade,$obj->salario);
        }
        else
        {
            converteJSON(400,false,null,null,null);
        }				
    }
    		
	function converteJSON($status,$status_message,$aux_nome,$aux_idade,$aux_salario) {
		
		header('Content-Type: application/json');
		$response['status']=$status;
		$response['status_message']=$status_message;

		$response['nome_pessoa']=$aux_nome;
		$response['idade_pessoa']=$aux_idade;
		$response['salario_pessoa']=$aux_salario;

		echo json_encode($response);
	}

?>