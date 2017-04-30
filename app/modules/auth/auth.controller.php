<?php

class HomeController{

    protected $container;

    public function __construct($container) {
        $this->container = $container;
    }
   
    public function index($request, $response, $args) {
        return $this->container->view->render($response, 'inicio.html.twig');
    }

    public function login($request, $response, $args){
        $data = $request->getParsedBody();
        $url = $this->container->router->pathFor('inicio-paciente');

        $session = $this->container->session;
        $session['name'] = 'sesion';
        $session['autorefresh'] = 'true';
        $session['lifetime'] = '1 hour';
        $id = $session->id();
        
        return $response->withRedirect($url);
    }
}