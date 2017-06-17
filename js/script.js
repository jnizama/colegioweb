
$(document).ready(function(){
  $('#alertLogout').click(function() {
    $('#myModal').modal('show');
  });

  //Close session
  $('#btnCloseSession').click(function() {
      logoutSession();
      //alert('esetaba');
  });
  function logoutSession()
  {
    // var isLogged = false;
    var result = function (response)
    {
      if(response)
       window.location.href = base_url + 'login'
    };
    var postData = {
      action: 'outsession'
    };
    execAsyncAjax(null,'admin/outsession',result);
  }

  if ($(".dashboard-panel").length > 0) {
      var ctxChart1 = $('#Chart_1');
      var ctxChart2 = $('#Chart_2');
      var dataChart1 = {
                  labels: [
                      "Competencias",
                      "Creatividad",
                      "Desempeño",
                  ],
                  datasets: [
                      {
                          data: [300, 50, 100],
                          backgroundColor: [
                              "#FF6384",
                              "#36A2EB",
                              "#FFCE56"
                          ],
                          hoverBackgroundColor: [
                              "#FF6384",
                              "#FFCE56",
                              "#FFCE56",
                              "#36A2EB",
                          ]
                      }]
              };
        var dataChart2 = {
                          labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"],
                          datasets: [
                              {
                                  label: "Actividades del Año Actual",
                                  data: [400, 600, 500,450, 540, 350,330,800,360,600,90,0],
                                  backgroundColor: [
                                      "#FF6384",
                                      "#00B00B",
                                      "#FFCE56",
                                      "#FF6384",
                                      "#00B00B",
                                      "#FFCE56",
                                      "#FF6384",
                                      "#00B00B",
                                      "#FFCE56",
                                      "#FF6384",
                                      "#FFCE56",
                                      "#FF6384"

                                  ],
                                  borderWidth: 1,
                                  borderColor: [
                                      'rgba(255,99,132,1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255,99,132,1)',
                                      'rgba(255,99,132,1)',
                                      'rgba(255,99,132,1)',
                                      'rgba(255,99,132,1)',
                                      'rgba(255,99,132,1)',
                                      'rgba(100,99,000,1)',
                                      'rgba(255,99,132,1)',
                                      'rgba(255,99,132,1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255,99,132,1)'
                                    ],
                              }]
                      };

      var myChart = new Chart(ctxChart1, {
        type: 'pie',
        data: dataChart1
      });

      var myChart = new Chart(ctxChart2, {
        type: 'bar',
        data: dataChart2
      });
  };

  if ($(".page-pedidos").length > 0) {
    $.fn.datepicker.defaults.format = "dd/mm/yyyy";
    var lastItemDetail = 0;
    loadSucursal();
    loadEstadoPedido();
    loadPedidos();
    loadListaProductos();

    $('#block_company_dashboard .input-daterange').datepicker({
    });
    var date = new Date().toLocaleDateString("es-PE");
    $("#startDate").val(date);
    $("#endDate").val(date);

    $('#btnEditar').click(function(){
        var idPedido = $("#dtPedidos tbody").find("tr[class*='selected'] td").last().text();
        idPedido = parseInt(idPedido);
        if(!isNaN(idPedido))
        {
          loadDatosPedido(idPedido);
        }
        else
          alert("Debe seleccionar un registro");
    })

    //Event to handle add new dish
    $('#btnAddDish').click(function(){
      $('#dtDetallePedido tbody').append("<tr><td>"+ lastItemDetail +"</td><td></td><td></td><td></td><td></td><td style='width:20px; text-align:center'><i class='fa fa-pencil' aria-hidden='true'></i></td> </tr>");
      lastItemDetail++;
    })
  }
  function loadDatosPedido(idPedido)
  {
    var postData = {
        idPedido : idPedido
    };
    var result = function (data)
    {

      $('#txtAutocorrelativo').text(pad(data.idPedido,5));
      var fecha = new Date(data.fecha).toLocaleDateString("es-PE");
      var time = new Date(data.fecha).toLocaleTimeString("es-PE");

      var fullDatePedido = fecha +" "+  time

      var fecha = new Date().toLocaleDateString("es-PE");
      var time = new Date().toLocaleTimeString("es-PE");
      var fullDateSistema = fecha +" "+  time

      $('#txtFechaHoraPedido').text(fullDatePedido);
      $('#txtModuloDescripcion').text(data.Modulo);
      $('#txtCantPlatos').text(data.cantPlatos);
      $('#txtClienteFullName').text('Sin cliente');
      $('#txtFechaHora').text(fullDateSistema);
      $('#dtDetallePedido tbody').text("");

      var pos = 1;
      var total = 0;
      $.each(data.Detail, function(i, item) {
        //alert(item.detallepedido); Agregar info to details grid
        total += parseFloat(item.subtotal);
        $('#dtDetallePedido tbody').append("<tr id='rowSelected'><td>"+ pos +"</td><td>"+ item.nombreProducto +"</td><td>"+ item.cantidad +"</td><td>"+ item.precio +"</td><td>"+ item.subtotal +"</td><td style='width:20px; text-align:center'><i class='fa fa-pencil' aria-hidden='true'></i></td> </tr>");
        pos++;
      });
      //alert(Object.keys(data)[1]);
      $('#txtTotPedido').text(total);
      lastItemDetail = pos;
      //alert(total)
    }
    execAsyncAjax(postData,"admin/getPedidoById",result);
  }

  function pad(n, width, z) {
    z = z || '0';
    n = n + '';
    return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
  }
  function loadEstadoPedido(){
    $("#dropdownEstado").append("<option value='' selected >Seleccione</option>");
    $("#dropdownEstado").append("<option value='0' >Preparado</option>");
    $("#dropdownEstado").append("<option value='1' >Sin Preparar</option>");
  }
  function loadListaProductos()
  {
    //load product items to listbox.
    var postData = {

    };
    var result = function (data)
    {
        $.each(data,function(d,data){
            //alert(data.idEmpresa);
            //$("#dropdownSucursal").append("<option " + selected + " value="+ data.idEmpresa +">"+ data.nombre +"</option>");
            $("#dropdownSucursal").append("<option value="+ data.idEmpresa +">"+ data.nombre +"</option>");
        });
        $("#dropdownSucursal").append("<option value='' selected >Seleccione</option>");
    }
    execAsyncAjax(postData,"admin/getProductsToListBox",result);

  }

  function loadSucursal(){
    var postData = {

    };
    var result = function (data)
    {
        $.each(data,function(d,data){
            //alert(data.idEmpresa);
            //$("#dropdownSucursal").append("<option " + selected + " value="+ data.idEmpresa +">"+ data.nombre +"</option>");
            $("#dropdownSucursal").append("<option value="+ data.idEmpresa +">"+ data.nombre +"</option>");
        });
        $("#dropdownSucursal").append("<option value='' selected >Seleccione</option>");
    }
    execAsyncAjax(postData,"admin/getSucursal",result);
  }

  function loadPedidos()
  {
    var postData = {
        idLocalEmpresa : '1'
    };
    var result = function (data)
    {
      // alert(data);
      // return;
      var pos = 1;
        $.each(data,function(d,data){
            //alert(data.idEmpresa);
            //$("#dropdownSucursal").append("<option " + selected + " value="+ data.idEmpresa +">"+ data.nombre +"</option>");
            //$("#dropdownSucursal").append("<option value="+ data.idEmpresa +">"+ data.nombre +"</option>");
            //<tr>

            var fecha = new Date(data.fecha).toLocaleDateString("es-PE");
            var time = new Date(data.fecha).toLocaleTimeString("es-PE");
            var fullDate = fecha +" "+  time
            $('#dtPedidos tbody').append("<tr id='rowSelected'><td>"+ pos +"</td><td>" + data.numPlatos + "</td><td>" + fullDate +"</td><td>" + data.estadoPedido +"</td><td>0</td><td>0</td><td>0</td><td>" + data.total +"</td><td style='display:none'>"+ data.idPedido + " </td></tr>");
            pos++;
        });

        //Funcion para seleccionar la fila
        $("#dtPedidos").delegate("tbody tr", "click", function() {
                $(this).addClass("selected").siblings().removeClass("selected");
        });
        //Funcion para rellover las filas
          $("#dtPedidos tr").not(':first, :last').hover(
          function () {
            $(this).css("background","#91c0ef");
          },
          function () {
            $(this).css("background","#f9f9f9");
          }
        );

    }
    execAsyncAjax(postData,"admin/getPedidos",result);
  }

});

  // $('#modalCompany').on('shown.bs.modal', function () {
  //   $('#nameCompany').focus()
  // });
  //
  // $('#btnSaveCompany').on("click", function(){
  //     save_Company();
  // });
  // $('#btnSaveUser').on("click", function(){
  //     save_User();
  // })
  // $('#btnSaveApartament').on("click", function(){
  //     save_Apartament();
  // })
  // $('.btn-add-user').on("click", function(){
  //     $( "#txtidUser" ).val(0);
  //     $( "#txtEmail" ).val('');
  //     $( "#txtUser" ).val('');
  //     $( "#txtPassword" ).val('');
  //     $( "#txtUser" ).focus();
  //     //dropdownCompanyUser
  // })

function execAsyncAjax(postData, url, funcAction)
{

  $.ajax( {
    type: "POST",
    data: postData,
    dataType: "json",
    async: true,
    url: base_url + url,
    success: funcAction
  }).fail( function ( data ) {
    if ( window.console && window.console.log ) {
      console.log( data );
    }
  });
}
