 <div class="app-menu navbar-menu">
     <!-- LOGO -->
     <div class="navbar-brand-box">
         <!-- Dark Logo-->
         <a href="index.html" class="logo logo-dark">
             <span class="logo-sm">
                 {{-- <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22"> --}}
                 {{-- <h1 class="mt-4">SERVICE APP</h1> --}}
             </span>
             <span class="logo-lg">
                 {{-- <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17"> --}}
                 <h1 class="mt-4">SERVICE APP</h1>
             </span>
         </a>
         <!-- Light Logo-->
         <a href="index.html" class="logo logo-light">
             <span class="logo-sm">
                 {{-- <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22"> --}}
                 {{-- <h1 class="mt-4">SERVICE APP</h1> --}}
             </span>
             <span class="logo-lg">
                 {{-- <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="17"> --}}
                 <h1 class="mt-4">SERVICE APP</h1>
             </span>
         </a>
         <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
             id="vertical-hover">
             <i class="ri-record-circle-line"></i>
         </button>
     </div>

     <div id="scrollbar">
         <div class="container-fluid">

             <div id="two-column-menu">
             </div>
             <ul class="navbar-nav" id="navbar-nav">
                 <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                 <nav></nav>

                 {{-- <li class="nav-item">
                            <a class="nav-link menu-link" href="widgets.html">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets"></span>
                            </a>
                        </li> --}}


                 <li class="nav-item">
                     <a class="nav-link menu-link" href="{{route('register')}}">
                         <i class="ri-honour-line"></i><span>Users</span>
                     </a>
                 </li>
                 <li class="nav-item">
                <a class="nav-link menu-link" href="{{route('login')}}">
                         <i class="ri-honour-line"></i><span>Services</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link menu-link" href="">
                         <i class="ri-honour-line"></i><span>Categories</span>
                     </a>
                 </li>




             </ul>
         </div>
         <!-- Sidebar -->
     </div>

     <div class="sidebar-background"></div>
 </div>
 <!-- Left Sidebar End -->
 <!-- Vertical Overlay-->
 <div class="vertical-overlay"></div>
