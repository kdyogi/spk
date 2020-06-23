<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistem Pendukung Keputusan</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
		type="text/css">
	<link href="{{ url('assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ url('assets/js/main/jquery.min.js')}}"></script>
	<script src="{{ url('assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ url('assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ url('assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{ url('assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script src="{{ url('assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{ url('assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{ url('assets/js/plugins/pickers/daterangepicker.js')}}"></script>

	<script src="{{ url('assets/js/app.js')}}"></script>
	<script src="{{ url('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{ url('assets/js/demo_pages/datatables_basic.js')}}"></script>
	<script src="{{ url('assets/js/demo_pages/datatables_advanced.js')}}"></script>

	{{-- Sweetalert --}}
	<script src="{{ url('assets/js/sweetalert2.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

	<link rel="icon" type="image/png" href="{{ url('assets/images/favicon.png') }}">

	{{-- <script src="{{ url('assets/js/plugins/forms/selects/select2.min.js')}}"></script> --}}
	
	{{-- <script src="assets/js/demo_pages/dashboard.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/lines.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
	<script src="assets/js/demo_charts/pages/dashboard/light/bullets.js"></script> --}}
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="{{ '/' }}" class="d-inline-block">
				<img src="{{ url('assets/images/logo.png')}}" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
                </li>
                
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">
				{{-- @foreach ($user as $user) --}}
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
						data-toggle="dropdown">
						<img src="{{ url('assets/images/demo/users/face11.jpg')}}" class="rounded-circle mr-2" height="34" alt="">
						{{-- <span>{{ auth()->user()->level_user == 'Admin' ? $user->admin['nama_admin'] : $user->calonSiswa['nama_calonSiswa'] }}</span> --}}
						<span>
							<?php
								$test = auth()->user()->email;
								$kata = explode('@', $test);
								echo ucfirst($kata[0]);
							?>
						</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item" data-toggle="modal" data-target="#profil{{Auth::user()->id}}"><i class="icon-user-plus"></i> My profile</a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
                </li>
                {{-- @endforeach --}}
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="{{ url('assets/images/demo/users/face11.jpg')}}" width="38" height="38"
										class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">
									<?php
										$test = auth()->user()->email;
										$kata = explode('@', $test);
										echo ucfirst($kata[0]);
									?>
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header">
							<div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
								title="Main"></i>
						</li>
						<li class="nav-item">
							<a href="{{ url ('/') }}" class="nav-link @yield('dashboard')">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu @yield('menu-insert')">
							<a href="#" class="nav-link @yield('insert')"><i class="icon-copy"></i> <span>Insert Data</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Insert">
								@if (auth()->user()->level_user == 'Admin')
								<li class="nav-item"><a href="{{ url('/insert/kriteria') }}" class="nav-link @yield('link-active-insert-kriteria', 'menu-insert-kriteria')">Kriteria</a>
								</li>
								<li class="nav-item"><a href="{{ url('/insert/pengguna') }}" class="nav-link @yield('link-active-insert-pengguna', 'menu-insert-pengguna')">Pengguna</a>
								</li>
								<li class="nav-item"><a href="{{ url('/insert/alternatif') }}" class="nav-link @yield('link-active-insert-alternatif', 'menu-insert-alternatif')">Alternatif Default</a>
								@endif
								<li class="nav-item"><a href="{{ url('/insert/alternatif') }}" class="nav-link @yield('link-active-insert-alternatif', 'menu-insert-alternatif')">Alternatif Pilihan Siswa</a>
								</li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu @yield('menu-view')">
							<a href="#" class="nav-link @yield('link-active-view')"><i class="icon-color-sampler"></i> <span>View Data</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="View">
								<li class="nav-item @yield('menu-view-kriteria')"><a href="{{ url('/view/kriteria') }}" class="nav-link">Kriteria</a></li>
								@if (auth()->user()->level_user == 'Admin')
									<li class="nav-item"><a href="{{ url('/view/alternatif') }}" class="nav-link @yield('link-active-alter')">Alternatif</a></li>
								@else
									<li class="nav-item nav-item-submenu @yield('menu-view-alternatif')">
										<a href="#" class="nav-link">Alternatif</a>
										<ul class="nav nav-group-sub">
											<li class="nav-item"><a href="{{ url('/view/alternatif') }}" class="nav-link @yield('link-active-alter')">Alternatif Default</a></li>
											<li class="nav-item"><a href="{{ url('/view/alternatif/user') }}" class="nav-link @yield('link-active-alternatif')">Alternatif Pilihan Siswa</a></li>
										</ul>
									</li>
								@endif
								
								@if (auth()->user()->level_user == 'Admin')
									<li class="nav-item"><a href="{{ url('/view/pengguna') }}" class="nav-link @yield('link-active-pengguna')">Pengguna</a></li>
								@endif
							</ul>
						</li>
						<li class="nav-item nav-item-submenu @yield('menu-perhitungan')">
							<a href="#" class="nav-link @yield('link-active-perhitungan')"><i class="icon-calculator3"></i> <span>Perhitungan</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="View">
								<li class="nav-item"><a href="{{ url('/perhitungan/default') }}" class="nav-link @yield('link-active-perhitungan-default')">Alternatif Default</a></li>
								@if (Auth::user()->level_user != 'Admin')
									<li class="nav-item"><a href="{{ url('/perhitungan') }}" class="nav-link @yield('link-active-perhitungan')">Alternatif Pilihan Siswa</a></li>
								@endif
							</ul>
							{{-- <a href="{{ url ('/perhitungan') }}" class="nav-link @yield('link-active-perhitungan')">
								<i class="icon-home4"></i>
								<span>
									Perhitungan
								</span>
							</a> --}}
						</li>
						<!-- /main -->

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

            <!-- Page header -->
			<div class="page-header page-header-light">
    
                    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="@yield('url')" class="breadcrumb-item"><i class="@yield('icon') mr-2"></i> @yield('pwd')</a>
                                <span class="breadcrumb-item active">@yield('now')</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page header -->

			@yield('content')
            
		</div>
		<!-- /page content -->

</body>

</html>