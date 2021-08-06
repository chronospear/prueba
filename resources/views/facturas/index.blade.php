@extends('layouts.template')


@section('content')
<div class="col-md-12">
		<div class="card">
			<div class="card-header">
            <div class="d-flex align-items-center">
					<h4 class="card-title">Facturas</h4>
                    <a class="btn btn-primary btn-round ml-auto" href="{{ route('facturas.create') }}">
					      <i class="fa fa-plus"></i>
						  Nueva Factura
					</a>
				</div>
			</div>

            <div class="card-body">
			<div class="table-responsive">
			<table id="datatable" class="display table table-striped table-hover" >
			<thead class="">
				<tr>
				<th scope="col">#</th>
                <th scope="col">factura</th>
                <th scope="col">fecha</th>
				<th scope="col">Usuario</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Tipo</th>
                <th scope="col">Total</th>
				<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
            @foreach ($facturas as $f)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>N° {{$f->id }}</td>
            <td>{{\Carbon\Carbon::parse($f->date)->format('d/m/Y')}}</td>
            <td>{{$f->user->name ?? 'Sin'}} {{$f->user->last_name ?? 'Usuario'}}</td>
            <td>{{$f->seller->name ?? 'Sin'}} {{$f->seller->last_name ?? 'Vendedor'}}</td>
            <td>{{$f->type }}</td>
            <td>$ {{number_format($f->totalproducts())}}</td>
            <td><div class="form-button-action">
                        <a type="button" href="{{ route('facturas.show', $f->id) }}" data-toggle="tooltip"
                            title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ver">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a type="button" href="{{ route('facturas.edit', $f->id) }}"
                         data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
                         data-original-title="Editar">
                         <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-link btn-danger  remove" data-id="{{ $f->id }}" data-action="{{ route('facturas.destroy',$f->id) }}"  data-original-title="Eliminar"><i class="fa fa-times"></i></button>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
			</div>						
			</div>
		</div>

        
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title">Facturas con mas de 100 productos</h4>
				</div>
			</div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable2" class="display table table-striped table-hover" >
                        <thead class="">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id Factura</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($productosf as $p)
                          <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$p}}</td>
                          <td><div class="form-button-action">
                        <a type="button" href="{{ route('facturas.show', $p) }}" data-toggle="tooltip"
                            title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ver">
                            <i class="fa fa-eye"></i>
                        </a>
                        </div>
                         </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>						
			</div>
            </div>
	

        <div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title">Productos sobre el Millón</h4>
				</div>
			</div>

            <div class="card-body">
                <div class="table-responsive">
                     <table id="datatable3" class="display table table-striped table-hover" >
                    <thead class="">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($productos as $m)
                     <tr>
                     <th scope="row">{{$loop->iteration}}</th>
                     <td>{{$m}}</td>
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