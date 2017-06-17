<!-- top tiles -->
<div class="dashboard-panel">

<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> <?php echo _( 'Total Pedido Mesa ' ); ?></span>
    <div class="count" id="countApartaments">14</div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> <?php echo _( 'Total Delivery ' ); ?></span>
    <div class="count" id="countApartaments">14</div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> <?php echo _( 'Total Reservas ' ); ?></span>
    <div class="count" id="countApartaments">14</div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> <?php echo _( 'This Week Orders' ); ?></span>
    <div class="count green" id="countOrdersWeek">65</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> <?php echo _('Total Orders'); ?></span>
    <div class="count" id="countTotalOrders">567</div>
  </div>
</div>

<!-- /top tiles -->

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Estadisticas de la tienda Los siguientes gráficos muestras la evolución de las ventas del local</small></h2>
          <ul class="nav navbar-right panel_toolbox">

          </ul>
          <div class="clearfix"></div>

          <div class="col-md-5 col-sm-5 col-xs-5">
            <canvas id="Chart_1" style="padding-top: 20px" width="350" height="350"></canvas>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-1">

          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <canvas id="Chart_2" style="padding-top: 20px" width="350" height="350"></canvas>
          </div>
        </div>


        <div class="x_content">
          <canvas id="lineChart">
          </canvas>
        </div>
      </div>
    </div>
</div>

</div>
