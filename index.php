<?php
	header('Content-Type: application/json; charset=utf-8');  

    $json = file_get_contents('php://input');
    
	if ($obj = json_decode($json)) 
    {
        if 	( isset ( $obj->nome ) && isset ( $obj->idade ) && isset ( $obj->salario ) ) 
        {
            //Aqui você trata a requisição e responde via JSON
            //Pode, por exemplo, consultar ou gravar no Banco de Dados etc

            //Respondendo em formato JSON com código 200(como aceita a requisição) e com true como status_message informando sucesso na requisição/solicitação
            converteJSON(200,true,$obj->nome,$obj->idade,$obj->salario);
        }
        else
        {
            //Respondendo com código 400(como NÃO aceita a requisição) e com false como status_message   

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