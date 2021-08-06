@extends('layouts.template')
@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title">Editar Producto</h4>
				</div>
			</div>
            <form action="{{ route('productos.update' , $product->id) }}"  method="POST">
            @csrf
            @method('PUT')
			<div class="card-body">

            <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nombre <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre"  value="{{ isset($product->name)?  $product->name:old('nombre') }}" placeholder="Ingrese el nombre del producto.">
                                    @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Cantidad <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="number" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}" name="cantidad" min="1" value="{{ isset($product->quantity)?  $product->quantity:old('cantidad') }}" placeholder="Ingrese la cantidad.">
                                    @error('cantidad')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Precio <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="number" class="form-control {{$errors->has('precio')?'is-invalid':''}}" name="precio" min="10" value="{{ isset($product->price)?  $product->price:old('precio') }}" placeholder="Ingrese el precio.">
                                    @error('precio')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>


                    

                        <div class="form-group form-show-validation row">
                            <label for="maxdate" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Factura <span class="required-label">*</span></label>
							<div class="col-lg-4 col-md-9 col-sm-8">				
                            <select class="form-control {{$errors->has('user_id')?'is-invalid':''}}" name="factura">
								<option>Seleccione una Factura</option>
                            @foreach($invoices as $i)
                                <option value="{{$i->id}}" {{ ( $i->id == $product->invoice_id) ? 'selected' : '' }}>Factura: n° {{$i->id}} - Vendedor:{{$i->seller->name}} {{$i->seller->last_name}}</option>
                            @endforeach					
							</select> 
                            @error('factura')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
							</div>
                        </div>

                     <div class="card-action">
                        <div class="pull-right">
                            <a type="button" class="btn btn-previous btn-fill btn-danger" href="{{ route('productos.index') }}">Volver</a>
                            <button type="submit" class="btn btn-finish btn-success">Editar</button>
                        </div>
							
					</div>
				</form>
            </div>

        </div>
    </div>
@endsection
