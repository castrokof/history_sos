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
                <div class="card-header">{{ __('Reporte de Facturado') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    Estatus Body: {{$statusP ?? $statusF ?? ''}}
                    <form  action="{{route('facturado')}}" method="get">
                    @include('form-consulta')
                    <button type="submit" id="consultar" class="btn btn-success">Consultar</button>

                    <button type="button" id="anular" class="btn btn-danger">Anular</button>
                    </form>

                    <div class="card-body col-md-12 table-responsive p-2">
                        <table id="mipres" class="table text-nowrap table-bordered" style="width:100%">

                    <thead>
                        <tr>
                        <th>Seleccione</th>
                        <th>ID:</th>
                        <th>ID Facturación:</th>
                        <th>Prescripcion:</th>
                        <th>Tipo tec:</th>
                        <th>Consecutivo orden:</th>
                        <th>Tipo documento:</th>
                        <th>Documento:</th>
                        <th>Numero de entrega:</th>
                        <th>Numero sub entrega:</th>
                        <th>Factura:</th>
                        <th>NoID EPS:</th>
                        <th>Cod DEPS:</th>
                        <th>Cums:</th>
                        <th>Cantidad total entregada:</th>
                        <th>Valor unitario fact:</th>
                        <th>Valor total fact:</th>
                        <th>Cuota moderadora:</th>
                        <th>Copago:</th>
                        <th>Fecha facturacion:</th>
                        <th>Estado facturacion:</th>
                        <th>Fecha Anulación:</th>
                       </tr>
                    </thead>
                       <tbody>
                        @foreach ($medicamentos2 ?? '' as $item3)
                        @foreach ($item3 as $item)
                        <tr>
                            <td><input class="case" type="checkbox" title="Selecciona Orden" value="{{$item['ID'] ?? ''}}"></td>
                            <td> {{$item['ID'] ?? ''}}</td>
                            <td> {{$item['IDFacturacion'] ?? ''}}</td>
                            <td> {{$item['NoPrescripcion'] ?? ''}}</td>
                            <td> {{$item['TipoTec'] ?? ''}}</td>
                            <td> {{$item['ConTec'] ?? ''}}</td>
                            <td>{{$item['TipoIDPaciente'] ?? ''}}</td>
                            <td>{{$item['NoIDPaciente'] ?? ''}}</td>
                            <td>{{$item['NoEntrega'] ?? ''}}</td>
                            <td>{{$item['NoSubEntrega'] ?? ''}}</td>
                            <td>{{$item['NoFactura'] ?? ''}}</td>
                            <td>{{$item['NoIDEPS'] ?? ''}}</td>
                            <td>{{$item['CodEPS'] ?? ''}}</td>
                            <td>{{$item['CodSerTecAEntregado'] ?? ''}}</td>
                            <td>{{$item['CantUnMinDis'] ?? ''}}</td>
                            <td>{{$item['ValorUnitFacturado'] ?? ''}}</td>
                            <td>{{$item['ValorTotFacturado'] ?? ''}}</td>
                            <td>{{$item['CuotaModer'] ?? ''}}</td>
                            <td>{{$item['Copago'] ?? ''}}</td>
                            <td>{{$item['FecFacturacion'] ?? ''}}</td>
                            <td>{{$item['EstFacturacion'] ?? ''}}</td>
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
                itemmipres.IDFacturacion = parseFloat(tds.filter(":eq(2)").text());


                // Ingreso cada array en la variable itemmipres
                mipre.push(itemmipres);




            });


            $.each(mipre, function(i, items) {

                var itemmiprestrue = {};

                 if(items.checked == true){
                    itemmiprestrue.IDFacturacion = items.IDFacturacion;


                    mipretrue.push(itemmiprestrue);

                 }




            });



          $.ajax({
            beforeSend: function(){
            $('.loader').css("visibility", "visible"); },
           url:"{{route('a-facturado')}}",
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
            //$('#mipres').DataTable().destroy();
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
                    //$('#mipres').DataTable().destroy();

                }

            },complete: function(){
                $('.loader').css("visibility", "hidden");
                }


          });

        })

    //    }
    //    });
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

