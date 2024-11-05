<?php

namespace App\Http;

class Request{


    /**
     * METODO HTTP DA REQUISICAO
     * @var string
     */
    private $httpMethod;

    /**
     * URI DA PAGINA
     * @var string
     */
    private $uri;

    /**
     * PARAMETROS DA URL ($_GET)
     * @var array
     */
    private $queryParams = [];

    /**
     * VARIAVEIS RECEBIDAS NO POST DA PAGINA ($_POST)
     *  @var  array
     */
    private $postVar = [];

    /**
     * CABECALHO DA REQUISICAO
     * @var  array
     */
    private  $headers = [];

    /**
     * CONSTRUTOR DA CLASSE
     * 
     */
    public function __construct(){
        $this->queryParams = $_GET ?? [];
        $this->postVar = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }

    /**
     * METODO RESPONSAVEL POR RETORNAR O METODO DA REQUISICAO
     * @return string
     */
    public function getHttpMethod(){
        return $this->httpMethod;
    }

    /**
     * METODO RESPONSAVEL POR RETORNAR A URI DA REQUISICAO
     * @return array
     */
    public function getUri(){
        return $this->uri;
    }
    
    /**
     * METODO RESPONSAVEL POR RETORNAR O METODO DA REQUISICAO
     * @return array
     */
    public function getHeaders(){
        return $this->headers;
    }

    /**
     * METODO RESPONSAVEL POR RETORNAR OS PARAMETROS DA URL DA REQUISICAO
     * @return array
     */
    public function getQueryParams(){
        return $this->queryParams;
    }

    /**
     * METODO RESPONSAVEL POR RETORNAR AS VARIAVEIS POST DA REQUISICAO
     * @return array
     */
    public function getPostVars(){
        return $this->postVar;
    }


}