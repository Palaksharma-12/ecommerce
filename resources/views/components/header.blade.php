<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>{{$title}}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

<body>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{URL::asset('img/icon/search.png')}}" alt=""></a>
            <a href="#"><img src="{{URL::asset('img/icon/heart.png')}}" alt=""></a>
            <a href="#"><img src="{{URL::asset('img/icon/cart.png')}}" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <!-- <p>Free shipping, 30-day return or refund guarantee.</p> -->
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                           <!-- // <li class="active"><a href="{{ URL::to('home') }}">Home</a></li> --> 
                            <!-- <li><a href="{{ URL::to('/shop') }}">Shop</a></li> -->
                            <!-- <li><a href="#">Account&List</a>
                              <ul class="dropdown">
                                <li><a href="{{ URL::to('/cart')}}">Shopping Cart</a></li>
                                <li><a href="{{ URL::to('/cart')}}">Check Out</a></li>
                                <li><a href="{{ URL::to('/profile')}}">My Account</a></li>
                                <li><a href="{{ URL::to('/myOrders')}}">My Orders</a></li>
                              </ul> -->
                            
                              @auth
                               <li><a href="{{ url('/logout') }}">Logout</a></li>
                                <li><a href="#">Account&List</a>
                              <ul class="dropdown">
                                <li><a href="{{ URL::to('/home')}}">Home</a></li>
                                <li><a href="{{ URL::to('/cart')}}">Shopping Cart</a></li>
                                <li><a href="{{ URL::to('/cart')}}">Check Out</a></li>
                                <li><a href="{{ URL::to('/profile')}}">My Account</a></li>
                                <li><a href="{{ URL::to('/myOrders')}}">My Orders</a></li>
                              </ul> 
                              @else
                            <li><a href="{{ URL::to('/login') }}">Login</a></li>
                            <li><a href="{{ URL::to('/register') }}">Register</a></li>
                             @endauth
                        </ul>
                    </nav>
                </div>
            
             </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>