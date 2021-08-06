@extends('layouts.template')

@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title">Editar factura</h4>
				</div>
			</div>
            <form action="{{ route('facturas.update' , $invoice->id) }}" method="POST">
            @csrf
            @method('PUT')
			<div class="card-body">

            
                        <div class="form-group form-show-validation row">
                        <label for="date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Fecha <span class="required-label">*</span></label> 
                             <div class="col-lg-4 col-md-9 col-sm-8">
                             <div class="input-group">
                                <input type="text" class="form-control {{$errors->has('fecha')?'is-invalid':''}}" id="datepicker" name="fecha" value="{{ isset($invoice->date)?  \Carbon\Carbon::parse($invoice->date)->format('d/m/Y'):old('fecha') }}">
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="fa fa-calendar-check"></i>
										</span>
                                    </div>
                            </div>
                            @error('fecha')
                                    <small class="text-danger">{{ $message }}</small>
                             @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tipo <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control {{$errors->has('tipo')?'is-invalid':''}}" name="tipo" value="{{ isset($invoice->type)?  $invoice->type:old('tipo') }}" placeholder="Ingrese el tipo de factura.">
                                    @error('tipo')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="maxdate" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Vendedor <span class="required-label">*</span></label>
							<div class="col-lg-4 col-md-9 col-sm-8">				
                            <select class="form-control {{$errors->has('vendedor')?'is-invalid':''}}" name="vendedor">
								<option>Seleccione un vendedor</option>
                            @foreach($sellers as $s)
                                <option value="{{$s->id}}" {{ ( $s->id == $invoice->seller_id) ? 'selected' : '' }}>{{$s->name}} {{$s->last_name}}</option>
                            @endforeach				
							</select>
                            @error('vendedor')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
							</div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="maxdate" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Usuario <span class="required-label">*</span></label>
							<div class="col-lg-4 col-md-9 col-sm-8">				
                            <select class="form-control {{$errors->has('usuario')?'is-invalid':''}}" name="usuario">
								<option>Seleccione un usuario</option>
                            @foreach($users as $u)
                                <option value="{{$u->id}}" {{ ( $u->id == $invoice->user_id) ? 'selected' : '' }}>{{$u->name}} {{$u->last_name}}</option>
                            @endforeach					
							</select>
                            @error('usuario')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
							</div>
                        </div>

                     <div class="card-action">
                        <div class="pull-right">
                            <a type="button" class="btn btn-previous btn-fill btn-danger" href="{{ route('facturas.index') }}">Volver</a>
                            <button type="submit" class="btn btn-finish btn-success">Agregar</button>
                        </div>
							
					</div>
				</form>
            </div>

        </div>
    </div>
@endsection