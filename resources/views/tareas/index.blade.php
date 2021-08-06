@extends('layouts.template')

@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title">Tareas</h4>
                  <a class="btn btn-primary btn-round ml-auto" href="{{ route('tareas.create') }}">
					      <i class="fa fa-plus"></i>
						  Nueva tarea
					        </a>
				</div>
			</div>

            <div class="card-body">
			<div class="table-responsive">
			<table id="datatable" class="display table table-striped table-hover" >
			<thead class="">
				<tr>
				<th scope="col">#</th>
                <th scope="col">Tarea</th>
				<th scope="col">Autor</th>
                <th scope="col">Usuario asignado</th>
                <th scope="col">Fecha estimada de ejucción</th>
                <th scope="col">Fecha maxima de ejecución</th>
				<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
            @foreach ($task as $t)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$t->name}}</td>
            <td>{{$t->author->name}} {{$t->author->last_name}}</td> 
            <td>{{$t->user->name ?? 'sin'}} {{$t->user->last_name ?? 'Usuario'}}</td> 
            <td>{{ \Carbon\Carbon::parse($t->estimated_date)->format('d/m/Y')}}</td>  
            @if (\Carbon\Carbon::now() >= $t->max_date)  
            <td class="text-white bg-danger">
            Fecha expirada
            @else
            <td>
            @endif
            {{ \Carbon\Carbon::parse($t->max_date)->format('d/m/Y')}}</td>
        
            <td><div class="form-button-action">
                        <a type="button" href="{{ route('tareas.show', $t->id) }}" data-toggle="tooltip"
                            title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ver">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a type="button" href="{{ route('tareas.edit', $t->id) }}"
                         data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                         data-original-title="Editar">
                         <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-link btn-danger  remove" data-id="{{ $t->id }}" data-action="{{ route('tareas.destroy',$t->id) }}"  data-original-title="Eliminar"><i class="fa fa-times"></i></button>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
			</div>						
			</div>
		</div>



@section('js')
<script src="../../js/remove.js"></script>
@endsection
@endsection