<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::get();
        return view('vendedores.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'rut' => 'required', 'string', 'unique:users'
        ];

        $Mensaje=['required'=>'El :attribute es obligatorio.',
                 'rut.unique' => 'El rut ingresado ya existe'];

        $this->validate($request,$campos,$Mensaje);

        $s = new Seller;
        $s->name = $request->nombre;
        $s->last_name = $request->apellidos;
        $s->rut = $request->rut;
        $s->save();

        return redirect('vendedores')->with('status','Vendedor ingresado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller = Seller::find($id);

        return view('vendedores.edit',compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre' => 'required|string',
            'rut' => 'required', 'string', 'unique:users'
        ];

        $Mensaje=['required'=>'El :attribute es obligatorio.',
                 'unique' => 'El rut ingresado ya existe'];

        $this->validate($request,$campos,$Mensaje);

        $s = Seller::find($id);
        if( $s->name != $request->nombre  ||
        $s->last_name != $request->apellidos ||
        $s->rut != $request->rut){

        $s->name = $request->nombre;
        $s->last_name = $request->apellidos;
        $s->rut = $request->rut;
        $s->save();

        return redirect('vendedores')->with('status','¡Los datos fueron editados exitosamente!.');

        }else{

            return redirect('vendedores')->with('status','No se ingresaron datos nuevos.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy($seller)
    {
        $i = Seller::find($seller);
        $i->delete();
        return redirect('vendedores')->with('status','El vendedor fue eliminado exitosamente!.');
    }
}
