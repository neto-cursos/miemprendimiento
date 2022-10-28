@include('admin.layouts.header')

<body class="g-sidenav-show  bg-gray-200">

    <!-- Begin page -->
    <!--div id="layout-wrapper"-->
    @include('admin.layouts.sidebar-left')
    @yield('sidebar-left')
    
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        @include('admin.layouts.nav-horizontal')
        @yield('navbar-top')

    <!--/div-->
    <!-- END layout-wrapper -->
    <!--div class="main-content"-->

        <!--div class="page-content"-->
        <div class="container-fluid py-7 px-2 px-md-4">
            @yield('content')

            <!-- Right bar overlay-->
            <!--div class="rightbar-overlay"--><!--/div-->


            @include('admin.layouts.footer')
            @yield('footer')
        </div>
    </main>   
    @include('admin.layouts.jslib')
    @yield('jslibrary')         
</body>

</html>