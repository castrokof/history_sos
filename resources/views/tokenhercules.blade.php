@extends('layouts.app')
@section("styles")
<link href="{{asset("assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card col-12">
                <div class="card-header">{{ __('Hercules') }}</div>

                <div class="card-body">
                    @if (session("mensaje"))
                    <div class="alert alert-warning alert-dismissible" data-auto-dismiss="3000">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Mensaje Tempus</h5>
                        <li>{{ session("mensaje")}}</li>
                    </div>
                    @endif


                    <form  action="{{route('tokenhercules1')}}" method="post">
                    @csrf
                    @include('form-consulta-hercules')

                    <button type="submit" id="consultar" class="btn btn-success">Agregar</button>

                    </form>



                </div>




                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section("scriptsPlugins")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset("assets/lte/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script>



</script>
@endsection
