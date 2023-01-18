<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">


    <!-- Scripts -->

</head>
<body style="text-decoration: none !important;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <header id="header" class="header fixed-top d-flex align-items-center">

                                <div class="d-flex align-items-center justify-content-between">
                                <a href="/" class="logo d-flex align-items-center">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Entreprise</span>
                                </a>
                                <i class="fa-solid fa-bars-staggered toggle-sidebar-btn"></i>
                                </div><!-- Logo -->

                                <div class="search-bar">
                                <form class="search-form d-flex align-items-center" method="POST" action="#">
                                    <input type="text" name="query" placeholder="Rechercher" title="">
                                    <button type="submit" title="Rechercher"><i class="bi bi-search"></i></button>
                                </form>
                                </div><!-- Search Bar -->

                                <nav class="header-nav ms-auto">
                                <ul class="d-flex align-items-center">

                                    <li class="nav-item d-block d-lg-none">
                                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                                        <i class="bi bi-search"></i>
                                    </a>
                                    </li><!-- Search Icon-->

                                    <li class="nav-item dropdown">

                                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-bell"></i>
                                        <span class="badge bg-primary badge-number">4</span>
                                    </a><!-- Notification Icon -->

                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                                        <li class="dropdown-header">
                                        You have 4 new notifications
                                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                                        </li>
                                        <li>
                                        <hr class="dropdown-divider">
                                        </li>

                                        <li class="notification-item">
                                        <i class="bi bi-exclamation-circle text-warning"></i>
                                        <div>
                                            <h4>Lorem Ipsum</h4>
                                            <p>Quae dolorem earum veritatis oditseno</p>
                                            <p>30 min. ago</p>
                                        </div>
                                        </li>

                                        <li>
                                        <hr class="dropdown-divider">
                                        </li>

                                        <li class="notification-item">
                                        <i class="bi bi-x-circle text-danger"></i>
                                        <div>
                                            <h4>Atque rerum nesciunt</h4>
                                            <p>Quae dolorem earum veritatis oditseno</p>
                                            <p>1 hr. ago</p>
                                        </div>
                                        </li>

                                        <li>
                                        <hr class="dropdown-divider">
                                        </li>

                                        <li class="notification-item">
                                        <i class="bi bi-check-circle text-success"></i>
                                        <div>
                                            <h4>Sit rerum fuga</h4>
                                            <p>Quae dolorem earum veritatis oditseno</p>
                                            <p>2 hrs. ago</p>
                                        </div>
                                        </li>

                                        <li>
                                        <hr class="dropdown-divider">
                                        </li>
                                        <li class="dropdown-footer">
                                        <a href="#">Show all notifications</a>
                                        </li>

                                    </ul><!-- Notification Items -->

                                    </li><!-- End Notification Nav -->

                                    <li class="nav-item dropdown pe-3">

                                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                        <img src="assets/img/profile-img.jpg" alt="" class="rounded-circle">
                                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->username }}</span>
                                    </a><!-- End Profile Iamge Icon -->

                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                        <li class="dropdown-header">
                                        <h6>{{ Auth::user()->username }}</h6>
                                        <span>{{ Auth::user()->fonction }}</span>
                                        </li>
                                        <li>
                                        <hr class="dropdown-divider">
                                        </li>

                                        <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i class="fa-solid fa-user"></i>
                                            <span>Mon Profil</span>
                                        </a>
                                        </li>
                                        <li>
                                        <hr class="dropdown-divider">
                                        </li>
                                        <li>

                                        <a class="dropdown-item d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                             <i class="fa-solid fa-right-from-bracket"></i>
                                            {{ __('Se Deconnecter') }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                        </li>

                                    </ul><!-- End Profile Dropdown Items -->
                                    </li><!-- End Profile Nav -->

                                </ul>
                                </nav><!-- End Icons Navigation -->

                            </header><!-- End Header -->


                            <aside id="sidebar" class="sidebar">

                                <ul class="sidebar-nav" id="sidebar-nav">

                                  <li class="nav-item">
                                    <a class="nav-link " href="/home">
                                      <i class="fa-solid fa-gauge"></i>
                                      <span>Dashboard</span>
                                    </a>
                                  </li><!-- End Dashboard Nav -->

                                  <li class="nav-item">
                                    <a class="nav-link collapsed d-flex justify-content-between" data-bs-target="#admin" data-bs-toggle="collapse" href="#">
                                      <i class="fa-solid fa-user"></i><span>Administrateur</span><i class="fa-solid fa-angle-down"></i>
                                    </a>
                                    <ul id="admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                      <li>
                                        <a href="/utilisateur">
                                          <i class="fa-solid fa-circle"></i><span>Gestion des Utilisateurs</span>
                                        </a>
                                      </li>
                                      <li>
                                        <a href="/chariot">
                                          <i class="fa-solid fa-circle"></i><span>Gestion des Chariots</span>
                                        </a>
                                      </li>
                                      <li>
                                        <a href="/plat">
                                          <i class="fa-solid fa-circle"></i><span>Gestion des Plats</span>
                                        </a>
                                      </li>
                                      <li>
                                        <a href="/vente">
                                          <i class="fa-solid fa-circle"></i><span>Gestion des Ventes</span>
                                        </a>
                                      </li>
                                      <li>
                                        <a href="/transfert">
                                          <i class="fa-solid fa-circle"></i><span>Gestion des Transferts</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </li><!-- End Icons Nav -->

                                  <li class="nav-item">
                                    <a class="nav-link collapsed d-flex justify-content-between" data-bs-target="#comptable" data-bs-toggle="collapse" href="#">
                                      <i class="fa-solid fa-receipt"></i><span>Comptables</span><i class="fa-solid fa-angle-down"></i>
                                    </a>
                                    <ul id="comptable" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                        <li>
                                          <a href="#">
                                            <i class="fa-solid fa-circle"></i><span>Consultation</span>
                                          </a>
                                        </li>
                                    </ul>
                                  </li><!-- End Icons Nav -->


                                  <li class="nav-heading">Pages</li>

                                  <li class="nav-item">
                                    <a class="nav-link collapsed" href="pages-register.html">
                                      <i class="bi bi-card-list"></i>
                                      <span>Enregistrement</span>
                                    </a>
                                  </li><!-- End Register Page Nav -->

                                  <li class="nav-item">
                                    <a class="nav-link collapsed" href="pages-login.html">
                                      <i class="bi bi-box-arrow-in-right"></i>
                                      <span>Connexion</span>
                                    </a>
                                  </li><!-- End Login Page Nav -->

                                  <li class="nav-item">
                                    <a class="nav-link collapsed" href="pages-error-404.html">
                                      <i class="bi bi-dash-circle"></i>
                                      <span>Erreur 404</span>
                                    </a>
                                  </li><!-- End Error 404 Page Nav -->

                                </ul>

                              </aside><!-- End Sidebar-->

                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>


            <!-- ======= Footer ======= -->
            <footer id="footer" class="footer">
                <div class="copyright">
                &copy; Copyright <strong><span>Firewall Agency</span></strong>. Tout droits réservés
                </div>
                <div class="credits">
                Version 1.0
                </div>
            </footer><!-- End Footer -->

            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa-duotone fa-up-to-line"></i></a>

        @endguest
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>

</body>
</html>
