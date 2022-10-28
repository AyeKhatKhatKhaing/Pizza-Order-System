<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pizza Order System</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
        crossorigin="anonymous">
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

      <span class="brand-text font-weight-light">Pizza Order System </span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{route('admin#profile')}}" class="nav-link">
              <i class="fas fa-user-circle"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin#category')}}" class="nav-link">
              <i class="fas fa-list"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin#pizza')}}" class="nav-link">
              <i class="fas fa-pizza-slice"></i>
              <p>
                Pizza
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="{{ route('admin#userList')}}" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin#orderList')}}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin#contactList')}}" class="nav-link">
                <i class="far fa-address-book"></i>
              <p>
                Contact
              </p>
            </a>
          </li>

          <li class="nav-item">
            <p>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <input type="submit" value="Logout" class=" btn bg-danger ml-3">
                </form>
            </p>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

 @yield('content')

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
</body>
</html>
