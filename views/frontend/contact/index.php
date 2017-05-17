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
    </head>
    <body>
        <section class="section-background-title">  
          <div class="content">
            <div class="logo">
                <img class="logo" src="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_images']; ?>logo.svg"/>
            </div>
            <h1 class="text-orange">Información de Contacto IdEn Framework</h1>
            <p class="lead text-white">Plataforma de <strong>Desarrollo</strong>, e <strong>Implementación</strong> para sitios web a medida,</p>
            <p class="lead text-white">modificado por la empresa <strong><a href="http://www.ideas-envision.com/framework/">Ideas-Envision</a></strong> Servicios Integrales,</p>
            <p class="lead text-white">Gracias por instalarlo!</p>
            <div id="nav_iden_menu">
                <ul>
                    <li><a class="text-white" href="<?php echo BASE_VIEW_URL; ?>">Inicio</a></li>
                    <li><a class="text-white" href="<?php echo BASE_VIEW_URL; ?>documentation">Documentación</a></li>
                    <li><a class="text-white" href="<?php echo BASE_VIEW_URL; ?>contact">Contacto</a></li>
                </ul>
            </div> 
         </div>
        </section>

        <footer>
          <span class="text-white">Diseñado y desarrollado por <a href="http://www.ideas-envision.com/">Ideas-Envision</a> Servicios Integrales</span>
        </footer>
        
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>jquery-3.2.1.min.js"></script>
        <script src="<?Php echo $vParamsViewBootstrap['root_bootstrap_js']; ?>bootstrap.min.js"></script>        
    </body>
</html>