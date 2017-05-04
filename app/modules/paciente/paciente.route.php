<?php

$app->group('/pacientes', function () {

$this->get('/inicio', \PacienteController::class . ':index')->setName('inicio-paciente');

    $this->post('/registrar-paciente', function($request, $response, $args){
        $data = $request->getParsedBody();
        var_dump($data);die();
    })->setName('registrar-paciente');

    $this->post('/formulario-registro-paciente', function($request, $response, $args){
        $title = 'Registrar paciente';
        $btn ='registrar';
        $uri = $request->getUri();
        $route = $uri->getBasePath();
        $route = $route . '/pacientes/registrar-paciente';
        $body = '<div class="row">
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <label for="in-rut-paciente">RUT</label>
                    <input type="text" class="form-control" id="in-rut-paciente" placeholder="18.006.063-4">
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <label for="in-nombre-paciente">Nombre</label>
                    <input type="text" class="form-control" id="in-nombre-paciente" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <label for="in-apaterno-paciente">Apellido paterno</label>
                    <input type="text" class="form-control" id="in-apaterno-paciente" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <label for="in-amaterno-paciente">Apellido materno</label>
                    <input type="text" class="form-control" id="in-amaterno-paciente" placeholder="">
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label for="sel-sexo-paciente">Sexo</label>
                        <select class="form-control" id="sel-sexo-paciente">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="O">Otro</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label for="sel-estado-civil">Estado civil</label>
                        <select class="form-control" id="sel-estado-civil">
                            <option value="S">Soltero/a</option>
                            <option value="C">Casado/a</option>
                            <option value="V">Viudo/a</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label for="date-fecha-nacimiento">Fecha de nacimiento</label>
                        <input type="date" id="date-fecha-nacimiento" class="form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <label for="in-edad">Edad</label>
                    <input type="text" id="in-edad" class="form-control" disabled>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label for="sel-aseguradora">Aseguradora</label>
                        <select class="form-control" id="sel-aseguradora">
                            <option value="A1">Afiliadora2</option>
                            <option value="A2">Afiliadora2</option>
                            <option value="A3">Afiliadora3</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="in-email">Email</label>
                    <input type="email" id="in-email" class="form-control">
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="in-domicilio">Domicilio</label>
                    <input type="text" id="in-domicilio" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <label for="in-telefono1">Teléfono 1</label>
                    <input type="tel" id="in-telefono1" class="form-control">
                </div>
                <div class="col-xs-12 col-md-3">
                    <label for="in-telefono2">Teléfono 2</label>
                    <input type="tel" id="in-telefono2" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="input-group">
                        <label for="in-observaciones">Observaciones</label>
                        <textarea class="form-control custom-control" name="in-observaciones" id="in-observaciones" rows="3" style="resize:none"></textarea>
                    </div>
                </div>
            </div>';
    
        $base = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <form action="'.$route.'" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="mymodalLabel">'.$title.'</h4>
                        </div>      
                        <div class="modal-body">'.$body.'</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="btn-send-data">'.$btn.'</button>
                        </div>      
                    </div>
                </form>
            </div>
            </div>';
        
        return json_encode($base);
    })->setName('formulario-reg-paciente');

    $this->post('/formulario-editar-paciente', function($request, $response, $args){
        $data = $request->getParsedBody();
        $rut = filter_var($data['id'], FILTER_SANITIZE_STRING);
        //paciente
        /*$PD = new PacienteController();
        $pacienteData = $PD->getPaciente($rut);*/
        //reemplazar
        $title = 'Actualizar datos';
        $btn = 'actualizar';
        $body = '<div class="row">
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <label for="in-rut-paciente">RUT</label>
                    <input type="text" class="form-control" id="in-rut-paciente" placeholder="18.006.063-4">
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <label for="in-nombre-paciente">Nombre</label>
                    <input type="text" class="form-control" id="in-nombre-paciente" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <label for="in-apaterno-paciente">Apellido paterno</label>
                    <input type="text" class="form-control" id="in-apaterno-paciente" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <label for="in-amaterno-paciente">Apellido materno</label>
                    <input type="text" class="form-control" id="in-amaterno-paciente" placeholder="">
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label for="sel-sexo-paciente">Sexo</label>
                        <select class="form-control" id="sel-sexo-paciente">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="O">Otro</option>
                        </select>
                    </div>
                </div>
                        
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label for="sel-estado-civil">Estado civil</label>
                        <select class="form-control" id="sel-estado-civil">
                            <option value="S">Soltero/a</option>
                            <option value="C">Casado/a</option>
                            <option value="V">Viudo/a</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label for="date-fecha-nacimiento">Fecha de nacimiento</label>
                        <input type="date" id="date-fecha-nacimiento" class="form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <label for="in-edad">Edad</label>
                    <input type="text" id="in-edad" class="form-control" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label for="sel-aseguradora">Aseguradora</label>
                        <select class="form-control" id="sel-aseguradora">
                            <option value="A1">Afiliadora2</option>
                            <option value="A2">Afiliadora2</option>
                            <option value="A3">Afiliadora3</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="in-email">Email</label>
                    <input type="email" id="in-email" class="form-control">
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="in-domicilio">Domicilio</label>
                    <input type="text" id="in-domicilio" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <label for="in-telefono1">Teléfono 1</label>
                    <input type="tel" id="in-telefono1" class="form-control">
                </div>
                <div class="col-xs-12 col-md-3">
                    <label for="in-telefono2">Teléfono 2</label>
                    <input type="tel" id="in-telefono2" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="input-group">
                        <label for="in-observaciones">Observaciones</label>
                        <textarea class="form-control custom-control" name="in-observaciones" id="in-observaciones" rows="3" style="resize:none"></textarea>
                    </div>
                </div>
            </div>';
        $base = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="mymodalLabel">'.$title.'</h4>
                        </div>      
                        <div class="modal-body">'.$body.'</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btn-send-data">'.$btn.'</button>
                        </div>      
                    </div>
                </form>
                </div>
                </div>';
        return json_encode($base);
    })->setName('editar-paciente');

    $this->post('/eliminar-paciente', function($request, $response, $args){

    })->setName('eliminar-paciente');

    $this->post('/agendar-hora-paciente', function($request, $response, $args){

    })->setName('agendar-hora-paciente');
});