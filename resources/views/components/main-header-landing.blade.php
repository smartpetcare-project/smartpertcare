<style>
.btn-primary {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    transition: 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}
</style>

<header class="main-header header-style-one">
    <!-- Start Header Top -->
    <div class="header-top">
        <div class="outer-container">
            <div class="outer-box clearfix">

                <div class="header-top-left pull-left">
                    <div class="header-contact-info">
                        <ul>
                            <li><span class="icon-envelope"></span><a href="mailto:smartpetscareofficial@gmail.com">smartpetscareofficial@gmail.com</a></li>
                            <li><span class="icon-phone-call"></span><a href="https://api.whatsapp.com/send?phone=6285212622615">+62 8521-2622-615</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-top-right pull-right">
                    <div class="header-social-link">
                        <ul>
                            <li>
                                <a href="https://instagram.com/smartpetscare.official/"><i class="fa fa-instagram"
                                        aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <div class="header">
        <div class="outer-container">
            <div class="outer-box clearfix">
                <!-- Start Header Left -->
                <div class="header-left clearfix pull-left">

                    <div class="logo">
                        <a href="/"><img src="{{ URL::asset('main-website/images/resources/logosmartpetscare.png') }}" alt="Awesome Logo" title="" style="width: 82px; height: auto;"></a>
                    </div>

                    <div class="nav-outer clearfix">
                        <!-- Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler">
                            <div class="inner">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <!-- Main Menu -->
                        <nav class="main-menu style1 navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about">Tentang</a></li>
                                    <li class="dropdown"><a href="#">Layanan</a>
                                        <ul>
                                            <li><a href="/service">View All Services</a></li>
                                            @php
                                                $products = \App\Models\Service::where('is_publish', 1)->get();
                                            @endphp
                                            @foreach ($products as $item)
                                                <li><a href="{{ route('service.detail', $item->uuid) }}">{{ $item->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Halaman</a>
                                        <ul>
                                            <li><a href="/product">Produk Kami</a></li>
                                            <li><a href="/team">Team Smartpetscare</a></li>
                                            <li><a href="/faq">Faq</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/blog">Berita</a></li>
                                    <li><a href="/contact">Kontak</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End -->
                    </div>

                </div>
                <!-- End Header Left -->

                <!-- Start Header Right -->
                <div class="header-right pull-right clearfix">
                    @auth
                        @if(auth()->user()->role == 'admin')
                            <!-- Show Dashboard button if the user is an admin -->
                            <a href="{{ route('dashboard') }}" class="btn btn-primary" style="margin-top: 25px;">Dashboard</a>
                        @else
                            <!-- Show user's name if the user is not an admin -->
                            <span class="btm btn-primary" style="margin-top: 25px;">{{ auth()->user()->name }}</span>
                        @endif
                    @else
                        <!-- Tombol Hidden Content jika pengguna belum login -->
                        <div class="hidden-content-button bar-box">
                            <a class="side-nav-toggler nav-toggler hidden-bar-opener" href="#">
                                <ul>
                                    <li class="red2"></li>
                                    <li class="red2"></li>
                                    <li></li>
                                </ul>
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul>
                                    <li class="red2"></li>
                                    <li></li>
                                    <li class="red2"></li>
                                </ul>
                            </a>
                        </div>
                    @endauth
                </div>
                <!-- End Header Right -->
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Sticky Header -->
    <div class="sticky-header">
        <div class="container">
            <div class="clearfix">
                <!-- Logo -->
                <div class="logo float-left">
                    <a href="/" class="img-responsive"><img src="{{ URL::asset('main-website/images/resources/logosmartpetscare.png') }}" alt="" title="" style="width: 82px; height: auto;"></a>
                </div>
                <!-- Right Col -->
                <div class="right-col float-right">
                    <!-- Main Menu -->
                    <nav class="main-menu clearfix">
                        <!-- Keep This Empty / Menu will come through Javascript -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sticky Header -->

    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img
                        src="{{ URL::asset('main-website/images/resources/logosmartpetscare.png') }}"
                        alt="" title=""></a></div>
            <div class="menu-outer"><!-- Here Menu Will Come Automatically Via Javascript / Same Menu as in Header -->
            </div>
            <!-- Social Links -->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-twitter-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-pinterest-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-google-plus-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-youtube-square"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->
</header>
