<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4">
            <h1><a href="/home" class="logo">{{config('app.name', 'Laravel')}}</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="/home"><span class="fa fa-home mr-3"></span> Home</a>
                </li>
                @can('user-list')
                <li>
                    <a href="/users"><span class="fa fa-user mr-3"></span> Usuarios</a>
                </li>
                @endcan
                @can('role-list')
                <li>
                    <a href="/roles"><span class="fa fa-briefcase mr-3"></span> Roles</a>
                </li>
                @endcan
                @can('permissions-list')
                <li>
                    <a href="/permissions"><span class="fa fa-sticky-note mr-3"></span> Permisos</a>
                </li>
                @endcan
                @can('client-list')
                <li>
                    <a href="/clientes/table"><span class="fa fa-suitcase mr-3"></span> Clientes</a>
                </li>
                @endcan
                @can('orders-list')
                <li>
                    <a href="/pedidos/index"><span class="fa fa-suitcase mr-3"></span> Pedidos</a>
                </li>
                @endcan

                {{-- <li>
                    <a href="#"><span class="fa fa-cogs mr-3"></span> Services</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-paper-plane mr-3"></span> Contacts</a>
                </li> --}}
            </ul>

            <div class="mb-5">

            </div>

            <div class="footer">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> Todos los derechos reservados <a href="#" target="_blank">Ferncol.com</a>
                </p>
            </div>

        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        @yield('content')
    </div>
</div>

<body>

</body>

</html>
