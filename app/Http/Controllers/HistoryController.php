<?php

namespace App\Http\Controllers;

use App\models\history;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $type_document=$request->type_document;
        $document=$request->document;


        if($request->ajax()){

            if($type_document != null && $document != null) {

            $datas = history::orderBy('id')
            ->where([
                ["type_document", "=", $type_document],
                ["document", "=", $document]

            ])
            ->get();

            return  DataTables()->of($datas)
            ->addColumn('urldetalle', function($datas){
            $button = '<button type="button" name="edit" id="'.$datas->url.'"
            class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar usuario"><i class="far fa-edit"></i></button>';

          return $button;

            })
            ->rawColumns(['urldetalle'])
            ->make(true);
         }
        else{



                $datas = history::orderBy('id')->limit('1000')
                ->get();
                return  DataTables()->of($datas)
                ->addColumn('urldetalle', function($datas){
                $button = '<button type="button" name="edit" id="'.$datas->url.'"
                class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar usuario"><i class="far fa-edit"></i></button>';

              return $button;

                })
                ->rawColumns(['urldetalle'])
                ->make(true);





    }


    }

    return view('home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
