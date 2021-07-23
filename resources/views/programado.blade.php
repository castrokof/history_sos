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
            .loader2 {

            visibility: hidden;
            background-color: rgba(233, 239, 240, 0.948);
            position: absolute;
            z-index: +100 !important;
            width: 100%;
            height:100%;
            }

            .loader2 img { position: relative; top:38%; left:40%;
            width: 200px; height: 200px; }
  </style>
@endsection
@section('content')
<div class="container col-12">
    <div class="loader"><img src="{{asset("assets/lte/dist/img/loader6.gif")}}" class="" /> </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card col-l-12">
                <div class="card-header">{{ __('Programados') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    Estatus Body: {{$statusP ?? $statusF ?? ''}}
                    <form  action="{{route('programado')}}" method="get">
                    @include('form-consulta')
                    <button type="submit" id="consultar" class="btn btn-success">Consultar</button><button type="button" id="anular" class="btn btn-danger">Anular</button>
                    </form>

                    <div class="card-body col-md-12 table-responsive p-2">
                        <table id="mipres" class="table text-nowrap table-bordered" style="width:100%">

                    <thead>
                        <tr>
                        <th>Dispensar</th>
                        <th>Seleccione</th>
                        <th>ID:</th>
                        <th>ID Programacion:</th>
                        <th>Prescripcion:</th>
                        <th>Tipo medicamento:</th>
                        <th>Consecutivo orden:</th>
                        <th>Tipo documento:</th>
                        <th>Documento:</th>
                        <th>Numero de entrega:</th>
                        <th>Fecha máxima de entrega:</th>
                        <th>TipoIDSedeProv:</th>
                        <th>NoIDSedeProv:</th>
                        <th>CondSedeProv:</th>
                        <th>Cums:</th>
                        <th>Cantidad total a entregar:</th>
                        <th>Fecha Programacion:</th>
                        <th>Estado Programacion:</th>
                        <th>Fecha anulacion:</th>
                       </tr>
                    </thead>
                       <tbody>
                        @foreach ($medicamentos2 ?? '' as $item3)
                        @foreach ($item3 as $item)
                        <tr>
                            <td><button type="button" name="Dispensar" title="Clic para dispensar" id="{{$item['ID'] ?? ''}}" data-p="{{$item['NoPrescripcion'] ?? ''}}"  data-c="{{$item['CodSerTecAEntregar'] ?? ''}}"  data-e="{{$item['NoEntrega'] ?? ''}}" data-fe="{{$item['FecEntrega'] ?? ''}}" data-td="{{$item['TipoIDPaciente'] ?? ''}}" data-d="{{$item['NoIDPaciente'] ?? ''}}" class = "dispensar btn-float  bg-gradient-info btn-sm tooltipsC"  title="Clic para dispensar"><i class="fas fa-file-medical"><i class="fa fa-fw fa-plus-circle"></i></i></a></td>
                            <td><input class="case" type="checkbox" title="Selecciona Orden" value="{{$item['ID'] ?? ''}}"></td>
                            <td> {{$item['ID'] ?? ''}}</td>
                            <td> {{$item['IDProgramacion'] ?? ''}}</td>
                            <td> {{$item['NoPrescripcion'] ?? ''}}</td>
                            <td> {{$item['TipoTec'] ?? ''}}</td>
                            <td> {{$item['ConTec'] ?? ''}}</td>
                            <td>{{$item['TipoIDPaciente'] ?? ''}}</td>
                            <td>{{$item['NoIDPaciente'] ?? ''}}</td>
                            <td>{{$item['NoEntrega'] ?? ''}}</td>
                            <td>{{$item['FecMaxEnt'] ?? ''}}</td>
                            <td>{{$item['TipoIDSedeProv'] ?? ''}}</td>
                            <td>{{$item['NoIDSedeProv'] ?? ''}}</td>
                            <td>{{$item['CodSedeProv'] ?? ''}}</td>
                            <td>{{$item['CodSerTecAEntregar'] ?? ''}}</td>
                            <td>{{$item['CantTotAEntregar'] ?? ''}}</td>
                            <td>{{$item['FecProgramacion'] ?? ''}}</td>
                            <td>{{$item['EstProgramacion'] ?? ''}}</td>
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
    <div class="modal fade" tabindex="-1" id ="modal-dis"  role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content bg-secondary" role="document">
                    <div class="loader2"><img src="{{asset("assets/lte/dist/img/loader6.gif")}}" class="" />Consultando... </div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">Dispensar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">

                        <form id="form-general" name="form-general" class="form-horizontal" method="post">
                                @csrf

                                @include('form-dispensar')

                        </form>

                    </div>


                    <div class="modal-footer">

                        <button type="button" id="reportard" class="btn btn-success">Guardar</button>

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

    function ocultar(){
    if($("#customSwitch1").prop('checked')){
        $("#registrar_re_t").css("display", "block");
        $("#registrar_re_d").css("display", "block");
        $("#type_doc").prop("required", true);
        $("#n_doc").prop("required", true);

    }else{

        $("#registrar_re_t").css("display", "none");
        $("#registrar_re_d").css("display", "none");
        $("#type_doc").removeAttr("required").val('');
        $("#n_doc").removeAttr("required").val('');
    }
    }
    $("#customSwitch1").change(ocultar);

    $('#mipres').DataTable({

        language: idioma_espanol,
        processing: true,



         //Botones----------------------------------------------------------------------

         "dom":'<"row"<"col-md-9 form-inline"l><"col-xs-3 form-inline"B>>rt<"row"<"col-md-8 form-inline"i> <"col-md-4 form-inline"p>>',

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



    $("#anular").click(function(){

            var mipre =[];
            var mipretrue =[];

    $("tbody tr").each(function(el){

                    var itemmipres = {};



                var tds = $(this).find("td");
                itemmipres.checked = tds.find(":checkbox").prop("checked");
                itemmipres.IDProgramacion = parseFloat(tds.filter(":eq(2)").text());


                // Ingreso cada array en la variable itemmipres
                mipre.push(itemmipres);




            });


            $.each(mipre, function(i, items) {

                var itemmiprestrue = {};

                 if(items.checked == true){
                    itemmiprestrue.IDProgramacion = items.IDProgramacion;


                    mipretrue.push(itemmiprestrue);

                 }




            });



          $.ajax({
            beforeSend: function(){
            $('.loader').css("visibility", "visible"); },
           url:"{{route('a-programar')}}",
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
                          title: item.Mensaje,
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

$(document).on('click', '.dispensar', function(){
  var id = $(this).attr('id');
  var P = $(this).attr('data-p');
  var C = $(this).attr('data-c');
  var NE = $(this).attr('data-e');
  var FE = $(this).attr('data-fe');
  var D = $(this).attr('data-d');
  var TD = $(this).attr('data-td');

    $('#IDT').val(id);
    $('#P').val(P);
    $('#C').val(C);
    $('#NE').val(NE);
    $('#D').val(D);
    $('#TD').val(TD);
    $('#date_d').val('');
    $("#Valordispensado").val('');
    $("#CausaNoEntrega").val('');
    $('#modal-dis').modal({backdrop: 'static', keyboard: false});
    $('#modal-dis').modal('show');

  });

//Funcion de envio de datos reporte de dispensado

$(function(){

$("#reportard").click(function(){

    var date =   $("#date_d").val();
    var vd =   $("#Valordispensado").val();

    if(date == '' || vd == '' ){

    Swal.fire({
    title: 'Debes escribir la cantidad entregada y fecha de entrega',
    icon: 'warning',
    buttons:{
        cancel: "Cerrar"

            }
    })

}else{



    var mipre =[];
    var mipretrue =[];

    if($("#customRadio1").prop('checked')){
        var ES = 1;
    }else{

        var ES = 0;
    }

    if($("#customSwitch1").prop('checked')){
        var TDE = $("#type_doc").val();
        var DE  = $("#n_doc").val();
        }else{

        var TDE = $("#TD").val();
        var DE  = $("#D").val();

        }

        var itemmipres = {};


            itemmipres.ID = $('#IDT').val();
            itemmipres.CodSerTecEntregado =  $('#C').val();
            itemmipres.CantTotEntregada = $("#Valordispensado").val();
            itemmipres.EntTotal = ES;
            itemmipres.CausaNoEntrega = $("#CausaNoEntrega").val();
            itemmipres.FecEntrega = $("#date_d").val();
            itemmipres.NoLote = $("#NoLote").val();
            itemmipres.TipoIDRecibe = TDE;
            itemmipres.NoIDRecibe = DE;


            // Ingreso cada array en la variable itemmipres
            mipre.push(itemmipres);

        //console.log(mipre);
Swal.fire({
   title: "¿Estás seguro?",
   text: "Vas a realizar una dispensación",
   icon: "success",
   showCancelButton: true,
   showCloseButton: true,
   confirmButtonText: 'Aceptar',
   }).then((result)=>{
  if(result.value){

      $.ajax({
        beforeSend: function(){
        $('.loader2').css("visibility", "visible"); },
       url:"{{route('dispensado')}}",
       method: 'post',
       data:{data:mipre,
        "_token": $("meta[name='csrf-token']").attr("content")
       },
       //dataType:"json",
       success:function(data){
        if(data.success == 'ya'){
            $('#modal-dis').modal('hide');
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
            $('#modal-dis').modal('hide');
         $.each(JSON.parse(data.result), function(i, item) {
                Swal.fire(
                    {
                      icon: 'success',
                      title: "El ID: "+item.Id,
                      text:"Se realizo la entrega correctamente y quedo con id de entrega: "+item.IdEntrega,
                      showConfirmButton: true,
                      //timer: 1500
                    }
                  )
                });
            }
            //$('#mipres').DataTable().destroy();

        },complete: function(){
            $('.loader2').css("visibility", "hidden");
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

