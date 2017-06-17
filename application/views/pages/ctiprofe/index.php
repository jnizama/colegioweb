<div class="page-pedidos container">
  <div class="page-title">
    <div class="title_left">
      <h3>CTA del Profesor</small></h3>
    </div>
  </div>


  <div class="clearfix"></div>

  <div class="row derecha">
    <div class="col-md-1 col-sm-2 col-xs-2 col-lg-1">
      <div id="block_company_dashboard">
        <label for="message-text" class="control-label">Grado:</label>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-4 col-lg-3">
      <div>
        <select class="form-control" id="dropdownSucursal" class="selectpicker" ></select>
      </div>
    </div>

    <div class="col-md-1 col-sm-1 col-xs-2 col-lg-1">
      <div id="block_company_dashboard">
        <label for="message-text" class="control-label">Estado:</label>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-4 col-lg-3 izquierda">
      <!-- Standard button -->
      <!-- <button type="button" class="btn btn-warning estadopedido">PENDIENTE</button> -->
      <select class="form-control" id="dropdownEstado" class="selectpicker" ></select>
    </div>
  </div>

  <div class="row derecha">
    <div class="col-md-2 col-sm-2 col-xs-3 col-lg-1">
      <div id="block_company_dashboard">

      </div>
    </div>
    <div class="col-md-6 col-sm-3 col-xs-9 col-lg-3">
      <div id="block_company_dashboard" style="display:visibility" >
        <div class="input-daterange input-group" id="datepicker">

      </div>
      </div>
    </div>
  </div>

<div class="container">

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <table id="dtPedidos" class="table table-striped table-bordered table">
            <thead>
              <tr>
                <th>N•</th>
                <th>Nombre</th>
                <th>Secci&oacute;n</th>
                <th>Num. de Sessiones</th>
                <th>Num. de Evaluaciones</th>
                <th>Situaci&oacute;n</th>
                <th style="display:none"></th>
              </tr>
            </thead>

            <tbody>

            </tbody>

            <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>

                </tr>
            </tfoot>

          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2 col-sm-2 col-xs-2 col-lg-1">
        <button type="button" id="btnEditar" data-toggle="modal" data-target="#modalDetaPedido" class="btn btn-primary">Editar</button>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-4 col-lg-2">
        <button type="button" class="btn btn-success">Imprimir</button>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-2 col-lg-1">
        <button type="button" class="btn btn-danger">Eliminar</button>
    </div>
 </div>
</div>

</div>

<!-- Modal to New Company -->
<div id="modalDetaPedido" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva Matr&iacute;cula</h4>
      </div>
      <div class="modal-body">
        <form>
        <div class="row" >

         <div class="col-sm-2 col-md-2 col-xs-2 derecha">
           <label for="message-text" class="control-label">Autocorrelativo:</label>
         </div>
         <div class="col-sm-3 col-md-3 col-xs-3">
           <label for="message-text" id="txtAutocorrelativo" class="control-label derecha"></label>
         </div>

         <div class="col-sm-3 col-md-3 col-xs-2 derecha">
           <label for="message-text" class="control-label">M&oacute;dulo:</label>
         </div>
         <div class="col-sm-4 col-md-4 col-xs-4">
           <label for="message-text" class="control-label izquierda" id="txtModuloDescripcion"></label>
         </div>

       </div>

       <div class="row" >
         <div class="col-sm-2 col-md-2 col-xs-2 derecha">
           <label for="message-text" class="control-label">Item:</label>
         </div>
         <div class="col-sm-3 col-md-3 col-xs-3">
           <label for="message-text" id="txtCantPlatos" class="control-label izquierda"></label>
         </div>

         <div class="col-sm-3 col-md-3 col-xs-2 derecha">
           <label for="message-text" class="control-label">Item:</label>
         </div>
         <div class="col-sm-3 col-md-3 col-xs-3">
           <label for="message-text"  id="txtFechaHoraPedido" class="control-label"></label>
         </div>

       </div>
       <div class="row" >
         <div class="col-sm-2 col-md-2 col-xs-2 derecha">
           <label for="message-text" class="control-label">Fecha/Hora:</label>
         </div>
         <div class="col-sm-4 col-md-4 col-xs-4">
           <label for="message-text" id="txtFechaHora" class="control-label izquierda"></label>
         </div>
         <div class="col-sm-2 col-md-2 col-xs-2 derecha">
           <label for="message-text" class="control-label">Item:</label>
         </div>
         <div class="col-sm-4 col-md-4 col-xs-4">
           <label for="message-text" class="control-label izquierda"></label>
         </div>
       </div>

       <div class="row" >
         <div class="col-sm-2 col-md-2 col-xs-2 derecha">
           <label for="message-text" class="control-label">Item:</label>
         </div>
         <div class="col-sm-4 col-md-4 col-xs-4">
           <label for="message-text" id="txtClienteFullName" class="control-label izquierda"></label>
         </div>
         <div class="col-sm-2 col-md-2 col-xs-2 derecha">
           <label for="message-text" class="control-label"></label>
         </div>
         <div class="col-sm-4 col-md-4 col-xs-4">
           <label for="message-text" class="control-label izquierda"></label>
         </div>
       </div>

       <div class="row" >
         <div class="col-sm-2 col-md-2 col-xs-2 derecha">
           <label for="message-text" class="control-label">Item.:</label>
         </div>
         <div class="col-sm-4 col-md-4 col-xs-4">
           <input type="checkbox" value="1" checked="1">
         </div>
         <div class="col-sm-2 col-md-2 col-xs-2 derecha">
           <label for="message-text" class="control-label">Item:</label>
         </div>
         <div class="col-sm-4 col-md-4 col-xs-4">
           <label for="message-text" class="control-label izquierda">Item</label>
         </div>
       </div>

       <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
             <div class="x_content">
               <table id="dtDetallePedido" class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>N•</th>
                     <th>Item</th>
                     <th>Item.</th>
                     <th>Item</th>
                     <th>Item</th>
                     <th>Item</th>
                   </tr>
                 </thead>


                 <tbody>

                 </tbody>

                 <tfoot>
                     <tr>
                       <td></td>
                       <td></td>
                       <td></td>

                       <td class="derecha">
                           Total
                       </td>
                       <td style='text-align:center'>
                           <label for="message-text"  class="control-label" id="txtTotPedido"></label>
                       </td>
                       <td></td>
                     </tr>
                 </tfoot>

               </table>

             </div>
           </div>
         </div>
       </div>

       <div class="row" >
         <div class="col-sm-2 col-md-2 col-xs-2 derecha">
           <label for="message-text" class="control-label">Detalle Item:</label>
         </div>
         <div class="col-sm-10 col-md-10 col-xs-10">
           <label for="message-text" class="control-label" id="txtDetallePedido">Info por mostrar</label>
         </div>
      </div>

       </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveCompany" class="btn btn-default" data-dismiss="modal">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>
