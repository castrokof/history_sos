@extends('layouts.app')
@section("styles")
<link href="{{asset("assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
<link href="{{asset("assets/lte/plugins/toastr/toastr.css")}}" rel="stylesheet" type="text/css"/>
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
  </style>
@endsection
@section('content')
<div class="container">
    <div class="loader"><img src="{{asset("assets/lte/dist/img/loader6.gif")}}" class="" /> </div>

        <div class="col-12">
            <div class="card col-l-12">
                <div class="card-header">{{ __('Historias') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                  <form>
                    @include('form-consulta')

                    </form>

                    <div class="card-body col-md-12 table-responsive p-2">
                        <table id="history" class="table text-nowrap table-bordered" style="width:100%">

                    <thead>
                        <tr>
                        <th>Tipo documento</th>
                        <th>Documento:</th>
                        <th>Url:</th>
                        <th>Url Detalle</th>

                       </tr>
                    </thead>
                       <tbody>

                        </tbody>
                        </table>
                    </div>

                </div>




                </div>
            </div>

    </div>
</div>

@endsection
@section("scriptsPlugins")
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset("assets/lte/plugins/toastr/toastr.min.js")}}" type="text/javascript"></script>
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

    fill_datatable();

    function fill_datatable( type_document = '', document = '')
{
    var datatable = $('#history').DataTable({

        language: idioma_espanol,
        processing: true,
        lengthMenu: [ [25, 50, 100, 500, -1 ], [25, 50, 100, 500, "Mostrar Todo"] ],
        processing: true,
        serverSide: true,
        aaSorting: [[ 1, "asc" ]],

        ajax:{
          url:"{{ route('history')}}",
          type: 'get',
          data:  {type_document:type_document, document:document}
            },
        columns: [
          {data:'type_document',
           name:'type_document',
           orderable: false
          },
          {data:'document',
          name:'document'
          },
          {data:'url',
          name:'url'
          },
          {data:'urldetalle',
          name:'urldetalle'
          }


        ],


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

}


$('#consultar').click(function(){

    var type_document = $('#type_document').val();
    var document = $('#document').val();



    if(type_document != '' && document != ''){

       $('#history').DataTable().destroy();
       fill_datatable(type_document, document);

    }else{

      swal({
                title: 'Debes digitar los campos Ej: tipo documento y documento',
                icon: 'warning',
                buttons:{
                    cancel: "Cerrar"

                        }
                  })
    }
    });

    $('#reset').click(function(){
    $('#type_document').val('');
    $('#document').val('');

    $('#history').DataTable().destroy();
    fill_datatable();
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
