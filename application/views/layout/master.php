<?php
  //session_destroy();
  $now = time();

  if ($now > $_SESSION['expire']) {
            session_destroy();
            header('Location: '. site_url('login'));
  }
  else {
    $_SESSION['start'] = $now;
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60); //30 minutes session alive.
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Colegio Mariscal Caceres- Admin Panel</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/tableexport.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/bootstrap-select.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/admin.css" rel="stylesheet">
    <script>
      var base_url = '<?php echo base_url(); ?>';
    </script>

  </head>

	<body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title">
	              <span style="font-size: 15px;">Colegio Mariscal C&aacute;ceres</span>
	            </a>
            </div>

            <div class="clearfix"></div>

            <?php
            $perfil = "";
            if($this->session->userdata('perfil_id') == "1") //Administrativo
            {
              include 'menuadm.php';
              $perfil = "Administrativo";
            }
            if($this->session->userdata('perfil_id') == "3") //Profe
            {
                include 'menuprofe.php';
                $perfil = "Profesor";
            }
            if($this->session->userdata('perfil_id') == "2") //Alumno
            {
              include 'menualu.php';
              $perfil = "Alumno";
            }
            ?>



          </div>
            <!-- /menu footer buttons -->
        </div>

	        <!-- top navigation -->
	      <div class="top_nav">
	          <div class="nav_menu">
	            <nav>
	              <div class="nav toggle">
	                <a id="menu_toggle"><i class="fa fa-bars"> Perfil:&nbsp;<?php echo $perfil;?></i></a>
	              </div>

	              <ul class="nav navbar-nav navbar-right">
	                <li class="">
	                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	                    <img src="<?php echo base_url(); ?>images/img.jpg" alt="">Configuraci&oacute;n
	                    <span class=" fa fa-angle-down"></span>
	                  </a>
	                  <ul class="dropdown-menu dropdown-usermenu pull-right">
	                    <li><a href="javascript:;"> <?php echo _('Configuraci&oacute;n'); ?></a></li>
	                    <!-- <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> <?php echo _('Salir'); ?></a></li> -->
                      <li><a id='alertLogout' href="#"><i class="fa fa-sign-out pull-right"></i> <?php echo _('Salir'); ?></a></li>
	                  </ul>
	                </li>

	              </ul>
	            </nav>
	          </div>
	        </div>
	        <!-- /top navigation -->
      </div>

        <!-- page content -->
        <div class="right_col" role="main">
            <?php $this->load->view($content); ?>
        </div>
          <!-- Modal to Logout -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Logout</h4>
                </div>
                <div class="modal-body">
                  <p>Est&aacute; seguro de cerrar su sesi&oacute;n?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" id="btnCloseSession" class="btn btn-default" data-dismiss="modal">Yes</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
              </div>

            </div>
          </div>

        </div>

        <footer>
          <div class="pull-right">
            colegiomariscalcaceres.com Admin Panel
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>


  </body>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/FileSaver.min.js"></script>
    <script src="<?php echo base_url(); ?>js/tableexport.min.js"></script>
    <script src="<?php echo base_url(); ?>js/xlsx.core.min.js"></script>

    <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-select.js"></script>
    <script src="<?php echo base_url(); ?>js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>js/script.js"></script>



    <script src="<?php echo base_url(); ?>js/jquery.bootstrap-touchspin.min.js"></script>

    <script src="<?php echo base_url(); ?>js/profe/page-cta-master.js"></script>

</html>
