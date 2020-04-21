<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/API_Controller.php';


class InstituicaoEnsinoSuperiorController extends API_Controller
{
    public function __construct() {
        parent::__construct();
    }
  
	/**
	 * @api {get} instituicoes-ensino-superior/ Requisitar todas Instituições de Ensino Superior registradas.
	 * @apiName getAll
	 * @apiGroup Instituições de Ensino Superior
	 * @apiSuccess {Number} codIes   Identificador único da Instituição de Ensino Superior.
	 * @apiSuccess {String} nome   Nome da Instituição de Ensino Superior.
	 * @apiSuccess {String} abreviatura  Sigla da Instituição de Ensino Superior.
	 * @apiExample {curl} Exemplo:
	 *     curl -i http://dev.api.ppcchoice.ufes.br/instituicoes-ensino-superior/
	 * @apiSuccessExample {JSON} Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	"status": true,
	 *	"result": [
	 *	{
	*		"codIes": 8,
	*		"nome": "Harvard",
	*		"abreviatura": "HAR"
	 *		},
	 *		{
	 *		"codIes": 573,
	 *		"nome": "Universidade Federal do Espírito Santo",
	 *		"abreviatura": "UFES"
	 *		}
	 *	]
	 * }
	 * @apiError UserNotFound Nenhuma Instituição de Ensino Superior cadastrada.
	 * @apiSampleRequest instituicoes-ensino-superior/
	 * @apiErrorExample {JSON} Error-Response:
	 * HTTP/1.1 404 OK
	 * {
	 *	"status": false,
	 *	"message": "Instituicao de Ensino Superior não encontrada!"
	 * }
	 */
    public function getAll()
    {
		header("Access-Controll-Allow-Origin: *");

		$this->_apiConfig(array(
				'methods' => array('GET'),
			)
		);
		
        $ies = $this->entity_manager->getRepository('Entities\InstituicaoEnsinoSuperior')->findAll();
        
        $result = $this->doctrine_to_array($ies,TRUE);

		$this->api_return(array(
			'status' => TRUE,
			'result' => $result,
		), 200);
	}


	/**
	 * @api {get} instituicoes-ensino-superior/:codIes Requisitar dados de uma Instituição de Ensino Superior específica.
	 * @apiName getById
	 * @apiGroup Instituições de Ensino Superior
	 *
	 * @apiParam {Number} codIes Identificador único da Instituição de Ensino Superior requerida.
	 *
	 * @apiSuccess {String} nome   Nome da Instituição de Ensino Superior.
	 * @apiSuccess {String} abreviatura  Sigla da Instituição de Ensino Superior.
	 * @apiExample {curl} Exemplo:
	 *     curl -i http://dev.api.ppcchoice.ufes.br/instituicoes-ensino-superior/573
	 * @apiSuccessExample {JSON} Success-Response:
	 * HTTP/1.1 200 OK
	 * {
	 *	"status": true,
	 *	"result": {
	 *	"codIes": 573,
	 *	"nome": "Universidade Federal do Espírito Santo",
	 *	"abreviatura": "UFES"
	 * }
	 * @apiError UserNotFound O <code>codIes</code> não corresponde a nenhuma Instituição de Ensino Superior cadastrada.
	 * @apiSampleRequest instituicoes-ensino-superior/:codIes
	 * @apiErrorExample {JSON} Error-Response:
	 * HTTP/1.1 404 OK
	 * {
	 *	"status": false,
	 *	"message": "Instituicao de Ensino Superior não encontrada!"
	 * }
	 */
    public function getById($codIes)
    {   
        header("Access-Controll-Allow-Origin: *");

		$this->_apiConfig(array(
				'methods' => array('GET'),
			)
		);
		
		$ies = $this->entity_manager->find('Entities\InstituicaoEnsinoSuperior',$codIes);
		
		if ( !is_null($ies) ) {
			$result = $this->doctrine_to_array($ies,TRUE);	
			$this->api_return(array(
				'status' => TRUE,
				'result' => $result,
			), 200);
		} else {
			$this->api_return(array(
				'status' => FALSE,
				'message' => 'Instituicao de Ensino Superior não encontrada!',
			), 404);
		}

	}
	
	/**
	 * @api {post} instituicoes-ensino-superior/ Criar uma Instituição de Ensino Superior.
	 * @apiName create
	 * @apiGroup Instituições de Ensino Superior
	 * @apiSuccess {Number} codIes   Identificador único da Instituição de Ensino Superior.
	 * @apiSuccess {String} nome   Nome da Instituição de Ensino Superior.
	 * @apiSuccess {String} abreviatura  Sigla da Instituição de Ensino Superior.
	 * @apiExample {curl} Exemplo:
	 *     curl -i http://dev.api.ppcchoice.ufes.br/instituicoes-ensino-superior/
	 * @apiParamExample {json} Request-Example:
     * {
	 * 	 "codIes": 111,
     *   "nome": "Nova Instituição de Ensino Superior",
     *	 "abreviatura": "NIES"
     * }
	 * @apiSuccessExample {JSON} Success-Response:
	 * HTTP/1.1 200 OK
	* {
	* 	"status": true,
	* 	"result": "Instituição de Ensino Superior criada com Sucesso!"
	* {
	
	 * @apiError IesNotFound Não foi possível criar uma nova Instituição de Ensino Superior.
	 * @apiSampleRequest instituicoes-ensino-superior/
	 * @apiErrorExample {JSON} Error-Response:
	 * HTTP/1.1 404 OK
	 * {
	 *	"status": false,
	 *	"message": "Campo Obrigatorio Não Encontrado!"
	 * }
	 */	
	public function create()
    {
		header("Access-Controll-Allow-Origin: *");

        $this->_apiConfig(array(
            'methods' => array('POST'),
            )
        );
 
        $payload = json_decode(file_get_contents('php://input'),TRUE);
 
        if ( isset($payload['nome']) && isset($payload['codIes']) && isset($payload['abreviatura'])){
           
			$ies = new \Entities\InstituicaoEnsinoSuperior;
            $ies->setCodIes($payload['codIes']);
            $ies->setNome($payload['nome']);
            $ies->setAbreviatura($payload['abreviatura']);
		   
			$valida = $this->validator->validate($ies);

			if ( $valida->count() ){		
				$msg = $valida->messageArray();
	
				$this->api_return(array(
					'status' => FALSE,
					'message' => $msg,
				), 400);	
			}else {
				try {
					$this->entity_manager->persist($ies);
					$this->entity_manager->flush();
	 
					$this->api_return(array(
						'status' => TRUE,
						'result' => 'Instituicao de Ensino Superior Criada com Sucesso!',
					), 200);
				} catch (\Exception $e) {
					$msg = $e->getMessage();
					$this->api_return(array(
						'status' => FALSE,
						'message' => $msg,
					), 400);
				}	
			} 
 
        } else {
            $this->api_return(array(
                'status' => FALSE,
                'message' => 'Campo Obrigatorio não encontrado!',
            ), 400);
        }
    }
   
	/**
     * @api {put} instituicoes-ensino-superior/:codIes Atualizar Instituição de Ensino Superior.
     * @apiName update
     * @apiGroup Instituições de Ensino Superior
     * @apiParam {Number} codIes Código da Instituição de Ensino Superior.
     * @apiError  (Campo obrigatorio não encontrado 400) BadRequest Algum campo obrigatório não foi inserido.
     * @apiError  (Instituição de Ensino Superior não encontrado 404) Instituição de Ensino Superior não encontrada.
     * @apiParamExample {json} Request-Example:
     *     {
     *         "nome" : "Universidade Federal de Nova Venécia",
	 *         "abreviatura" : "UFNV"
     *     }
     *  @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": true,
     *       "message": "Instituição de Ensino Superior atualizada com sucesso"
     *     }
     */
	public function update($codIes)
    {
		header("Access-Controll-Allow-Origin: *");

        $this->_apiConfig(array(
            'methods' => array('PUT'),
            )
		);
		
        $ies = $this->entity_manager->find('Entities\InstituicaoEnsinoSuperior',$codIes);
        $payload = json_decode(file_get_contents('php://input'),TRUE);
		
        if(!is_null($ies) && !empty($payload))
        {            
			if(isset($payload['nome']))
			{
				$ies->setNome($payload['nome']);
			}
			if(isset($payload['abreviatura']))
			{
				$ies->setAbreviatura($payload['abreviatura']);
			}
			
			$valida = $this->validator->validate($ies);

			if ( $valida->count() ){
		
				$msg = $valida->messageArray();
	
				$this->api_return(array(
					'status' => FALSE,
					'message' => $msg,
				), 400);	
			} else {
				try {
					$this->entity_manager->merge($ies);
					$this->entity_manager->flush();
					$this->api_return(array(
						'status' => TRUE,
						'message' => 'Instituição de Ensino Superior atualizada com sucesso!'
					), 200);
					
				} catch (\Exception $e) {
					$msg = $e->getMessage();
					$this->api_return(array(
						'status' => FALSE,
						'message' => $msg
					), 400);
				}	
			}

        }elseif(empty($payload))
        {
            $this->api_return(array(
                'status' => FALSE,
                'message' => 'Corpo da Requisição vazio',
            ), 400);
        }else{
            $this->api_return(array(
                'status' => FALSE,
                'message' => 'Instituição de Ensino Superior não encontrada!',
            ), 404);
        }
	}
	
	/**
     * @api {delete} instituicoes-ensino-superior/:codIes Deletar Instituição de Ensino Superior.
     * @apiName delete
     * @apiGroup Instituições de Ensino Superior
     * @apiParam {Number} codIes Código da Instituição de Ensino Superior.
     * @apiError  (Campo não encontrado 400) NotFound Instituição de Ensino Superior não encontrada.
     *  @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": true,
     *       "message": "Instituição de Ensino Superior removida com sucesso"
     *     }
     */
	public function delete($codIes)
	{
		header("Access-Controll-Allow-Origin: *");

		$this->_apiConfig(array(
				'methods' => array('DELETE'),
			)
		);
		
		$ies = $this->entity_manager->find('Entities\InstituicaoEnsinoSuperior',$codIes);
		
		if(!is_null($ies))
		{
			try {
				$this->entity_manager->remove($ies);
				$this->entity_manager->flush();
				$this->api_return(array(
					'status' => TRUE,
					'message' => 'Instituição de Ensino Superior removida com sucesso!'
				), 200);
				
			} catch (\Exception $e) {
				$msg = $e->getMessage();
				$this->api_return(array(
					'status' => FALSE,
					'message' => $msg
				), 400);
			}
		}else{
			$this->api_return(array(
                'status' => FALSE,
                'message' => 'Instituição de Ensino Superior não encontrada!',
            ), 404);
		}
	}
}