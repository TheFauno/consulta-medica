<?php

$app->group('/pacientes', function () {

$this->get('/inicio', \PacienteController::class . ':index')->setName('inicio-paciente');
$this->get('/registrar', \PacienteController::class . ':insert')->setName('registrar-paciente');
});