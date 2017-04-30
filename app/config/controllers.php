<?php

require '../app/modules/auth/auth.controller.php';
require '../app/modules/paciente/paciente.controller.php';
require '../app/modules/historia/historia.controller.php';

$container['HomeController'] = function($c) {
    //$view = $c->get("view"); // retrieve the 'view' from the container
    return new HomeController($c);
};

$container['PacienteController'] = function($c) {
    //$view = $c->get("view"); // retrieve the 'view' from the container
    return new PacienteController($c);
};

$container['HistoriaController'] = function($c) {
    //$view = $c->get("view"); // retrieve the 'view' from the container
    return new HistoriaController($c);
};