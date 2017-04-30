<?php

class HistoriaController{

    protected $container;

    public function __construct($container){
        $this->container = $container;
    }

    public function index($request, $response, $args){
        $varTwig['module'] = 'historias';
        return $this->container->view->render($response, 'historias.html.twig',['module'=>$varTwig['module']]);
    }
}