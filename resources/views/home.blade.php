@extends('layouts.template')

@section('content')
<div class="panel-header bg-secondary-gradient">
		<div class="page-inner pt-5 pb-5">
			<h2 class="text-white pb-2">Bienvenido/a {{Auth::user()->name}} {{Auth::user()->last_name}}</h2>
				<h5 class="text-white op-7 mb-2">Disfruta de tu visita.</h5>
		</div>
</div>
@endsection