
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{asset('assets/admin/img/icons/icon-48x48.png')}}" />
	@yield('css')


	<title>@yield('title') | Dashboard</title>

	<link href="{{asset('assets/admin/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">{{config('app.name')}}</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item {{request()->is('/dashboard*') ? 'active' : ''}}">
						<a class="sidebar-link" href="{{route('dashboard')}}">
              <i class="allign-middle" data-feather="home"></i> <span class="align-middle">Home</span>
            </a>
					</li>

					<li class="sidebar-item {{request()->is('dashboard/about*') ? 'active' : ''}}">
						<a class="sidebar-link" href="{{route('admin.about')}}">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">About</span>
            </a>
					</li>

					<li class="sidebar-item {{request()->is('dashboard/contact*') ? 'active' : ''}}">
						<a class="sidebar-link" href="{{route('admin.contact')}}">
              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Contact</span>
            </a>
					</li>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"><span class="text-dark">{{Auth::user()->name}}</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								{{-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div> --}}
								<form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                    @csrf
                                    <button type="button" class="dropdown-item" id="logoutButton">Log out</button>
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="mb-3"><strong>@yield('header')</strong></h1>
                    @yield('content')
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="" target="_blank"><strong>Angkringan Viral</strong></a> - <a class="text-muted" href="" target="_blank"><strong>@ 2024</strong></a>								&copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

    @include('sweetalert::alert')
	<script src="{{asset('assets/admin/js/app.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		document.getElementById('logoutButton').addEventListener('click', function () {
			Swal.fire({
				title: 'Apakah Anda yakin ingin keluar?',
				text: "Anda harus login untuk mengakses halaman ini!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Logout!'
			}).then((result) => {
				if (result.isConfirmed) {
					document.getElementById('logoutForm').submit();
				}
			});
		});
	</script>
    @yield('js')

</body>

</html>