@extends('layouts.template')

@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title"> Nuevo vendedor</h4>
				</div>
			</div>
            <form action="{{ route('vendedores.store') }}" method="POST">
            @csrf
			<div class="card-body">

            <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nombre <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" value="{{old('nombre') }}" placeholder="Ingrese el nombre">
                                    @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Apellidos <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control {{$errors->has('apellidos')?'is-invalid':''}}" name="apellidos"  value="{{old('apellidos') }}" placeholder="Ingrese los apellidos">
                                    @error('apellidos')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Rut <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control {{$errors->has('rut')?'is-invalid':''}}" name="rut"  value="{{old('rut') }}" oninput="checkRut(this)" maxlength="10"  placeholder="Ingrese el rut">
                                <small class="text-danger" id="check"></small>    
                                    @error('rut')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        

                        <div class="card-action">
                        <div class="pull-right">
                            <a type="button" class="btn btn-previous btn-fill btn-danger" href="{{ route('vendedores.index') }}">Volver</a>
                            <button type="submit" class="btn btn-finish btn-success">Agregar</button>
                        </div>
							
					</div>
				</form>
            </div>

        </div>
    </div>
@section('js')
<script src="../../js/validarRUT.js"></script>
@endsection
@endsection