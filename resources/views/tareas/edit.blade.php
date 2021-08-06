@extends('layouts.template')

@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title">Editar tarea</h4>
				</div>
			</div>
            <form action="{{ route('tareas.update' , $task->id) }}" method="POST">
            @csrf
            @method('PUT')
			<div class="card-body">

            <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nombre <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" name="name" id="name" value="{{ isset($task->name)?  $task->name:old('nombre') }}" placeholder="Ingrese el nombre de la tarea.">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Descripción <span class="required-label">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control {{$errors->has('description')?'is-invalid':''}}" name="description" id="description"  value="{{ isset($task->description)?  $task->description:old('fecha') }}" placeholder="Ingrese la descripción de la tarea.">
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                        <label for="date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Fecha estimada de ejecucción<span class="required-label">*</span></label>
                             <div class="col-lg-4 col-md-9 col-sm-8">
                             <div class="input-group">
                                <input type="text" class="form-control {{$errors->has('estimated_date')?'is-invalid':''}}" id="datepicker" name="estimated_date" value="{{ isset($task->estimated_date)?  \Carbon\Carbon::parse($task->estimated_date)->format('d/m/Y'):old('fecha') }}">
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="fa fa-calendar-check"></i>
										</span>
                                    </div>
                            </div>
                            @error('estimated_date')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                        <label for="date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Fecha maxima de ejecucción<span class="required-label">*</span></label>
                             <div class="col-lg-4 col-md-9 col-sm-8">
                             <div class="input-group">
                                <input type="text" class="form-control {{$errors->has('maxdate')?'is-invalid':''}}" id="datepicker2" name="maxdate" value="{{ isset($task->max_date)?  \Carbon\Carbon::parse($task->max_date)->format('d/m/Y'):old('fecha') }}">
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="fa fa-calendar-check"></i>
										</span>
                                    </div>
                            </div>
                            @error('maxdate')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="maxdate" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Usuario asignado <span class="required-label">*</span></label>
							<div class="col-lg-4 col-md-9 col-sm-8">				
                            <select class="form-control {{$errors->has('user_id')?'is-invalid':''}}" name="user_id"  value="{old('usuario') }}">
								<option>Seleccione un Usuario</option>
                            @foreach($users as $u)
                                <option value="{{$u->id}}" {{ ( $u->id == $task->user_id) ? 'selected' : '' }}>{{$u->name}} {{$u->last_name}}</option>
                            @endforeach					
							</select>
                            @error('user_id')
                                    <small class="text-danger">{{ $message }}</small>
                            @enderror
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