<?php

namespace App\Http;

class Response{

    /**
     * CODIGO DO STATUS HTTP
     * @var integer
     */
    private $httpCode = 200;

    /**
     * CABECALHO DO RESPONSE
     * @var array
     */
    private $headers = [];

    /**
     * TIPO DE CONTEUDOQUE ESTA SENDO RETORNADO
     * @var string
     */
    private $contentType  = 'text/html';


    /**
     * CONTEUDO DO RESPONSE
     * @var mixed
     */
    private $content;

    /**
     * METODO RESPONSAVEL POR INICIAR E DEFINIR OS VALORES DO RESPONSE
     * @param integer
     * @param mixed
     * @param string
     */
    public function __construct($httpCode,$content,$contentType = 'text/html'){
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    /** 
     * METODO RESPONSAVEL POR ALTERAR O CONTENT TYPE DO RESPONSE
     * @param string
     */
    public function setContentType($contentType){

        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);

    }

    /**
     * METODO RESPONSAVEL POR ADICIONAR UM REGISTRO NO CABECALHO DO RESPONSE
     * @param string
     * @param string
     */
    public function addHeader($key,$value){
        $this->headers[$key] = $value;
    }

    private function sendHeader(){
        //STATUS
        http_response_code($this->httpCode);

        //ENVIAR HEADERS
        foreach ($this->headers as $key => $value) {
            header($key.': '.$value);
        }
    }

    /**
     * METODO RESPONSAVEL POR ENVIAR A RESPOSTA PARA O USUARIO
     */
    public function sendResponse(){
        // ENVIAR OS CABECALHOS
        $this->sendHeader();

        // IMPRIME O CONTEUDO
        switch ($this->contentType){
            case 'text/html':
                echo $this->content;
                exit;
        }
    }
}