<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-bs-theme="dark" data-body-image="img-1" data-preloader="disable">

<head>
   
     @include('layouts.head')
   
</head>

<body>
    <div id="layout-wrapper">
        @include('layouts.navbarheader')
        @include('layouts.notificationModel')
        @include('layouts.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
             @yield("content")

                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.preloader')
    @include('layouts.cutomizer')
    @include('layouts.script')
</body>

</html>
