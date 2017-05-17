<!DOCTYPE html>
<html>
<head>
<title>IdEn Framework v3.11</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
body {
  /*background: linear-gradient(90deg, white, gray);*/
  background-color: #282828;
}

body, h1, p {
  /*font-family: "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;*/
    font-family: "Century Gothic","Apple Gothic",AppleGothic,"URW Gothic L","Avant Garde",Futura,sans-serif;
    font-weight: normal;
    margin: 0;
    padding: 0;
    text-align: center;
    color: #FFF;
}
    
.logo img {
    fill: aqua;
    width: 20%;
    text-align: center;
}

.container {
  margin-left:  auto;
  margin-right:  auto;
  margin-top: 177px;
  max-width: 1170px;
  padding-right: 15px;
  padding-left: 15px;
}

.row:before, .row:after {
  display: table;
  content: " ";
}

h1 {
  font-size: 48px;
  font-weight: 300;
  margin: 0 0 20px 0;
}

.lead {
  font-size: 21px;
  font-weight: 200;
  margin-bottom: 20px;
}

p {
  margin: 0 0 10px;
}

a {
  color: #FFF;
  text-decoration: none;
}
</style>
</head>

<body>
<div class="container text-center" id="error">
    
  <div class="row">
    <div class="col-md-12">
        <div class="logo">
            <img class="logo" src="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_images']; ?>logo.svg"/>
        </div>
        <p class="lead">Plataforma de <strong>Desarrollo</strong>, e <strong>Implementación</strong> para sitios web a medida,</p>
        <p class="lead">modificado por la empresa <strong><a href="http://www.ideas-envision.com/framework/">Ideas-Envision</a></strong> Servicios Integrales,</p>
        <p class="lead">Gracias por instalarlo!</p>
    </div>
  </div>

</div>

</body>
</html>
