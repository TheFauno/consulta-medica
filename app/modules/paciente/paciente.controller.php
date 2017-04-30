<?php

class PacienteController{

    protected $container;

    public function __construct($container) {
        $this->container = $container;
    }
   
    public function index($request, $response, $args) {
        $varTwig['title'] = 'inicio - pacientes';
        $varTwig['module'] = 'pacientes';
        //$paciente = new Paciente();
        return $this->container->view->render($response, 'pacientes.html.twig', ['title'=>$varTwig['title'], 'module'=>$varTwig['module']]);
    }

    public function insert($request, $response, $args){
        return $this->container->view->render($response, 'registrar.paciente.html.twig');
    }

}