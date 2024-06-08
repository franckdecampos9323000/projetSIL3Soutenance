    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--black section-fluid sticky-header sticky-color--black">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="{{route("Accueil.index")}}"> <h2 style="color: white">BOOK EXCHANGE</h2></a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--white menu-hover-color--pink">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="{{route("Accueil.index")}}">Accueil</a>
                                        </li>
                                        <li>
                                            <a href="{{route("Apropos.index")}}">A propos</a>
                                        </li>
                                        <li>
                                            <a href="{{route("Annonces.index")}}">Annonces</a>
                                        </li>
                                        <li>
                                            <a href="{{route("Contacts.index")}}">Contacts</a>
                                        </li>
                                        <li>
                                            @auth
                                                <a href="{{ route('user.dashboard') }}">Mon compte</a>
                                            @else
                                                <a href="{{ route('login') }}">Se connecter</a>
                                            @endauth
                                        </li>


                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--white action-hover-color--pink">
                                <li>
                                    <a href="{{ route('panier.index') }}" >
                                        <i class="icon-bag"></i>
                                        @auth
                                            <span class="item-count">{{ auth()->user()->paniers()->count() }}</span>
                                        @endauth
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header Area -->

        <!-- Start Mobile Header -->
        <div class="mobile-header  mobile-header-bg-color--black section-fluid d-lg-block d-xl-none">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Mobile Left Side -->
                        <div class="mobile-header-left">
                            <ul class="mobile-menu-logo">
                                <li>
                                    <a href="{{route("Accueil.index")}}">
                                        <div class="logo">
                                            <h2 style="color: white">BOOK EXCHANGE</h2>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Mobile Left Side -->

                        <!-- Start Mobile Right Side -->
                        <div class="mobile-right-side">
                            <ul class="header-action-link action-color--white action-hover-color--pink">
                                <li>
                                    <a href="#mobile-menu-offcanvas"
                                        class="offcanvas-toggle offside-menu offside-menu-color--black">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Mobile Right Side -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mobile Header -->

        <!--  Start Offcanvas Mobile Menu Section -->
        <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header text-right">
                <button class="offcanvas-close"><i class="ion-android-close"></i></button>
            </div> <!-- End Offcanvas Header -->
            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-mobile-menu-wrapper">
                <!-- Start Mobile Menu  -->
                <div class="mobile-menu-bottom">
                    <!-- Start Mobile Menu Nav -->
                    <div class="offcanvas-menu">
                        <ul>
                            <li>
                                <a href="{{route("Accueil.index")}}">Accueil</a>
                            </li>
                            <li>
                                <a href="{{route("Apropos.index")}}">A propos</a>
                            </li>
                            <li>
                                <a href="{{route("Annonces.index")}}">Annonces</a>
                            </li>
                            <li>
                                <a href="{{route("Contacts.index")}}">Contacts</a>
                            </li>
                            <li>
                                @auth
                                    <a href="{{ route('user.dashboard') }}">Mon compte</a>
                                @else
                                    <a href="{{ route('login') }}">Se connecter</a>
                                @endauth
                            </li>
                        </ul>
                    </div> <!-- End Mobile Menu Nav -->
                </div> <!-- End Mobile Menu -->

                <!-- Start Mobile contact Info -->
                <div class="mobile-contact-info">
                    <div class="logo">
                        <a href="{{route("Accueil.index")}}"><h2 style="color: white">BOOK EXCHANGE</h2></a>
                    </div>

                    <address class="address">
                        <span>Address: Your address goes here.</span>
                        <span>Tel: 0123456789, 0123456789</span>
                        <span>Email: demo@example.com</span>
                    </address>

                </div>
                <!-- End Mobile contact Info -->

            </div> <!-- End Offcanvas Mobile Menu Wrapper -->
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

        <!-- Start Offcanvas Mobile Menu Section -->
        <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header text-right">
                <button class="offcanvas-close"><i class="ion-android-close"></i></button>
            </div> <!-- End Offcanvas Header -->
            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="{{route("Accueil.index")}}"><h2 style="color: white">BOOK EXCHANGE</h2></a>
                </div>

                <address class="address">
                    <span>Address: Your address goes here.</span>
                    <span>Tel: 0123456789, 0123456789</span>
                    <span>Email: demo@example.com</span>
                </address>
            </div>
            <!-- End Mobile contact Info -->
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
