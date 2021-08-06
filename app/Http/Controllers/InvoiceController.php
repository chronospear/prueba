<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Invoice::Get();
        //facturas con mas de 100 productos
        $productosf = Invoice::whereHas('product', function($query){
        return $query->select('quantity')
        ->havingRaw('SUM(quantity) >= 100')
        ->groupBy('quantity');
        })->pluck('id');
        //Productos con valor mas de 1 millon
        $productos = Product::whereRaw('price * quantity > 1000000')->distinct()->pluck('name');          
        return view('facturas.index', compact('facturas','productos','productosf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = Seller::get();
        $users = User::get();

        return view('facturas.create', compact('sellers','users'));
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
            'fecha' => 'required|date',
            'tipo' => 'required|string',
            'vendedor' => 'required|integer',
            'usuario' => 'required|integer'];

        $Mensaje=['required'=>'El :attribute es obligatorio.',
                  'fecha.required' => 'La fecha es obligatoria.',
                  'integer' => 'El :attribute es obligatorio.'];

        $this->validate($request,$campos,$Mensaje);

        $i = new Invoice;
        $i->date =Carbon::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
        $i->type = $request->tipo;
        $i->user_id = $request->usuario;
        $i->seller_id = $request->vendedor;
        $i->save();

        return redirect('facturas')->with('status','factura ingresada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($invoice)
    {
        $invoice = Invoice::find($invoice);
        return view ('facturas.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);
        $sellers = Seller::get();
        $users = User::get();

        return view('facturas.edit', compact('invoice','sellers','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        
        $campos=[
            'fecha' => 'required|date',
            'tipo' => 'required|string',
            'vendedor' => 'required|integer',
            'usuario' => 'required|integer'];

        $Mensaje=['required'=>'El :attribute es obligatorio.',
                  'fecha.required' => 'La fecha es obligatoria.',
                  'integer' => 'El :attribute es obligatorio.'];

        $this->validate($request,$campos,$Mensaje);

        $i = Invoice::find($id);
       
        $fecha = Carbon::parse($request->fecha)->format('y-d-m');
        //dd($request->fecha, $fecha);
        
        if($i->date != $fecha || 
            $i->type != $request->tipo ||
            $i->user_id != $request->usuario ||
            $i->seller_id != $request->vendedor){

                $i->date = $fecha;
                $i->type = $request->tipo;
                $i->user_id = $request->usuario;
                $i->seller_id = $request->vendedor;
                $i->save();

             return redirect('facturas')->with('status','¡Los datos fueron editados exitosamente!.');
            
            }else{

            return redirect('facturas')->with('status','No se ingresaron datos nuevos.');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($invoice)
    {
        $i = Invoice::find($invoice);
        $i->delete();
        return redirect('facturas')->with('status','la factura fue eliminado exitosamente!.');
    }
}
