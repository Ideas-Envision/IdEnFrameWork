<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <title>IdEn Framework v3.11</title>
        <link href="<?Php echo $vParamsViewBootstrap['root_bootstrap_css']; ?>bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_css']; ?>iden.min.css" />
        <link rel="stylesheet" href="<?Php echo $vParamsViewBackEndLayout['root_backend_pages_css']; ?>login.min.css" />
    </head>
    <body>
        <section class="section-background-title">  
          <div class="content">
            <!--<div class="logo">
                <img class="logo" src="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_images']; ?>logo.svg"/>
            </div>-->
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-md-push-4 col-lg-push-4">
                    <h1 class="text-green text-center">Módulo de Acceso</h1>
                    <p class="lead text-white text-center">Formulario de <strong>Registro</strong>, la <strong>documentación</strong> para el módulo de acceso se encuentra en la parte inferior.</p>
                    <form id="access-form-register">
                        <div class="form-group text-center">
                            <img src="<?Php echo $vParamsViewBackEndLayout['root_backend_pages_images']; ?>img-avatar-login.png" alt="Avatar" class="avatar">
                        </div>                        
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="exampleInputEmail1">Nombres</label>
                            <input type="text" class="form-control" name="vName" id="vName" placeholder="Nombres"> 
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellidos</label>
                                <input type="text" class="form-control" name="vLastNames" id="vLastNames" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Usuario/Correo Electrónico</label>
                                <input type="email" class="form-control" name="vEmail" id="vEmail" placeholder="Correo Electrónico">
                            </div>
                        </div>                        
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input type="password" class="form-control" name="vPassword" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Repetir Contraseña</label>
                                <input type="password" class="form-control" name="vRePassword" placeholder="RepetirContraseña">
                            </div>
                        </div>
                        <button type="submit" class="btn login-button">Registrarme</button>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                                <div id="nav_iden_login">
                                    <ul>
                                        <li><a class="text-gray" href="<?php echo BASE_VIEW_URL; ?>access">Ingresar</a></li>
                                        <li><a class="text-gray" href="<?php echo BASE_VIEW_URL; ?>">¿olvidaste tu contraseña?</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
            <div class="clearfix visible-xs-block"></div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-md-push-4 col-lg-push-4 padding-10 text-center">
                    <div id="nav_iden_menu">
                        <ul>
                            <li><a class="text-white" href="<?php echo BASE_VIEW_URL; ?>">Inicio</a></li>
                            <li><a class="text-white" href="<?php echo BASE_VIEW_URL; ?>documentation">Documentación</a></li>
                            <li><a class="text-white" href="<?php echo BASE_VIEW_URL; ?>modules">Módulos</a></li>
                            <li><a class="text-white" href="<?php echo BASE_VIEW_URL; ?>contact">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
        </section>

        <footer>
          <span class="text-white">Diseñado y desarrollado por <a href="http://www.ideas-envision.com/">Ideas-Envision</a> Servicios Integrales</span>
        </footer>
        
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>jquery-3.2.1.min.js"></script>
        <script src="<?Php echo $vParamsViewBootstrap['root_bootstrap_js']; ?>bootstrap.min.js"></script>
        
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_pages_scripts']; ?>access.min.js"></script>
    </body>
</html>
