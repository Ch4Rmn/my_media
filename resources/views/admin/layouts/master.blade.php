<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/index.css')}}">

</head>

<body class="hold-transition sidebar-mini">


<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4 shadow-lg">
    <a href="{{ route('dashboard')}}" class="brand-link">

      <span class="brand-text font-weight-light text-warning  ">My Media App </span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('dashboard')}}" class="nav-link">
              <i class="fas fa-user-circle"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin#category')}}" class="nav-link">
              <i class="fas fa-list" ></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin#list')}}" class="nav-link">
              {{-- <i class="fas fa-list-ul"></i> --}}
              <i class="fas fa-bars fa-rotate-270" style="color: #2b00ff;"></i>
              {{-- <i class="fas fa-bars" style="color: #2b00ff;"></i> --}}
              <p>
                List
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="{{ route('admin#post')}}" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
                Post
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin#trendPost')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Trend Post
              </p>
            </a>
          </li>



          <li class="nav-item ">
            <form action="{{ route('logout')}}" method='POST' >
                @csrf
                <button type='submit' class="btn btn-danger text-white w-100 my-2 shadow-sm ">

                <i class="fas fa-sign-out-alt">Log out

            </i>
        </button>
    </form>

          </li>
        </ul>
      </nav>
    </div>
  </aside>

<marquee behavior="scroll" direction="left" style="margin-top:1.5%" >
    <h1 id="messagesBox" class="text-white shadow-sm" style="font-size:1rem" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quisquam quas vitae explicabo repellendus neque voluptatem debitis voluptate corporis incidunt!
    </h1>
</marquee>

  <div class="content-wrapper bg-dark-50 ">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-2" >

         @yield('content')

        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>


{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> --}}
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('dist/js/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
