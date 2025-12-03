<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-bs-theme="dark" data-body-image="img-1" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Sign In | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />


    <style>
        .modal-backdrop {
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .modal-content {



            border: 2px solid #8C74AA !important;
            background: #0d1b2a !important;
            /* visible modal background */
            border-radius: 12px !important;
        }

        .dtr-modal {
            pointer-events: none !important;
        }

        .dtr-modal .dtr-modal-content {
            pointer-events: auto !important;
            z-index: 999999 !important;
            position: relative;
        }
    </style>






</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden card-bg-fill border-0 card-border-effect-none">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg1 h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                {{-- <a href="index.html" class="d-block">
                                                    <img src="assets/images/logo-light.png" alt=""
                                                        height="18">
                                                </a> --}}

                                                <h1 class="fw-bold h-50 fs-2">Service App</h1>
                                            </div>
                                            <div class="mt-auto">
                                                {{-- <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div> --}}

                                                <div id="qoutescarouselIndicators" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    {{-- <div class="carousel-indicators">
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="0" class="active" aria-current="true"
                                                            aria-label="Slide 1"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div> --}}
                                                    {{-- <div class="carousel-inner text-center text-white pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean
                                                                design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" The theme is really great with
                                                                an amazing customer support."</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean
                                                                design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <!-- end carousel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to Service App.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form id="loginform">

                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter email" required>
                                                </div>

                                                <div class="mb-3">
                                                    {{-- <div class="float-end">
                                                        <a href="auth-pass-reset-cover.html" class="text-muted">Forgot
                                                            password?</a>
                                                    </sodiv> --}}
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5 password-input"
                                                            placeholder="Enter password" id="password-input" required>
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>

                                                {{-- <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="auth-remember-check">
                                                    <label class="form-check-label" for="auth-remember-check">Remember
                                                        me</label>
                                                </div> --}}

                                                <div class="mt-4">
                                                    <button class="btn btn-primary w-100" type="submit">Sign
                                                        In</button>
                                                </div>

                                                {{-- <div class="mt-4 text-center">
                                                    <div class="signin-other-title">
                                                        <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                                    </div>

                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-primary btn-icon waves-effect waves-light"><i
                                                                class="ri-facebook-fill fs-16"></i></button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                                class="ri-google-fill fs-16"></i></button>
                                                        <button type="button"
                                                            class="btn btn-dark btn-icon waves-effect waves-light"><i
                                                                class="ri-github-fill fs-16"></i></button>
                                                        <button type="button"
                                                            class="btn btn-info btn-icon waves-effect waves-light"><i
                                                                class="ri-twitter-fill fs-16"></i></button>
                                                    </div>
                                                </div> --}}

                                            </form>
                                        </div>

                                        {{-- topmodal --}}
                                        <div id="topmodal" class="modal fade" tabindex="-1" aria-hidden="true"
                                            style="--bs-modal-backdrop-opacity:0.5;">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content  text-light bg-dark">
                                                    <div class="modal-body text-center p-5">
                                                        <lord-icon src="https://cdn.lordicon.com/pithnlch.json"
                                                            trigger="loop" colors="primary:#8C74AA,secondary:#08a88a"
                                                            style="width:120px;height:120px">
                                                        </lord-icon>
                                                        <div class="mt-4">
                                                            <h4 class="mb-3" id="loginheader"></h4>
                                                            <h5 class="text-muted mb-4">Welcome to ServiceApp💕</h5>
                                                            <div class=" gap-2 justify-content-center">
                                                                {{-- <button onclick="window.location.href='{{ route('login') }}'" type="button"
                                                                    class="btn btn-primary cursor-pointer  fw-medium"
                                                                    data-bs-dismiss="modal">LOG IN</button> --}}
                                                                {{-- <button type="button" class="btn btn-success"
                                                                    onclick="bootstrap.Modal.getInstance(document.getElementById('topmodal')).hide()">Completed</button> --}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}"
                                                    class="fw-semibold text-primary text-decoration-underline">
                                                    Signup</a> </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i>
                              
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src='{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}'></script>
    <script src='{{ asset('assets/libs/simplebar/simplebar.min.js') }}'></script>
    <script src='{{ asset('assets/libs/node-waves/waves.min.js') }}'></script>
    <script src='{{ asset('assets/libs/feather-icons/feather.min.js') }}'></script>
    <script src='{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}'></script>
    <script src='{{ asset('assets/js/plugins.js') }}'></script>

    <!-- password-addon init -->
    <script src='{{ asset('assets/js/pages/password-addon.init.js') }}'></script>
    <script>
        document.getElementById("loginform").addEventListener("submit", function(e) {
            e.preventDefault();
            fetch("http://127.0.0.1:8000/api/login", {
                    method: "POST",
                    headers: {
                        "content-type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        email: document.getElementById("email").value,
                        password: document.getElementById("password-input").value,

                    })
                })

                .then(res => res.json())
                .then(data => {
                    console.log(data);
                      let message = '';
                      let isSuccess=false;
               if(data.access_token)
               {
                message:"Login Successful.......Redirecting";
                isSuccess=true;
                localStorage.setItem("auth_token",data.access_token);

               }
                //  (typeof data.message === 'string') {
                //         message = data.message
                //     } else {
                  else{
                        data.user.email ??
                            data.user.password ??

                            "validation error";
                    }

                    document.getElementById("loginheader").innerHTML = message;
                    
                    let modelid = document.getElementById("topmodal");
                    let modal = new bootstrap.Modal(modelid);
                    modal.show()
                  if(isSuccess)
                  {
document.getElementById("loginform").reset();
setTimeout(() => {
     modal.hide();
window.location.href="/user";
                       
                    }, 1500);
                  }
                  else{
setTimeout(() => {

                        modal.hide()
                    }, 3000);
                  }
                    
            
                   
        
                })
                
                .catch(err => console.log(err))

        })
    </script>
</body>

</html>
