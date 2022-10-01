<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$title?? "Home"}} | {{env('APP_NAME')}}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

<!--  -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('auto_rental/assets/images/favicon_io/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('auto_rental/assets/images/favicon_io/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('auto_rental/assets/images/favicon_io/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('auto_rental/assets/images/favicon_io/site.webmanifest')}}">

        <link href="{{asset('auto_rental/assets/css/bootstrap.min.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/font-awesome.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/font/flaticon.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/slick.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/ion.rangeSlider.min.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/datepicker.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/magnific-popup.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/nice-select.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/style.css')}}" rel="stylesheet">

        <link href="{{asset('auto_rental/assets/css/responsive.css')}}" rel="stylesheet">
        @vite(['resources/css/toastr.css', 'resources/js/toastr.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-light">
       
       <!-- Page Heading -->
       <header class="header">
           <div class="topbar bg-custom-blue">
               <div class="container">
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="left-side">
                               <ul class="custom-flex">
                                   <li>
                                       <a href="#" class="text-custom-white">
                                           <i class="fab fa-facebook-f"></i>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="#" class="text-custom-white">
                                       <i class="fab fa-twitter"></i>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="#" class="text-custom-white">
                                           <i class="fab fa-instagram"></i>
                                       </a>
                                   </li>
                                   <li>
                                        <a href="#" class="text-custom-white">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                   </li>
                                   <li>
                                       <a href="#" class="text-custom-white">
                                           <i class="fab fa-linkedin"></i>
                                       </a>
                                   </li>
                               </ul>
                           </div>
                       </div>
                       <div class="col-sm-6">
                           <div class="right-side">
                               <ul class="custom-flex">
                                   <li>
                                       <a href="{{route('galleries.index')}}" class="text-custom-white">Gallery</a>
                                   </li>
                                   @if (Route::has('login'))
                                       @guest
                                           <li>
                                               <a href="{{route('login')}}" class="text-custom-white">Login</a>
                                           </li>
                                           <li>
                                               <a href="{{route('register')}}" class="text-custom-white">Sign up</a>
                                           </li>
                                       @endguest
                                       @auth
                                           <li>
                                               <a href="{{route('dashboard')}}" class="text-custom-white">Dashboard</a>
                                           </li>
                                           <li>
                                               <a href="{{ route('logout') }}" class="text-custom-white"
                                                   onclick="event.preventDefault();
                                                       document.getElementById('logout-form-top').submit();" class="cmn--btn">
                                               Logout
                                               </a>
                                               <form method="POST" id="logout-form-top" action="{{ route('logout') }}">
                                                   @csrf
                                               </form>
                                           </li>
                                       @endauth
                                   @endif
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>


           <div class="navigation">
               <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="main-navigation">
                               <div class="logo">
                                   <a href="{{route('home')}}">
                                       <img src="{{asset('auto_rental/assets/images/car-rental-logo.jpg')}}" class="img-fluid rounded-pill image-fit" alt="img">
                                   </a>
                               </div>
                               <div class="main-menu">
                                   <div class="logo">
                                       <a href="{{route('home')}}">
                                           <img src="{{asset('auto_rental/assets/images/car-rental-logo.jpg')}}" class="img-fluid rounded-pill image-fit" alt="img">
                                       </a>
                                   </div>
                                   <nav>
                                       <ul class="custom-flex">
                                           <li class="menu-item {{request()->routeIs('home')?'active':''}} ">
                                               <a href="{{route('home')}}" class="text-light-dark"> 
                                                   <i class="fas fa-home"></i>  Home
                                               </a>
                                           </li>

                                           <li class="menu-item {{request()->routeIs('cars*')?'active':''}} ">
                                               <a href="{{route('cars.index')}}" class="text-light-dark">
                                               <i class="fas fa-car"></i> Cars
                                               </a>
                                           </li>
                                           <li class="menu-item {{request()->routeIs('services*')?'active':''}}">
                                               <a href="{{route('services.index')}}" class="text-light-dark">
                                                   <i class="fas fa-box-open"></i> Services
                                               </a>
                                           </li>
                                   
                                           <li class="menu-item {{request()->routeIs('about-us')?'active':''}}">
                                               <a href="{{route('about-us')}}" class="text-light-dark">
                                                   <i class="fas fa-users"></i> About Us
                                               </a>
                                           </li>

                                           <li class="menu-item menu-item-has-children {{request()->routeIs('dashboard*')?'active':''}}">
                                               <a href="#" class="text-light-dark">             
                                                   <i class="fas fa-user"></i>
                                                   Account
                                               </a>
                                               <ul class="custom sub-menu">
                                                   @guest
                                                       <li class="menu-item">
                                                           <a href="{{route('register')}}" class="text-custom-white">
                                                               <i class="fas fa-user-plus"></i> Register
                                                           </a>
                                                       </li>
                                                       <li class="menu-item">
                                                           <a href="{{route('login')}}" class="text-custom-white">
                                                              <i class="fas fa-sign-in"></i> Login
                                                           </a>
                                                       </li>
                                                   @endguest
                                                   @auth
                                                   <li class="menu-item {{request()->routeIs('dashboard*')?'active':''}}">
                                                       <a href="{{route('dashboard')}}" class="text-custom-white ">
                                                           <i class="fas fa-tachometer-alt"></i> Dashboard
                                                       </a>
                                                   </li>
                                                   <li class="menu-item menu-item-has-children">
                                                       <a href="" class="text-custom-white">
                                                       <i class="fas fa-user-cog"></i> Manage Account
                                                       </a>
                                                       <ul class="custom sub-menu">
                                                           <li class="menu-item"> 
                                                               <a href="{{ route('profile.show') }}" class="text-custom-white">
                                                                   <i class="fas fa-user-circle"></i> Profile
                                                               </a>
                                                           </li>
                                                           @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                               <li class="menu-item"> 
                                                                   <a href="{{ route('api-tokens.index') }}" class="text-custom-white">
                                                                       {{ __('API Tokens') }}
                                                                   </a>
                                                               </li>
                                                           @endif
                                                       </ul>
                                                   </li>
                                                   @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                       <li class="menu-item menu-item-has-children"> 
                                                           <a href="#" class="text-custom-white">
                                                               <i class="fas fa-users-cog"></i> Manage Team 
                                                           </a>
                                                           <ul class="custom sub-menu">
                                                               <li class="menu-item">
                                                                   <a href="{{route('teams.show', Auth::user()->currentTeam->id) }}" class="text-custom-white">
                                                                       <i class="fas fa-users"></i> {{ Auth::user()->currentTeam->name }}
                                                                   </a>
                                                               </li>
                                                               @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                               <li class="menu-item">
                                                                   <a href="{{ route('teams.create') }}" class="text-custom-white">
                                                                       <i class="fas fa-plus-circle"></i> Create New Team 
                                                                   </a>
                                                               </li>
                                                               @endcan
                                                           </ul>
                                                       </li>
                                                   @endif
                                                   <li class="menu-item">
                                                        <a href="{{route('bookings.index')}}" class="text-custom-white">
                                                            <i class="fas fa-book-open"></i> My Rents
                                                        </a>
                                                   </li>
                                                   @if(auth()->user()->is_staff)
                                                   <li class="menu-item border border-y {{request()->routeIs('admin*')?'active':''}}">
                                                       <a href="{{route('admin.dashboard')}}" class="text-custom-white ">
                                                           <i class="fas fa-cogs-alt"></i> Admin Dashboard
                                                       </a>
                                                   </li>
                                                   @endif
                                                   <li class="menu-item">
                                                       <a href="{{ route('logout') }}" class="text-custom-white"
                                                                       onclick="event.preventDefault();
                                                                               document.getElementById('logout-form').submit();" class="cmn--btn">
                                                               <i class="fas fa-sign-out"></i> Logout
                                                       </a>
                                                       <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                           @csrf
                                                       </form>
                                                   </li>
                                                   @endauth
                                               </ul>
                                           </li>

                                        
                                       </ul>
                                   </nav>
                                   <div class="cta-btn">
                                       <a href="{{route('contact-us')}}" class="btn-first btn-submit">Contact Us</a>
                                   </div>
                               </div>
                               <div class="hamburger-menu">
                                   <div class="menu-btn">
                                       <span></span>
                                       <span></span>
                                       <span></span>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </header>
       
       <!-- Page Content -->
       <main >
           
           @if(!request()->routeIs('home'))
               <div class="subheader normal-bg section-padding">
                   <div class="container">
                       <div class="row">
                           <div class="col-12">
                               <h1 class="text-custom-white">{{$subheader?? ""}}</h1>
                               <ul class="custom-flex justify-content-center">
                                   <li class="fw-500">
                                       <a href="/" class="text-custom-white">Home</a>
                                   </li>
                                   {{ $subheader_links?? "" }}
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           @endif
           <div class="container">
               <div class="row">
                   <div class="col-12">   
                       @if (session('error'))
                           <div class="alert alert-danger alert-dismissible fade show">
                               {{ session('error') }}
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                           </div>
                       @endif

                       @if (session('status'))
                           <div class="alert alert-success alert-dismissible fade show">
                               {{ session('status') }}
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                           </div>
                       @endif
                   </div>
               </div>
           </div>
           {{ $slot }}
       </main>

       @stack('modals')

       @livewireScripts

       @stack('scripts')
       <section class="section-padding partners">
           <div class="container">
               <div class="section-header">
                   <div class="section-heading">
                       <h3 class="text-custom-black">Our Partners</h3>
                       <div class="section-description">
                           <p class="text-light-dark">With partner with the best cars markers to give you the best of choice.</p>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-12">
                       <div class="partners-slider arrow-layout-2 row">
                            <div class="slide-item col-12">
                               <div class="partner-box bx-wrapper animate-img">
                                   <a target="_blanck" href="https://www.innosongroup.com">
                                       <img src="{{asset('auto_rental/assets/images/partners/innoson.jpeg')}}" class="img-fluid image-fit" alt="img">
                                   </a>
                               </div>
                           </div>
                           <div class="slide-item col-12">
                               <div class="partner-box bx-wrapper animate-img">
                                   <a target="_blanck" href="https://www.toyota.com">
                                       <img src="{{asset('auto_rental/assets/images/partners/toyota.png')}}" class="img-fluid image-fit" alt="img">
                                   </a>
                               </div>
                           </div>
                           <div class="slide-item col-12">
                               <div class="partner-box bx-wrapper animate-img">
                                   <a target="_blanck" href="https://www.nissan.ng/en/">
                                       <img src="{{asset('auto_rental/assets/images/partners/nissan.jpeg')}}" class="img-fluid image-fit" alt="img">
                                   </a>
                               </div>
                           </div>
                           <div class="slide-item col-12">
                               <div class="partner-box bx-wrapper animate-img">
                                   <a target="_blanck" href="https://www.bmw.com">
                                       <img src="{{asset('auto_rental/assets/images/partners/bmw.jpeg')}}" class="img-fluid image-fit" alt="img">
                                   </a>
                               </div>
                           </div>
                           <div class="slide-item col-12">
                               <div class="partner-box bx-wrapper animate-img">
                                   <a target="_blanck" href="https://www.audi.com/">
                                       <img src="{{asset('auto_rental/assets/images/partners/audi.png')}}" class="img-fluid image-fit" alt="img">
                                   </a>
                               </div>
                           </div>
                           <div class="slide-item col-12">
                               <div class="partner-box bx-wrapper animate-img">
                                   <a target="_blanck" href="https://www.mitsubishi-motors.com/en/index.html">
                                       <img src="{{asset('auto_rental/assets/images/partners/mitsubishi.jpg')}}" class="img-fluid image-fit" alt="img">
                                   </a>
                               </div>
                           </div>
                           <div class="slide-item col-12">
                               <div class="partner-box bx-wrapper animate-img">
                                   <a target="_blanck" href="https://www.opel.com/">
                                       <img src="{{asset('auto_rental/assets/images/partners/opel.jpeg')}}" class="img-fluid image-fit" alt="img">
                                   </a>
                               </div>
                           </div>
                           <div class="slide-item col-12">
                               <div class="partner-box bx-wrapper animate-img">
                                   <a target="_blanck" href="https://www.peugeot.com/en/">
                                       <img src="{{asset('auto_rental/assets/images/partners/peugeot.jpg')}}" class="img-fluid image-fit" alt="img">
                                   </a>
                               </div>
                           </div>
                           <div class="slide-item col-12">
                               <div class="partner-box bx-wrapper animate-img">
                                   <a target="_blanck" href="http://www.honda.com/">
                                       <img src="{{asset('auto_rental/assets/images/partners/honda.png')}}" class="img-fluid image-fit" alt="img">
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>

       <footer class="section-padding footer">
           <div class="container">
               <div class="row">
                   <div class="col-lg-3 col-md-6">
                       <div class="footer-box mb-md-40">
                           <h4 class="text-custom-white fw-600">About Us</h4>
                           <p class="text-custom-white">{{env('APP_NAME')}} is a Nigerian based company that provides car rental services. Our main priority is to serve you with the best comfort of our classic cars </p>
                           <ul class="custom-flex socials">
                               <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-facebook-f"></i></a></li>
                               <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-whatsapp"></i></a></li> 
                               <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-twitter"></i></a></li>
                               <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-linkedin"></i></a></li>
                               <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-instagram"></i></a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-3 col-md-6">
                       <div class="footer-box mb-md-40">
                           <h4 class="text-custom-white fw-600">Quick Links</h4>
                           <ul class="custom links">
                               <li>
                                   <a href="{{route('home')}}" class="text-custom-white">Home</a>
                               </li>
                              
                               <li>
                                   <a href="{{route('cars.index')}}" class="text-custom-white">Cars</a>
                               </li>
                               <li>
                                   <a href="{{route('galleries.index')}}" class="text-custom-white">Gallery</a>
                               </li>
                               <li>
                                   <a href="{{route('contact-us')}}" class="text-custom-white">Contact Us</a>
                               </li>
                              
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-3 col-md-6">
                       <div class="footer-box mb-sm-40">
                            <h4 class="text-custom-white fw-600">
                                <a href="{{route('galleries.index')}}">Gallery</a>  
                            </h4>
                           <ul class="custom instagram gallery-grid">
                                @foreach (App\Models\Image::orderBy('created_at', 'desc')->take(6)->get() as $image)
                               <li>
                                   <a href="{{Storage::url($image->url)}}" class="text-custom-white popup">
                                       <img src="{{Storage::url($image->url)}}" class="image-fit" alt="img">    
                                   </a>
                               </li>
                               @endforeach
                           </ul>
                       </div>
                   </div>  
                   <div class="col-lg-3 col-md-6">
                       <div class="footer-box mb-sm-40">
                           <h4 class="text-custom-white fw-600">Newsletter</h4>
                           <div class="newsletter">
                               <p class="text-custom-white">Get our lastest update on available cars and lot more</p>
                               <form>
                                   <div class="form-group">
                                       <input type="email" name="#" class="form-control form-control-custom" placeholder="Email address">
                                   </div>
                                   <button type="submit" class="btn-first btn-submit">Subscribe</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </footer>


       <div class="copyright">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <p class="text-custom-white">© {{env('APP_NAME')}} - @php echo date('Y'); @endphp | All Right Reserved. <a href="#" class="text-custom-blue">Designed By {{env('APP_NAME')}}</a></p>
                   </div>
               </div>
           </div>
       </div>

       <div id="back-top" class="back-top">
           <a href="#top"><i class="flaticon-arrows"></i></a>
       </div>


       <script src="{{asset('auto_rental/assets/js/jquery.min.js')}}"></script>

       <script src="{{asset('auto_rental/assets/js/popper.min.js')}}"></script>

       <script src="{{asset('auto_rental/assets/js/bootstrap.min.js')}}"></script>

       <script src="{{asset('auto_rental/assets/js/ion.rangeSlider.min.js')}}"></script>

       <script src="{{asset('auto_rental/assets/js/slick.min.js')}}"></script>

       <script src="{{asset('auto_rental/assets/js/datepicker.js')}}"></script>
       <script src="{{asset('auto_rental/assets/js/datepicker.en.js')}}"></script>

       <script src="{{asset('auto_rental/assets/js/isotope.pkgd.min.js')}}"></script>

       <script src="{{asset('auto_rental/assets/js/jquery.nice-select.js')}}"></script>

       <script src="{{asset('auto_rental/assets/js/jquery.magnific-popup.min.js')}}"></script>

       <script src="{{asset('auto_rental/assets/js/custom.js')}}"></script>
       
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

       <!-- https://github.com/CodeSeven/toastr -->

       

       <script type="text/javascript">
           $(document).ready(function(){
               toastr.options = {
                   "closeButton": true,
                   "debug": false,
                   "newestOnTop": true,
                   "progressBar": true,
                   "positionClass": "toast-top-right",
                   "preventDuplicates": true,
                   "onclick": null,
                   "showDuration": "50000",
                   "hideDuration": "1000",
                   "timeOut": "5000",
                   "extendedTimeOut": "1000",
                   "showMethod": "slideDown",
                   "hideMethod": "slideUp",
                   "closeMethod": "slideUp"
               }
             
               window.addEventListener('success', event => {
                   toastr.success(event.detail.message?event.detail.message:"success");
               });

               window.addEventListener('error', event => {
                   toastr.error(event.detail.message?event.detail.message:"error");
               });

               window.addEventListener('info', event => {
                   toastr.info(event.detail.message?event.detail.message:"info");
               });

               window.addEventListener('warning', event => {
                   toastr.warning(event.detail.message?event.detail.message:"warning");
               });

            //    $('#summernote').summernote();
           }); 
           
       </script>
       

   </body>
</html>
