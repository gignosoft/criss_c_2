<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Asset;
use App\Models\Supplier;

class MantenedorDeActivos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listarTodos()
    {
        $activos = Asset::all();
        $numActivos = count ( $activos );



        return view('mantenedores_dev/activo', array('activos' => $activos, 'numActivos' => $numActivos));
    }


    public function buscarActivo()
    {
        $activo         = $_POST['activo'];
        $descripcion       = $_POST['descripcion'];
        $code          = $_POST['code'];
        $proveedor  = $_POST['proveedor'];

        $activos = Activos::where('name', 'LIKE', '%'.$nombre.'%')
            ->Where('description', 'LIKE', '%'.$descripcion.'%')
            ->Where('code', 'LIKE', '%'.$code.'%')
            ->Where('supplier_id', 'LIKE', '%'.$supplier_id.'%')
            ->get();

        $numActivos = count ( $activos );


        //dd($numActivos);

        return view('mantenedores_dev/activo', array('actvos' => $activos, 'numActivos' => $numActivos));
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
