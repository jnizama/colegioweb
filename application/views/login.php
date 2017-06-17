<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Colegio</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/bootstrap-select.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.min.css" rel="stylesheet">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.min.css">

    <link href="<?php echo base_url(); ?>css/bootstrap-select.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->

    <link href="<?php echo base_url(); ?>css/login.css" rel="stylesheet">
  </head>

  <body class="login">

    <div class="container">
   <form class="form-signin">
     <img class="imagecenter" src="<?php echo base_url(); ?>images/logo.png" style="width:130px; height: 130px" />
     <h4 class="form-signin-heading">Colegio Caceres - Programa Tutor</h4>
     <h3 class="form-signin-heading">Inicio de sesión</h3>
     <label for="inputEmail" class="sr-only">User name</label>
     <input type="text" id="inputUser" class="form-control" placeholder="User" required autofocus>
     <label for="inputPassword" class="sr-only">Password</label>
     <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
     <select class="form-control" id="dropdownSucursal" >


     <?php foreach($Perfiles as $item ) { ?>
        <option value="<?php echo $item->idperfil?>"><?php echo trim($item->perfil)?></option>
     <?php } ?>

     </select>
     <div class="checkbox">
       <label>
         <input type="checkbox" value="remember-me"> Recordarme
       </label>
     </div>
     <span class="inputPasswordMessageWrong">Acceso inv&aacute;lido</span>

     <button class="btn btn-lg btn-primary btn-block" id="btnSignin" >Inicio</button>

   </form>

 </div> <!-- /container -->



  </body>

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap-select.js"></script>
  <script src="<?php echo base_url(); ?>js/login.js"></script>


</html>
