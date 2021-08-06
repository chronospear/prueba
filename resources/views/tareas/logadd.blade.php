@extends('layouts.template')

@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title">Nuevo log tarea: {{$task->name}}</h4>
				</div>
			</div>
            <form action="{{ route('logs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			<div class="card-body">

                        <div class="form-group form-show-validation row">
                            <label for="commentary" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Comentario <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control {{$errors->has('commentary')?'is-invalid':''}}" name="commentary" id="commentary" value="{{ isset($log->commentary)?  $log->commentary:old('commentary') }}" placeholder="Ingrese un comentario.">
                                    @error('commentary')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="hidden" id="task" name="task" value="{{$task->id}}">
                            </div>
                        </div>

                     <div class="card-action">
                        <div class="pull-right">
                            <a type="button" class="btn btn-previous btn-fill btn-danger" href="{{ route('tareas.index') }}">Volver</a>
                            <button type="submit" class="btn btn-finish btn-success">Agregar</button>
                        </div>
							
					</div>
				</form>
            </div>

        </div>
    </div>
@endsection   