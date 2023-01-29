
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>My Market</title>
      @yield('extra-meta')
      @yield('extra-script')
    <link rel="stylesheet" href="{{('../node_modules/bootstrap-icons/font/fonts/bootstrap-icon.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('aos-master/dist/aos.css') }}">
    <link rel="stylesheet" href="{{asset ('css/themify-icons.css') }}" type="text/css">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

  </head>
  <body>
    
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Que cherchez-vous ..... ?" aria-label="Search">
          
        </form>
     
      </div>
      <div class="col-4 text-center">
      </div>
      
      <div class="col-4 d-flex justify-content-end align-items-center">
      <a href="{{route('Panier')}}">


      <button type="button" class="btn position-relative">
 <i class="ti-shopping-cart" style="font-size: 20px;"></i>
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
  {{ Cart::count() }}
    <span class="visually-hidden"></span>
  </span>
</button>
</a>      @if (Route::has('login'))
               
                    @auth
                        <a href="{{ url('/dashboard') }}" class="mx-4 text-dark"style="text-decoration:none">{{ Auth::user()->name }}</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="text-dark"style="text-decoration:none" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                               <i class="ti-power-off mx-2" style="font-size: 20px;"></i>
                            </a>
                        </form>
                 
                    @else
                        <a href="{{ route('login') }}" class="mx-4 text-dark"style="text-decoration:none" > <i class="ti-user" style="font-size: 20px;"></i></a>

                        @if (Route::has('register'))
                            <!-- <a href="{{ route('register') }}" class="btn btn-outline-danger">S'inscrire</a> -->
                        @endif
                    @endauth
              
            @endif
      </div>
    </div>
  </header>
  <div class="nav-scroller py-1 mb-2">
  <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('acceuil')}}" class="nav-link px-2 text-secondary">Acceuil</a></li>
         
        </ul>
      </div>
    </div>
  </div>
</div>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}} </strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('warning')}} </strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{session('danger')}} </strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@yield('content')







<footer class="text-center text-white" style="background-color:black">
  
  <div class="container p-4">
   
    
  </div>
  <div class="bg-dark text-center p-3" style="color: orange;">
    
    © 2022 Copyright:
    <a  style="color: orange;" href="https:Index.php">MY MARKET.com</a>
  </div>
</footer>
<script src="{{ asset('aos-master/dist/aos.js') }}"></script>
     <script>
      AOS.init();
    </script>
@yield('extra-js')
    
  </body>
</html>
