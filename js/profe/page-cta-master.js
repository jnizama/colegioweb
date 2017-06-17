
  loadEstadoPedido();

function loadEstadoPedido(){
  $("#dropdownEstado").append("<option value='' selected >Seleccione</option>");
  $("#dropdownEstado").append("<option value='0' >Preparado</option>");
  $("#dropdownEstado").append("<option value='1' >Sin Preparar</option>");
}
