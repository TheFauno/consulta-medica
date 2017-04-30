<?php

//primera ruta en cargar
$app->get('/', \HomeController::class . ':index')->setName('inicio');

$app->post('/', \HomeController::class . ':login')->setName('iniciar-sesion');