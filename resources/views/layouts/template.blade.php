
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Desafios - Danilo Lueiza</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="https://cdn.iconscout.com/icon/free/png-256/d-letter-7-897200.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/millenium2.min.css">

</head>
<body>
	<div class="wrapper">
    <div class="main-header" data-background-color="dark2">
			<div class="nav-top">
				<div class="container d-flex flex-row">
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="icon-menu"></i>
						</span>
					</button>
					<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>

					<!-- Navbar Header -->
					<nav class="navbar navbar-header navbar-expand-lg">

						<div class="container-fluid">
							<div class="collapse" id="search-nav">
								<form class="navbar-left navbar-form nav-search mr-md-3">
									<div class="input-group">
									</div>
								</form>
							</div>
                            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            
										
									
                            <li class="nav-item dropdown hidden-caret">
									<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
										<div class="avatar-sm">
											<img src="../../assets/img/profile.png" alt="..." class="avatar-img rounded-circle">
										</div>
									</a>
									<ul class="dropdown-menu dropdown-user animated fadeIn">
										<div class="dropdown-user-scroll scrollbar-outer">
										<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../../assets/img/profile.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{Auth::user()->name}} {{Auth::user()->last_name}} </h4>
												<p class="text-muted">{{Auth::user()->email}} </p>
											</div>
										</div>
									</li>
											<li>
												<a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar Sesión</a>
													  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       				 @csrf
                                    				</form>
											</li>
										</div>
									</ul>
								</li> 
							</ul>
						</div>
					</nav>
                	<!-- End Navbar -->
				</div>
			</div>

            <div class="nav-bottom bg-white">
				
				<div class="container d-flex flex-row">
					<ul class="nav page-navigation ">
						<li class="nav-item active">
							<a class="nav-link" href="{{route('home')}}">
								<i class="link-icon icon-screen-desktop"></i>
								<span class="menu-title">Inicio</span>
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link" href="{{route ('facturas.index')}}">
							<i class="link-icon fas fa-file-invoice-dollar"></i>
								<span class="menu-title">Facturas</span>
							</a>

							<div class="navbar-dropdown animated fadeIn">
								<ul>
									<li>
										<a href="{{route('vendedores.index')}}">Vendedores</a>
									</li>
								</ul>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{route('productos.index')}}">
								<i class="link-icon fas fa-box"></i>
								<span class="menu-title">Productos</span>
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link" href="{{url('info')}}">
								<i class="link-icon fas fa-info"></i>
								<span class="menu-title">Desafios </span>
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link" href="{{route('tareas.index')}}">
								<i class="link-icon fas fa-tasks"></i>
								<span class="menu-title">Tareas</span>
							</a>
						</li>
                    </ul>
				</div>
			</div>
		</div>
    {{-- PANEL PRINCIPAL --}}
    <div class="main-panel">
            <div class="content">
                @if (session('errors'))
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        @if (is_object($errors))
                            @foreach ($errors->all() as $error)
                                * {{ $error }} <br>
                            @endforeach
                        @else
                            {{ $errors }}
                        @endif
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status') }}
                    </div>
                @endif
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
    {{-- Footer --}}
    <footer class="footer">
			<div class="container">
				<nav class="pull-left">
					<ul class="nav">
						<li class="nav-item">
								Desafios
							</a>
						</li>
					</ul>
				</nav>
				<div class="copyright ml-auto">
					2021, Developing by Danilo Lueiza
				</div>				
			</div>
		</footer>
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="../../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Moment JS -->
	<script src="../../assets/js/plugin/moment/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>

	<!-- Millenium JS -->
	<script src="../../assets/js/millenium.min.js"></script>
	<!-- Sweet Alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	

<!-- DateTimePicker -->
<script src="../../assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/es.js"></script>
<script>
$('#datepicker, #datepicker2').datetimepicker({
	format: 'DD/MM/YYYY',
	locale: 'es'
	
});
</script>

<script>
	$(document).ready(function() {
		$('#datatable, #datatable2, #datatable3').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"},
        });
        });
	</script>

	@yield('js')

</body>
</html>