<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        set_time_limit(8000000);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

//Funcion para consulta de lo direccionado por la EPS a tempus
     public function index(Request $request)
    {
        $fechaAi=now()->toDateString();
        $fechaini=$request->fechaini;
        $fechafin=$request->fechafin;
        $prescripcion = $request->prescripcion;

        $TokenHercules = session('tokenh');


        $NIT='901310897';
        $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

        $token=$response->json();
        $statusF=$response->status();

        //dd($token);
        if($statusF != 200){

            return view('home', compact('statusF'));
        }


    // Array fechas
        $fecha = [$fechaAi];
        $fechai = [];
        $fechainicio = Carbon::parse($fechaini);
        $fechafinal = Carbon::parse($fechafin);
        $dias = $fechafinal->diffInDays($fechainicio);


        if($dias == 0){

            $fechai[] = $fechaini;
        }else{
            $dias = $dias + 1;

          for ($i=0; $i < $dias; $i++) {


            $fechai[] = $fechaini;

            $fechaini++;

          }

        }
        //  '2021-01-06','2021-01-07','2021-01-08','2021-01-09','2021-01-10',
        //  '2021-01-11','2021-01-12','2021-01-13','2021-01-14','2021-01-15',
        //  '2021-01-16','2021-01-17','2021-01-18','2021-01-19','2021-01-20',
        //  '2021-01-21','2021-01-22','2021-01-23','2021-01-24','2021-01-25',
        //  '2021-01-26','2021-01-27','2021-01-28','2021-01-29','2021-01-30','2021-01-31'
                //  ];
    //Variable count de las fechas
    $pcf=count($fecha);
    $pcfi=count($fechai);



    if(empty($fechaini) && empty($prescripcion)){
    for ($i=0; $i < $pcf; $i++) {

        $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/DireccionamientoXFecha/$NIT/$token/$fecha[$i]");

        $medicamentos2[]= $medicamentosF->json();

        $statusF= $medicamentosF->status();

        }


        return view('home', compact('medicamentos2','statusF'));

        }else if(!empty($fechaini) && empty($prescripcion)){

            for ($i=0; $i < $pcfi; $i++) {

                $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/DireccionamientoXFecha/$NIT/$token/$fechai[$i]");

                $medicamentos2[]= $medicamentosF->json();

                $statusF= $medicamentosF->status();

                }

        return view('home', compact('medicamentos2','statusF'));

        }else if(empty($fechaini) && !empty($prescripcion)){

            $prescripcion = preg_replace("/\s+/", "", trim($request->prescripcion));

            $prescripciona = explode(',',$prescripcion);

            $pc = count($prescripciona);

            for ($i=0; $i < $pc; $i++) {

                $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/DireccionamientoXPrescripcion/$NIT/$token/$prescripciona[$i]");

                $medicamentos2[]= $medicamentosF->json();

                $statusF= $medicamentosF->status();

            }

                   return view('home', compact('medicamentos2','statusF'));

        }

 //Array prescripciones
        //   $P=[
        //     '20201103158024060049','20200911151022984081','20200220191017620441','20201228186025218960','20210121128025605838','20200902126022785218','20201015180023689971','20201126137024579588','20201217148025047662'
            // '20201211184024892376',
            // '20201201123024693584',
            // '20201026166023915224',
            // '20201203119024750597',
            // '20201029160023991520',
            // '20201104121024089395',
            // '20200902172022783680',
            // '20200826147022594525',
            // '20201103103024057654',
            // '20200827138022681334',
            // '20201201131024689999',
            // '20201028181023963807',
            // '20200907182022879121',
            // '20201201121024686359',
            // '20201027184023944544',
            // '20201124196024528336',
            // '20201230132025263404',
            // '20201201199024685529',
            // '20201026135023907657',

        //   ];
 //Variable count de las prescripciones
        //  $pc=count($P);

        // $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/DireccionamientoXFecha/$NIT/$token/$fecha");
        // $medicamentos1 = $medicamentosF->json();
        // $statusF= $medicamentosF->status();
        //dd($medicamentos1);


        // for ($i=0; $i < $pc; $i++) {

        // $medicamentosP = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/DireccionamientoXPrescripcion/$NIT/$token/$P[$i]");

        // $medicamentos2[]= $medicamentosP->json();

        // $statusF= $medicamentosP->status();



        //  }

        // dd($medicamentos1);

    }

//Funcion para consultar lo programado
    public function indexp(Request $request)
    {
        $fechaAi=now()->toDateString();
        $fechaini=$request->fechaini;
        $fechafin=$request->fechafin;
        $prescripcion = $request->prescripcion;




        $TokenHercules = session('tokenh');


        $NIT='901310897';
        $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

        $token=$response->json();
        $statusF=$response->status();


        if($statusF != 200){

            return view('programado', compact('statusF'));
        }


    // Array fechas
        $fecha = [$fechaAi];
        $fechai = [];
        $fechainicio = Carbon::parse($fechaini);
        $fechafinal = Carbon::parse($fechafin);
        $dias = $fechafinal->diffInDays($fechainicio);


        if($dias == 0){

            $fechai[] = $fechaini;
        }else{
            $dias = $dias + 1;

          for ($i=0; $i < $dias; $i++) {


            $fechai[] = $fechaini;

            $fechaini++;

          }

        }

    //Variable count de las fechas
    $pcf=count($fecha);
    $pcfi=count($fechai);



    if(empty($fechaini) && empty($prescripcion)){
    for ($i=0; $i < $pcf; $i++) {

        $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/ProgramacionXFecha/$NIT/$token/$fecha[$i]");


        $medicamentos2[]= $medicamentosF->json();

        $statusF= $medicamentosF->status();

        }


        return view('programado', compact('medicamentos2','statusF'));

        }else if(!empty($fechaini) && empty($prescripcion)){

            for ($i=0; $i < $pcfi; $i++) {

                $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/ProgramacionXFecha/$NIT/$token/$fechai[$i]");

                $medicamentos2[]= $medicamentosF->json();

                $statusF= $medicamentosF->status();

                }

        return view('programado', compact('medicamentos2','statusF'));

        }else if(empty($fechaini) && !empty($prescripcion)){

            $prescripcion = preg_replace("/\s+/", "", trim($request->prescripcion));

            $prescripciona = explode(',',$prescripcion);

            $pc = count($prescripciona);

            for ($i=0; $i < $pc; $i++) {



                $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/ProgramacionXPrescripcion/$NIT/$token/$prescripciona[$i]");


                $medicamentos2[]= $medicamentosF->json();

                $statusF= $medicamentosF->status();
            }

        return view('programado', compact('medicamentos2','statusF'));

        }


    }

//Funcion para programar
    Public function Programarm(Request $request)
    {


        $TokenHercules = session('tokenh');
        $NIT='901310897';
        $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

        $token=$response->json();



        $pmipres = $request->data;


        foreach($pmipres as $mipre){

           $responsepost = Http::withHeaders(['Content-Type' => 'application/json'])
            ->put("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/Programacion/$NIT/$token",[

                'ID' => (int)$mipre['ID'],
                'FecMaxEnt' => $mipre['FecMaxEnt'],
                'TipoIDSedeProv' => $mipre['TipoIDSedeProv'],
                'NoIDSedeProv' => $mipre['NoIDSedeProv'],
                'CodSedeProv' => $mipre['CodSedeProv'],
                'CodSerTecAEntregar' => $mipre['CodSerTecAEntregar'],
                'CantTotAEntregar' => $mipre['CantTotAEntregar']


            ]);

            $status = $responsepost->status();
            $data1=$responsepost->body();

            if($status == 422){


                $itemmiprestrue[] = $data1;
                $icon = 'ya';
        }else if($status == 200){

                $itemmiprestrue[] = $data1;
                $icon = 'ok';
            }

        }

        return response()->json(['result'=>$itemmiprestrue, 'success' => $icon]);

    }


//Funcion para direccionamiento de vista token hercules
        Public function tokenherculesindex(){


        return view('tokenhercules');


        }

//Funcion para cargar el token hercules en variable de sesion
        Public function tokenhercules(Request $request){

            session(['tokenh' => $request->tokenhercules]);

            return redirect('tokenhercules')->with('mensaje', 'Token almacenado correctamente!!
            dirigete a direccionamiento en la barra superior');

        }

//Funcion para anular programacion

     Public function Anularprogramacion(Request $request)
     {

            $TokenHercules = session('tokenh');
            $NIT='901310897';
            $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

            $token=$response->json();



            $pmipres = $request->data;


            foreach($pmipres as $mipre){

                $idpro = $mipre['IDProgramacion'];

               $responsepost = Http::put("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/AnularProgramacion/$NIT/$token/$idpro");

                $status = $responsepost->status();
                $data1=$responsepost->body();

                if($status != 200){
                return response()->json(['result'=>$data1, 'success' => 'ya']);

            }else if($status == 200){
                    return response()->json(['result'=>$data1, 'success' => 'ok']);
                }

            }
        }

//Funcion para Reportar dispensadión
    Public function  Reportardispensacion(Request $request)
    {


    $TokenHercules = session('tokenh');
    $NIT='901310897';
    $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

    $token=$response->json();



    $pmipres = $request->data;


    foreach($pmipres as $mipre){

    $responsepost = Http::withHeaders(['Content-Type' => 'application/json'])
        ->put("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/Entrega/$NIT/$token",[

            'ID' => (int)$mipre['ID'],
            'CodSerTecEntregado' => $mipre['CodSerTecEntregado'],
            'CantTotEntregada' => $mipre['CantTotEntregada'],
            'EntTotal' => (int)$mipre['EntTotal'],
            'CausaNoEntrega' => $mipre['CausaNoEntrega'],
            'FecEntrega' => $mipre['FecEntrega'],
            'NoLote' => $mipre['NoLote'],
            'TipoIDRecibe' => $mipre['TipoIDRecibe'],
            'NoIDRecibe' => $mipre['NoIDRecibe']
        ]);

        $status = $responsepost->status();
        $data1=$responsepost->body();

        if($status == 422){
        return response()->json(['result'=>$data1, 'success' => 'ya']);

    }else if($status == 200){
            return response()->json(['result'=>$data1, 'success' => 'ok']);
        }

    }
    }
//Funcion para anular entrega
    Public function Anularentrega(Request $request)
    {

       $TokenHercules = session('tokenh');
       $NIT='901310897';
       $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

       $token=$response->json();



       $pmipres = $request->data;


       foreach($pmipres as $mipre){

           $idpro = $mipre['IDEntrega'];

          $responsepost = Http::put("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/AnularEntrega/$NIT/$token/$idpro");

           $status = $responsepost->status();
           $data1=$responsepost->body();

           if($status != 200){
           return response()->json(['result'=>$data1, 'success' => 'ya']);

       }else if($status == 200){
               return response()->json(['result'=>$data1, 'success' => 'ok']);
           }

       }
   }


//Funcion para consulta de lo reportado como entregado

    public function indexrepe(Request $request)
        {
            $fechaAi=now()->toDateString();
            $fechaini=$request->fechaini;
            $fechafin=$request->fechafin;
            $prescripcion = $request->prescripcion;




            $TokenHercules = session('tokenh');


            $NIT='901310897';
            $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

            $token=$response->json();
            $statusF=$response->status();


            if($statusF != 200){

                return view('repentregado', compact('statusF'));
            }


    // Array fechas
            $fecha = [$fechaAi];
            $fechai = [];
            $fechainicio = Carbon::parse($fechaini);
            $fechafinal = Carbon::parse($fechafin);
            $dias = $fechafinal->diffInDays($fechainicio);


            if($dias == 0){

                $fechai[] = $fechaini;
            }else{
                $dias = $dias + 1;

              for ($i=0; $i < $dias; $i++) {


                $fechai[] = $fechaini;

                $fechaini++;

              }

            }

    //Variable count de las fechas
        $pcf=count($fecha);
        $pcfi=count($fechai);



        if(empty($fechaini) && empty($prescripcion)){
        for ($i=0; $i < $pcf; $i++) {

            $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/ReporteEntregaXFecha/$NIT/$token/$fecha[$i]");


            $medicamentos2[]= $medicamentosF->json();

            $statusF= $medicamentosF->status();

            }


            return view('repentregado', compact('medicamentos2','statusF'));

            }else if(!empty($fechaini) && empty($prescripcion)){

                for ($i=0; $i < $pcfi; $i++) {

                    $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/ReporteEntregaXFecha/$NIT/$token/$fechai[$i]");

                    $medicamentos2[]= $medicamentosF->json();

                    $statusF= $medicamentosF->status();

                    }

            return view('repentregado', compact('medicamentos2','statusF'));

            }else if(empty($fechaini) && !empty($prescripcion)){

                $prescripcion = preg_replace("/\s+/", "", trim($request->prescripcion));

                $prescripciona = explode(',',$prescripcion);

                $pc = count($prescripciona);

                for ($i=0; $i < $pc; $i++) {



                    $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/ReporteEntregaXPrescripcion/$NIT/$token/$prescripciona[$i]");


                    $medicamentos2[]= $medicamentosF->json();

                    $statusF= $medicamentosF->status();
                }



            return view('repentregado', compact('medicamentos2','statusF'));

            }


    }
//Funcion para consulta de lo entregado por el dispensador

    public function indexe(Request $request)
    {
        $fechaAi=now()->toDateString();
        $fechaini=$request->fechaini;
        $fechafin=$request->fechafin;
        $prescripcion = $request->prescripcion;




        $TokenHercules = session('tokenh');


        $NIT='901310897';
        $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

        $token=$response->json();
        $statusF=$response->status();


        if($statusF != 200){

            return view('entregado', compact('statusF'));
        }


    // Array fechas
        $fecha = [$fechaAi];
        $fechai = [];
        $fechainicio = Carbon::parse($fechaini);
        $fechafinal = Carbon::parse($fechafin);
        $dias = $fechafinal->diffInDays($fechainicio);


        if($dias == 0){

            $fechai[] = $fechaini;
        }else{
            $dias = $dias + 1;

        for ($i=0; $i < $dias; $i++) {


            $fechai[] = $fechaini;

            $fechaini++;

        }

        }

        //Variable count de las fechas
        $pcf=count($fecha);
        $pcfi=count($fechai);



        if(empty($fechaini) && empty($prescripcion)){
        for ($i=0; $i < $pcf; $i++) {

        $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/EntregaXFecha/$NIT/$token/$fecha[$i]");


        $medicamentos2[]= $medicamentosF->json();

        $statusF= $medicamentosF->status();

        }


        return view('entregado', compact('medicamentos2','statusF'));

        }else if(!empty($fechaini) && empty($prescripcion)){

            for ($i=0; $i < $pcfi; $i++) {

                $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/EntregaXPrescripcion/$NIT/$token/$fechai[$i]");

                $medicamentos2[]= $medicamentosF->json();

                $statusF= $medicamentosF->status();

                }

        return view('entregado', compact('medicamentos2','statusF'));

        }else if(empty($fechaini) && !empty($prescripcion)){

            $prescripcion = preg_replace("/\s+/", "", trim($request->prescripcion));

            $prescripciona = explode(',',$prescripcion);

            $pc = count($prescripciona);

            for ($i=0; $i < $pc; $i++) {



                $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/EntregaXPrescripcion/$NIT/$token/$prescripciona[$i]");


                $medicamentos2[]= $medicamentosF->json();

                $statusF= $medicamentosF->status();
            }

        return view('entregado', compact('medicamentos2','statusF'));

        }


 }








//Funcion para Reportar entrega
    Public function  Reportarentrega(Request $request)
    {


    $TokenHercules = session('tokenh');
    $NIT='901310897';
    $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

    $token=$response->json();



    $pmipres = $request->data;


    foreach($pmipres as $mipre){

       $responsepost = Http::withHeaders(['Content-Type' => 'application/json'])
        ->put("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/ReporteEntrega/$NIT/$token",[

            'ID' => (int)$mipre['ID'],
            'EstadoEntrega' => $mipre['EstadoEntrega'],
            'CausaNoEntrega' => $mipre['CausaNoEntrega'],
            'ValorEntregado' => $mipre['ValorEntregado'],
        ]);

        $status = $responsepost->status();
        $data1=$responsepost->body();

        if($status == 422){
        return response()->json(['result'=>$data1, 'success' => 'ya']);

    }else if($status == 200){
            return response()->json(['result'=>$data1, 'success' => 'ok']);
        }

    }
    }

//Funcion para anular reporte de entrega
    Public function Anularrentrega(Request $request)
    {

    $TokenHercules = session('tokenh');
    $NIT='901310897';
    $response = Http::get("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

    $token=$response->json();



    $pmipres = $request->data;


    foreach($pmipres as $mipre){

        $idpro = $mipre['IDReporteEntrega'];

        $responsepost = Http::put("https://wsmipres.sispro.gov.co/WSSUMMIPRESNOPBS/api/AnularReporteEntrega/$NIT/$token/$idpro");

        $status = $responsepost->status();
        $data1=$responsepost->body();

        if($status != 200){
        return response()->json(['result'=>$data1, 'success' => 'ya']);

    }else if($status == 200){
            return response()->json(['result'=>$data1, 'success' => 'ok']);
        }

    }

 }

//Funcion para Reportar la facturacion
    Public function  Reportarfactura(Request $request)
    {


    $TokenHercules = session('tokenh');
    $NIT='901310897';
    $response = Http::get("https://wsmipres.sispro.gov.co/WSFACMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

    $token=$response->json();



    $pmipres = $request->data;


    foreach($pmipres as $mipre){

    $responsepost = Http::withHeaders(['Content-Type' => 'application/json'])
        ->put("https://wsmipres.sispro.gov.co/WSFACMIPRESNOPBS/api/Facturacion//$NIT/$token",[

            "NoPrescripcion" => $mipre['NoPrescripcion'],
            "TipoTec" => $mipre['TipoTec'],
            "ConTec" => (int)$mipre['ConTec'],
            "TipoIDPaciente" => $mipre['TipoIDPaciente'],
            "NoIDPaciente" => $mipre['NoIDPaciente'],
            "NoEntrega" => (int)$mipre['NoEntrega'],
            "NoSubEntrega" => $mipre['NoSubEntrega'],
            "NoFactura" => $mipre['NoFactura'],
            "NoIDEPS" => $mipre['NoIDEPS'],
            "CodEPS" => $mipre['CodEPS'],
            "CodSerTecAEntregado" => $mipre['CodSerTecAEntregado'],
            "CantUnMinDis" => $mipre['CantUnMinDis'],
            "ValorUnitFacturado" => $mipre['ValorUnitFacturado'],
            "ValorTotFacturado" => $mipre['ValorTotFacturado'],
            "CuotaModer" => $mipre['CuotaModer'],
            "Copago" => $mipre['Copago']

        ]);

        $status = $responsepost->status();
        $data1=$responsepost->body();

        if($status == 422){
        return response()->json(['result'=>$data1, 'success' => 'ya']);

    }else if($status == 200){
            return response()->json(['result'=>$data1, 'success' => 'ok']);
        }

    }
    }

//Funcion para consulta de lo reportado como facturado

    public function indexf(Request $request)
        {
            $fechaAi=now()->toDateString();
            $fechaini=$request->fechaini;
            $fechafin=$request->fechafin;
            $prescripcion = $request->prescripcion;




            $TokenHercules = session('tokenh');


            $NIT='901310897';
            $response = Http::get("https://wsmipres.sispro.gov.co/WSFACMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

            $token=$response->json();
            $statusF=$response->status();


            if($statusF != 200){

                return view('repfacturacion', compact('statusF'));
            }


    // Array fechas
            $fecha = [$fechaAi];
            $fechai = [];
            $fechainicio = Carbon::parse($fechaini);
            $fechafinal = Carbon::parse($fechafin);
            $dias = $fechafinal->diffInDays($fechainicio);


            if($dias == 0){

                $fechai[] = $fechaini;
            }else{
                $dias = $dias + 1;

              for ($i=0; $i < $dias; $i++) {


                $fechai[] = $fechaini;

                $fechaini++;

              }

            }

    //Variable count de las fechas
        $pcf=count($fecha);
        $pcfi=count($fechai);



        if(empty($fechaini) && empty($prescripcion)){
        for ($i=0; $i < $pcf; $i++) {

            $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSFACMIPRESNOPBS/api/FacturacionXFecha/$NIT/$token/$fecha[$i]");


            $medicamentos2[]= $medicamentosF->json();

            $statusF= $medicamentosF->status();

            }


            return view('repfacturacion', compact('medicamentos2','statusF'));

            }else if(!empty($fechaini) && empty($prescripcion)){

                for ($i=0; $i < $pcfi; $i++) {

                    $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSFACMIPRESNOPBS/api/FacturacionXFecha/$NIT/$token/$fechai[$i]");

                    $medicamentos2[]= $medicamentosF->json();

                    $statusF= $medicamentosF->status();

                    }

            return view('repfacturacion', compact('medicamentos2','statusF'));

            }else if(empty($fechaini) && !empty($prescripcion)){

                $prescripcion = preg_replace("/\s+/", "", trim($request->prescripcion));

                $prescripciona = explode(',',$prescripcion);

                $pc = count($prescripciona);

                for ($i=0; $i < $pc; $i++) {



                    $medicamentosF = Http::get("https://wsmipres.sispro.gov.co/WSFACMIPRESNOPBS/api/FacturacionXPrescripcion/$NIT/$token/$prescripciona[$i]");


                    $medicamentos2[]= $medicamentosF->json();

                    $statusF= $medicamentosF->status();
                }



            return view('repfacturacion', compact('medicamentos2','statusF'));

            }


    }

//Funcion para anular reporte de factura
    Public function Anularfactura(Request $request)
    {

        $TokenHercules = session('tokenh');
        $NIT='901310897';
        $response = Http::get("https://wsmipres.sispro.gov.co/WSFACMIPRESNOPBS/api/GenerarToken/$NIT/$TokenHercules");

        $token=$response->json();



        $pmipres = $request->data;


        foreach($pmipres as $mipre){

            $idpro = $mipre['IDFacturacion'];

            $responsepost = Http::put("https://wsmipres.sispro.gov.co/WSFACMIPRESNOPBS/api/FacturacionAnular/$NIT/$token/$idpro");

            $status = $responsepost->status();
            $data1=$responsepost->body();

            if($status != 200){
            return response()->json(['result'=>$data1, 'success' => 'ya']);

        }else if($status == 200){
                return response()->json(['result'=>$data1, 'success' => 'ok']);
            }

        }

    }
}








