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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">

      <span class="brand-text font-weight-light">My Media App </span>
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
              <i class="fas fa-list"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin#list')}}" class="nav-link">
              <i class="fas fa-pizza-slice ms-5"></i>
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

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">

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
</body>
</html>
