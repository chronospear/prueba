<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::Get();
        
        return view('productos.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoices = Invoice::Get();
        return view('productos.create', compact('invoices'));
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
            'cantidad' => 'required|integer',
            'precio' => 'required|integer',
            'factura' => 'required|integer'];

        $Mensaje=['required'=>'El :attribute es obligatorio.',
                  'cantidad.required' => 'La cantidad es obligatoria.',
                  'factura.required', 'factura.integer' => 'La factura es oblitagoria'];

        $this->validate($request,$campos,$Mensaje);

        $p = new Product;
        $p->name = $request->nombre;
        $p->quantity = $request->cantidad;
        $p->price = $request->precio;
        $p->invoice_id = $request->factura;
        $p->save();

        return redirect('productos')->with('status','Producto ingresado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $invoices = Invoice::get();

        return view('productos.edit',compact('product','invoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre' => 'required|string',
            'cantidad' => 'required|integer',
            'precio' => 'required|integer',
            'factura' => 'required|integer'];

        $Mensaje=['required'=>'El :attribute es obligatorio.',
                  'cantidad.required' => 'La cantidad es obligatoria.',
                  'factura.required', 'factura.integer' => 'La factura es oblitagoria'];

        $this->validate($request,$campos,$Mensaje);

        $p = Product::find($id);
       

        
        if($p->name != $request->nombre || 
            $p->quantity != $request->cantidad ||
            $p->price != $request->precio ||
            $p->invoice_id !=  $request->factura){

                $p->name = $request->nombre;
                $p->quantity = $request->cantidad;
                $p->price = $request->precio;
                $p->invoice_id = $request->factura;
                $p->save();

             return redirect('productos')->with('status','¡Los datos fueron editados exitosamente!.');
            
            }else{

            return redirect('productos')->with('status','No se ingresaron datos nuevos.');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $p = Product::find($product);
        $p->delete();
        return redirect('productos')->with('status','El producto fue eliminado exitosamente!.');
    }
}
