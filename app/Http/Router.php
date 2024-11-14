<?php

namespace App\Http;
use \Closure;
use \Exception;

class Router{

    /**
     * URL COMPLETA DO PROJECTO (RAIZ)
     * @var string
     */
    private $url = '';

    /**
     * PREFIXO DE TODAS AS ROTAS
     * @var string
     */
    private $prefix = '';

    /**
     * INDECE DE ROTAS
     * @var array
     */
    private $routes = [];

    /**
     * INSTANCIA DE REQUEST
     * @var request
     */
    private $request;

    /**
     * METODO RESPONSAVEL POR INICIAR A CLASSE
     * @param string
     */
    public function __construct($url){
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * METODO RESPONSAVEL POR DEFINIR O PREFIXO DAS ROTAS
     */
    private function setPrefix(){
        // INFORMACOES DA URL ATUAL
        $parseUrl = parse_url($this->url);

        // DEFINE O PREFIXO
        $this->prefix = $parseUrl['path'] ?? '';
        
    }

    /**
     * METODO RESPONSAVEL POR ADICIONAR UMA ROTA NA CLASSE
     * @param string
     * @param string
     * @param array
     */
    private function addRoute($method,$route,$params = []){

        // VALIDACAO DOS PARAMETROS
        foreach($params as $key=>$value){
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        // PADRAO DE VALIDACAO DA URL
        $patternRoute = '/^'.str_replace('/','\/',$route).'$/';

        //ADICIONA A ROTA DENTRO DA CLASSE
        $this->routes[$patternRoute][$method] = $params;
        
    }

    /**
     * METODO RESPONSAVEL POR DEFINIR UMA ROTA DE GET
     * @param string
     * @param array
     */
    public function get($route,$params = []){
        return $this->addRoute('GET',$route,$params);
    }
    /**
     * METODO RESPONSAVEL POR DEFINIR UMA ROTA DE POST
     * @param string
     * @param array
     */
    public function post($route,$params = []){
        return $this->addRoute('POST',$route,$params);
    }

    /**
     * METODO RESPONSAVEL POR DEFINIR UMA ROTA DE PUT
     * @param string
     * @param array
     */
    public function put($route,$params = []){
        return $this->addRoute('PUT',$route,$params);
    }

    /**
     * METODO RESPONSAVEL POR DEFINIR UMA ROTA DE DELETE
     * @param string
     * @param array
     */
    public function delete($route,$params = []){
        return $this->addRoute('DELETE',$route,$params);
    }

    /**
     * METODO RESPONSAVEL POR RETORNAR A URI DESCONSEDERANDO O PREFIXO
     * @param string
     */
    private function getUri(){
        // URI DA REQUEST
        $uri = $this->request->getUri();

        // FATIA A URI COM O PREFIXO
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

        // RETORNA A URI SEM PREFIXO
        return end($xUri);
        //
    }
    /**
     * METODO RESPONSAVEL POR RETORNAR DADOS DA ROTA ATUAL
     * @param array
     */
    private function getRoute(){
        // URI
        $uri = $this->getUri();
        
        // METODO
        $httpMethod = $this->request->getHttpMethod();

        // VALIDA AS ROTAS
        foreach ($this->routes as $patternRoute => $methods) {
            // VERIFICA SE A URI BATE COM O PADRAO
            if (preg_match($patternRoute, $uri)) {
                // VERIFICA O METODO
                if($methods[$httpMethod]){
                    // RETORNO DOS PARAMETROS DA ROTA
                    return  $methods[$httpMethod];

                }
                // METODO NAO PERMITIDO/DEFINIDO
                throw new Exception("Metodo nao permitido" , 405);
            }
        }

        // URL NAO ENCONTRADA
        throw new Exception("URL não encontrada", 404);
         
    }

    /**
     * METODO RESPONSAVEL POR EXECUTAR A ROTA ATUAL
     * @return Response
     */
    public function run(){
        try{
            //throw new Exception("pagina nao encontrada", 404);
            // OBTEM A ROTA ATUAL
            $route = $this->getRoute();

            // VERIFICA O CONTROLADOR
            if(!isset($route['controller'])){
                throw new Exception("A URL nao pode ser processada", 500);
            }

            // ARGUMENTOS DA FUNCAO
            $args = [];

            // RETORNA A EXECUCAO DA FUNCAO
            return call_user_func_array($route['controller'], $args);
            /*echo "<pre>";
            print_r($route);
            echo  "</pre>"; exit;
            */ 
        }catch(Exception $e){
            return new Response($e->getCode(),$e->getMessage());
        }
    }


}

/**
 * 
 */