<?php
$app->group('/historias', function () {

$this->get('/inicio', \HistoriaController::class . ':index')->setName('inicio-historia');

});