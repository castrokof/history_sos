@extends('layouts.app')
@section("styles")
<link href="{{asset("assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">

<style>
    .loader {

    visibility: hidden;
    background-color: rgba(255, 253, 253, 0.952);
    position: absolute;
    z-index: +100 !important;
    width: 100%;
    height:100%;
   }
      .loader img { position: relative; top:50%; left:40%;
        width: 180px; height: 180px; }

        .loaderf {

visibility: hidden;
background-color: rgba(255, 253, 253, 0.952);
position: absolute;
z-index: +100 !important;
width: 100%;
height:100%;
}
  .loaderf img { position: relative; top:50%; left:40%;
    width: 180px; height: 180px; }
  </style>
@endsection
@section('content')
<div class="container">
    <div class="loader"><img src="{{asset("assets/lte/dist/img/loader6.gif")}}" class="" /> </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card col-l-12">
                <div class="card-header">{{ __('Reporte de entregados') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    Estatus Body: {{$statusP ?? $statusF ?? ''}}
                    <form  action="{{route('repentregado')}}" method="get">
                    @include('form-consulta')
                    <button type="submit" id="consultar" class="btn btn-success">Consultar</button>

                    <button type="button" id="anular" class="btn btn-danger">Anular</button>
                    </form>

                    <div class="card-body col-md-12 table-responsive p-2">
                        <table id="mipres" class="table text-nowrap table-bordered" style="width:100%">

                    <thead>
                        <tr>
                        <th>Reportar</th>
                        <th>Seleccione</th>
                        <th>ID:</th>
                        <th>ID ReporteEntrega:</th>
                        <th>Prescripcion:</th>
                        <th>Tipo medicamento:</th>
                        <th>Consecutivo orden:</th>
                        <th>Tipo documento:</th>
                        <th>Documento:</th>
                        <th>Numero de entrega:</th>
                        <th>Estado Entrega:</th>
                        <th>Causas de no entrega:</th>
                        <th>Valor de la entrega:</th>
                        <th>Cums:</th>
                         <th>Cantidad total entregada:</th>
                        <th>Lote entregado:</th>
                        <th>Fecha de Entrega:</th>
                        <th>Fecha Reporte de Entrega:</th>
                        <th>Estado Reporte de Entrega :</th>
                        <th>Fecha Anulación:</th>
                       </tr>
                    </thead>
                       <tbody>
                        @foreach ($medicamentos2 ?? '' as $item3)
                        @foreach ($item3 as $item)
                        <tr>
                            <td><button type="button" name="reportarfacturacion" title="Clic para reportar facturacion" id="{{$item['ID'] ?? ''}}"
                                 data-p="{{$item['NoPrescripcion'] ?? ''}}"
                                 data-tt="{{$item['TipoTec'] ?? ''}}"
                                 data-ct="{{$item['ConTec'] ?? ''}}"
                                 data-tid="{{$item['TipoIDPaciente'] ?? ''}}"
                                 data-idp="{{$item['NoIDPaciente'] ?? ''}}"
                                 data-e="{{$item['NoEntrega'] ?? ''}}"
                                 data-cum="{{$item['CodTecEntregado'] ?? ''}}"
                                 data-ve="{{$item['ValorEntregado'] ?? ''}}"
                                 data-ce="{{$item['CantTotEntregada'] ?? ''}}"
                                 class = "reportar_fac btn-float  bg-gradient-danger btn-sm tooltipsC"  title="Clic para reportar facturacion">
                                 <i class="fas fa-file-medical"><i class="fa fa-fw fa-plus-circle"></i></i></a>
                            </td>
                            <td><input class="case" type="checkbox" title="Selecciona Orden" value="{{$item['ID'] ?? ''}}"></td>
                            <td> {{$item['ID'] ?? ''}}</td>
                            <td> {{$item['IDReporteEntrega'] ?? ''}}</td>
                            <td> {{$item['NoPrescripcion'] ?? ''}}</td>
                            <td> {{$item['TipoTec'] ?? ''}}</td>
                            <td> {{$item['ConTec'] ?? ''}}</td>
                            <td>{{$item['TipoIDPaciente'] ?? ''}}</td>
                            <td>{{$item['NoIDPaciente'] ?? ''}}</td>
                            <td>{{$item['NoEntrega'] ?? ''}}</td>
                            <td>{{$item['EstadoEntrega'] ?? ''}}</td>
                            <td>{{$item['CausaNoEntrega'] ?? ''}}</td>
                            <td>{{$item['ValorEntregado'] ?? ''}}</td>
                            <td>{{$item['CodTecEntregado'] ?? ''}}</td>
                            <td>{{$item['CantTotEntregada'] ?? ''}}</td>
                            <td>{{$item['NoLote'] ?? ''}}</td>
                            <td>{{$item['FecEntrega'] ?? ''}}</td>
                            <td>{{$item['FecRepEntrega'] ?? ''}}</td>
                            <td>{{$item['EstRepEntrega'] ?? ''}}</td>
                            <td>{{$item['FecAnulacion'] ?? ''}}</td>


                        </tr>
                        @endforeach
                        @endforeach
                        </tbody>
                        </table>
                    </div>

                </div>




                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id ="modal-fac"  role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content bg-primary" role="document">
            <div class="loaderf"><img src="{{asset("assets/lte/dist/img/loader6.gif")}}" class="" />Consultando... </div>
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Reportar factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>

            </div>
        <div class="modal-body">

        <form id="form-general" name="form-general" class="form-horizontal" method="post">
                @csrf



                @include('form-facturado')

        </form>
        </div>


        <div class="modal-footer">
            <button type="button" id="reportarf" class="btn btn-success">Reportar</button>

        </div>


    </div>
</div>
</div>
@endsection
@section("scriptsPlugins")
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset("assets/lte/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script>

$(document).ready(function(){

    $('#mipres').DataTable({

        language: idioma_espanol,
        processing: true,



         //Botones----------------------------------------------------------------------

         "dom":'<"row"<"col-xs-1 form-inline"><"col-md-4 form-inline"l><"col-md-5 form-inline"f><"col-md-3 form-inline"B>>rt<"row"<"col-md-8 form-inline"i> <"col-md-4 form-inline"p>>',

                   buttons: [
                      {

                   extend:'copyHtml5',
                   titleAttr: 'Copy',
                   title:"seguimiento",
                   className: "btn btn-info"


                      },
                      {

                   extend:'excelHtml5',
                   titleAttr: 'Excel',
                   title:"seguimiento",
                   className: "btn btn-success"


                      },
                       {

                   extend:'csvHtml5',
                   titleAttr: 'csv',
                   className: "btn btn-warning"


                      },
                      {

                   extend:'pdfHtml5',
                   titleAttr: 'pdf',
                   className: "btn btn-primary"


                      }
                   ],
    });

//Funcion de envio de datos

    $(function(){

    //     Swal.fire({
    //     title: "¿Estás seguro?",
    //     text: "Estás por programar prescripciones",
    //     icon: "success",
    //     showCancelButton: true,
    //     showCloseButton: true,
    //     confirmButtonText: 'Aceptar',
    //     }).then((result)=>{
    //    if(result.value){

    $("#anular").click(function(){

            var mipre =[];
            var mipretrue =[];

    $("tbody tr").each(function(el){

                    var itemmipres = {};



                var tds = $(this).find("td");
                itemmipres.checked = tds.find(":checkbox").prop("checked");
                itemmipres.IDReporteEntrega = parseFloat(tds.filter(":eq(2)").text());


                // Ingreso cada array en la variable itemmipres
                mipre.push(itemmipres);




            });


            $.each(mipre, function(i, items) {

                var itemmiprestrue = {};

                 if(items.checked == true){
                    itemmiprestrue.IDReporteEntrega = items.IDReporteEntrega;


                    mipretrue.push(itemmiprestrue);

                 }




            });



          $.ajax({
            beforeSend: function(){
            $('.loader').css("visibility", "visible"); },
           url:"{{route('a-rentrega')}}",
           method: 'post',
           data:{data:mipretrue,
            "_token": $("meta[name='csrf-token']").attr("content")
           },
           //dataType:"json",
           success:function(data){
            if(data.success == 'ya'){

                $.each(JSON.parse(data.result), function(i, items) {
                    Swal.fire(
                        {
                          icon: 'warning',
                          title: items,
                          showConfirmButton: true,
                          //timer: 1500
                        }
                      )

                });
            $('#mipres').DataTable().destroy();
            }else if(data.success == 'ok'){

             $.each(JSON.parse(data.result), function(i, item) {
                    Swal.fire(
                        {
                          icon: 'success',
                          title: item.Message,
                          showConfirmButton: true,
                          //timer: 1500
                        }
                      )
                    });
                    $('#mipres').DataTable().destroy();

                }

            },complete: function(){
                $('.loader').css("visibility", "hidden");
                }


          });

        })

    //    }
    //    });
    });


$(document).on('click', '.reportar_fac', function(){

  var PRES = $(this).attr('data-p');
  var TIPT = $(this).attr('data-tt');
  var CODT = $(this).attr('data-ct');
  var TIPI = $(this).attr('data-tid');
  var NIDE = $(this).attr('data-idp');
  var NE = $(this).attr('data-e');
  var CUM = $(this).attr('data-cum');
  var VALE = $(this).attr('data-ve');
  var CANE = $(this).attr('data-ce');


    $('#PRES').val(PRES);
    $('#TIPT').val(TIPT);
    $('#CODT').val(CODT);
    $('#TIPI').val(TIPI);
    $('#NIDE').val(NIDE);
    $('#NE').val(NE);
    $('#CUM').val(CUM);
    $('#VALE').val(VALE);
    $('#CANE').val(CANE);
    $('#VALU').val(parseFloat($('#VALE').val())/parseFloat($('#CANE').val()));
    $("#NoFactura").val('');
    $("#NoIDEPS").val('890303093');
    $("#CodEPS").val('');
    $("#CuotaModer").val('');
    $('#modal-fac').modal({backdrop: 'static', keyboard: false});
    $('#modal-fac').modal('show');

  });


$(function(){

$("#reportarf").click(function(){

    var nf =   $("#NoFactura").val();
    var codeps =   $("#CodEPS").val();
    var cm =   $("#CuotaModer").val();

    if(nf == '' || codeps == '' || cm == '' ){

    Swal.fire({
    title: 'Debes digitar todos los campos de N° Factura, IdEPS, CodEPS y cuota moderadora ',
    icon: 'warning',
    buttons:{
        cancel: "Cerrar"

            }
    })

}else{



    var mipref =[];
    var mipretruef =[];


        var itemmipresf = {};


            itemmipresf.NoPrescripcion = $('#PRES').val();
            itemmipresf.TipoTec =$('#TIPT').val();
            itemmipresf.ConTec = $("#CODT").val();
            itemmipresf.TipoIDPaciente = $("#TIPI").val();
            itemmipresf.NoIDPaciente = $("#NIDE").val();
            itemmipresf.NoEntrega = $("#NE").val();
            itemmipresf.NoSubEntrega = 0;
            itemmipresf.NoFactura = $("#NoFactura").val();
            itemmipresf.NoIDEPS = $("#NoIDEPS").val();
            itemmipresf.CodEPS = $("#CodEPS").val();
            itemmipresf.CodSerTecAEntregado = $("#CUM").val();
            itemmipresf.CantUnMinDis = $("#CANE").val();
            itemmipresf.ValorUnitFacturado = $("#VALU").val();
            itemmipresf.ValorTotFacturado = $("#VALE").val();
            itemmipresf.CuotaModer = $("#CuotaModer").val();
            itemmipresf.Copago = 0;


            // Ingreso cada array en la variable itemmipres
               mipref.push(itemmipresf);

               console.log(mipref);

        //console.log(mipre);
Swal.fire({
   title: "¿Estás seguro?",
   text: "Vas a realizar un reporte de facturacion",
   icon: "success",
   showCancelButton: true,
   showCloseButton: true,
   confirmButtonText: 'Aceptar',
   }).then((result)=>{
  if(result.value){


      $.ajax({
        beforeSend: function(){
        $('.loaderf').css("visibility", "visible"); },
       url:"{{route('r-factura')}}",
       method: 'post',
       data:{data:mipref,
        "_token": $("meta[name='csrf-token']").attr("content")
       },
       //dataType:"json",
       success:function(data){
        if(data.success == 'ya'){
            $('#modal-fac').modal('hide');
            $.each(JSON.parse(data.result), function(i, items) {
                Swal.fire(
                    {
                      icon: 'warning',
                      title: items,
                      showConfirmButton: true,
                      //timer: 1500
                    }
                  )

            });
            //$('#mipres').DataTable().destroy();
         }else if(data.success == 'ok'){
            $('#modal-fac').modal('hide');
         $.each(JSON.parse(data.result), function(i, item) {
                Swal.fire(
                    {
                      icon: 'success',
                      title: "El reporte de factura quedo con ID de transaccion: "+item.Id,
                      text:"Y quedo reportado correctamente con IdFacturacion: "+item.IdFacturacion,
                      showConfirmButton: true,
                      //timer: 1500
                    }
                  )
                });
            }
            //$('#mipres').DataTable().destroy();

        },complete: function(){
            $('.loaderf').css("visibility", "hidden");
            }


      });

    }
     });

    }
    })

});


});


var idioma_espanol =
                 {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
                }

</script>
@endsection

