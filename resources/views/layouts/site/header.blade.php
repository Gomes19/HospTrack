 <!-- Main Header-->
<header class="main-header header-style-two">
<!-- Header top -->
<div class="header-top-two">
    <div class="auto-container">
        <div class="inner-container">
            <div class="top-left">
                <ul class="contact-list clearfix">
                    <li><i class="flaticon-hospital-1"></i> SmartBits ,Luanda, Angola <br>Angola, Luanda </li>
                    <li><i class="flaticon-back-in-time"></i>Seg - Sex 8.00 - 18.00. <br></li>
                </ul>
            </div>
            <div class="top-right">
                <ul class="social-icon-one">
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                </ul>
                <div class="btn-box">
                    @auth
                    <a href ="#" class="theme-btn btn-style-three" onclick ="logOut2()" ><span class="btn-title">Sair</span></a>
                  
                        <form action="{{ route('logout') }}" id="formLogout" method="POST">
                           @csrf 
                        </form>
                        <script>
                           function logOut2() {
                              var formLogout = document.getElementById("formLogout");
                              formLogout.submit(); 
                           }
                        </script>
                    @else
                    <a href="{{ route('login') }}" class="theme-btn btn-style-three"><span class="btn-title">Entrar</span></a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->

<!-- Header Lower -->
<div class="header-lower">
    <div class="auto-container">    
        <!-- Main box -->
        <div class="main-box">

            <div class="logo-box">
                <div class="logo"><a href="{{ route('site.home') }}"><img src="{{asset('site_temp/images/logo-3.png')}}" alt="" title=""></a></div>
            </div>

            <!--Nav Box-->
            <div class="nav-outer">
                <nav class="nav main-menu">
                    <ul class="navigation" id="navbar">
                        <li>
                            <a href="{{ route('site.home') }}">Home</a>
                        </li>

                        <li>
                            <a href="{{ route('site.hospital') }}">Hospitais</a>    
                        </li>
                        <li>
                            <a href="{{ route('site.hospitalArea') }}">Areas</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('site.aboutUs') }}">Sobre Nós</a>
                        </li>
                            
                        <li>
                            <a href="{{ route('site.contact') }}">Contacto</a>
                        </li>
                    </ul>
                </nav>
                <!-- Main Menu End-->

                <div class="outer-box">
                    <button class="search-btn"><span class="fa fa-search"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sticky Header  -->
<div class="sticky-header">
    <div class="auto-container">            
        <div class="main-box">
            <div class="logo-box">
                <div class="logo"><a href=""><img src="site_temp/img/logo-4.png" alt="" title=""></a></div>
            </div>

            <!--Keep This Empty / Menu will come through Javascript-->
        </div>
    </div>
</div><!-- End Sticky Menu -->

<!-- Mobile Header -->
<div class="mobile-header">
    <div class="logo"><a href=""><img src="site_temp/images/logo-4.png" alt="" title=""></a></div>
    <!--Nav Box-->
    <div class="nav-outer clearfix">

        <div class="outer-box">
            <!-- Search Btn -->
            <div class="search-box">
                <button class="search-btn mobile-search-btn"><i class="flaticon-magnifying-glass"></i></button>
            </div>
            <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="fa fa-bars"></span></a>
        </div>
    </div>
</div>

<!-- Mobile Nav -->
<div id="nav-mobile"></div>

<!-- Header Search -->
<div class="search-popup">
    <span class="search-back-drop"></span>
    <button class="close-search"><span class="fa fa-times"></span></button>
    
    <div class="search-inner">
        <form method="GET" action="{{ route('site.hospital') }}">
            <div class="form-group">
                <input type="search" name="search" value="" placeholder="Pesquisar por uma doeça..." required="">
                <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
</div>
<!-- End Header Search -->

<!-- Sidebar Cart  -->
<div class="sidebar-cart">
    <span class="cart-back-drop"></span>
    <div class="shopping-cart">
        <div class="cart-header">
            <div class="title">Shopping Cart <span>(3)</span></div>
            <button class="close-cart"><span class="flaticon-add"></span></button>
        </div>
        <ul class="shopping-cart-items">
            <li class="cart-item">
                <img src="site_temp/img/resource/products/product-thumb-1.jpg" alt="#" class="thumb" />
                <span class="item-name">First Aid Kit</span>
                <span class="item-quantity">1 x <span class="item-amount">$50.00</span></span>
                <a href="shop-single.html" class="product-detail"></a>
                <button class="remove">Remove</button>
            </li>

            <li class="cart-item">
                <img src="site_temp/img/banner-medico-com-medico-usando-oculos.jpg" alt="#" class="thumb"  />
                <span class="item-name">Vitamin Tablet</span>
                <span class="item-quantity">1 x <span class="item-amount">$25.00</span></span>
                <a href="shop-single.html" class="product-detail"></a>
                <button class="remove">Remove</button>
            </li>

            <li class="cart-item">
                <img src="site_temp/img/banner-medico-com-medico-usando-oculos.jpg" alt="#" class="thumb"  />
                <span class="item-name">Zinc Tablet</span>
                <span class="item-quantity">1 x <span class="item-amount">$15.00</span></span>
                <a href="shop-single.html" class="product-detail"></a>
                <button class="remove">Remove</button>
            </li>
        </ul>

        <div class="cart-footer">
            <div class="shopping-cart-total"><strong>Subtotal:</strong> $90.00</div>
            <a href="shopping-cart.html" class="theme-btn btn-style-three"><span class="btn-title">View Cart</span></a>
            <a href="checkout.html" class="theme-btn btn-style-one"><span class="btn-title">Checkout</span></a>
        </div>
    </div> <!--end shopping-cart -->
</div>
<!-- End Sidebar Cart  -->
</header>
<!--End Main Header -->
