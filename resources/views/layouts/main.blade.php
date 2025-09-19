<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <script src="/js/bootstrap.bundle.js"></script>

</head>
<body>
<style>
    .mega-offcanvas {
        height: 70vh; /* wys. panelu */
        background: #0b2c6b; /* granat zbliżony do screena */
    }

    .mega-list li + li {
        margin-top: .5rem;
    }

    .mega-link {
        color: #fff;
        text-decoration: none;
        font-weight: 600;
    }

    .mega-link:hover {
        text-decoration: underline;
    }

    .mega-sub {
        display: block;
        font-weight: 400;
        opacity: .8;
        font-size: .9rem;
    }

    .navbar-custom {
        background-color: #0e1d77; /* Twój kolor */
    }
</style>

<!-- (opcjonalnie) Otwarcie panelu po najechaniu na desktopie -->
<script>
    // Otwieraj po hover dla >=992px
    document.querySelectorAll('[data-bs-target^="#mega"]').forEach(btn => {
        const target = document.querySelector(btn.getAttribute('data-bs-target'));
        const off = target ? bootstrap.Offcanvas.getOrCreateInstance(target) : null;

        if (!off) return;

        btn.addEventListener('mouseenter', () => {
            if (window.innerWidth >= 992) off.show();
        });
        target.addEventListener('mouseleave', () => {
            if (window.innerWidth >= 992) off.hide();
        });
    });
</script>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Loftware-Cloud</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="topNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

                <!-- TRIGGER: PRODUCTS -->
                <li class="nav-item me-lg-2">
                    <button class="btn btn-link nav-link px-2 text-white fw-bold" data-bs-toggle="offcanvas"
                            data-bs-target="#megaProducts">
                        Products
                    </button>
                </li>

                <!-- TRIGGER: INDUSTRIES (drugi panel, ten sam wzór) -->
                <li class="nav-item me-lg-2">
                    <button class="btn btn-link nav-link px-2 text-white fw-bold"
                            data-bs-toggle="offcanvas" data-bs-target="#megaIndustries">
                        Industries
                    </button>
                </li>

                <li class="nav-item"><a class="nav-link" href="#">Resources</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Partners</a></li>

                <li class="nav-item ms-lg-3">
                    <a href="{{ url('/internal-events/create') }}" class="btn btn-primary">Get in touch</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- OFFCANVAS: PRODUCTS -->
<div class="offcanvas offcanvas-top mega-offcanvas text-white" tabindex="-1" id="megaProducts"
     aria-labelledby="megaProductsLabel">
    <div class="offcanvas-header border-bottom border-light-subtle">
        <h5 class="offcanvas-title" id="megaProductsLabel">Products</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <div class="container">
            <div class="row g-4">

                <div class="col-12 col-md-6 col-lg-4">
                    <h6 class="text-uppercase opacity-75 mb-3">Labeling Products</h6>
                    <ul class="list-unstyled mega-list">
                        <li><a href=" {{ URL::to('/industry')  }} " class="mega-link">Industry</a><span class="mega-sub">For Global Enterprises</span>
                        </li>
                        <li><a href="{{URL::to('/contacts')}}" class="mega-link">Contacts</a><span class="mega-sub">For Medium & Growing Business</span>
                        </li>
                        <li><a href="#" class="mega-link">Loftware Cloud Designer</a><span class="mega-sub">For Single Site, Smaller Business</span>
                        </li>
                        <li class="mt-3"><a href="#" class="mega-link">Medical Device & Clinical Trials Labeling</a>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <h6 class="text-uppercase opacity-75 mb-3">Business applications</h6>
                    <ul class="list-unstyled mega-list">
                        <li><a href="#" class="mega-link">SAP</a></li>
                        <li><a href="#" class="mega-link">Oracle</a></li>
                        <li><a href="#" class="mega-link">Microsoft Dynamics</a></li>
                    </ul>

                    <h6 class="text-uppercase opacity-75 mt-4 mb-3">Regulations</h6>
                    <ul class="list-unstyled mega-list">
                        <li><a href="#" class="mega-link">EU MDR</a></li>
                        <li><a href="#" class="mega-link">UDI</a></li>
                        <li><a href="#" class="mega-link">GHS</a></li>
                        <li><a href="#" class="mega-link">FDA</a></li>
                    </ul>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <h6 class="text-uppercase opacity-75 mb-3">Why enterprise labeling</h6>
                    <ul class="list-unstyled mega-list">
                        <li><a href="#" class="mega-link">End-to-end solutions</a></li>
                        <li><a href="#" class="mega-link">Supplier Compliance</a></li>
                        <li><a href="#" class="mega-link">Sustainability</a></li>
                        <li><a href="#" class="mega-link">Print technologies</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- OFFCANVAS: INDUSTRIES (drugi panel) -->
<div class="offcanvas offcanvas-top mega-offcanvas text-white" tabindex="-1" id="megaIndustries"
     aria-labelledby="megaIndustriesLabel">
    <div class="offcanvas-header border-bottom border-light-subtle">
        <h5 class="offcanvas-title" id="megaIndustriesLabel">Industries</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <h6 class="text-uppercase opacity-75 mb-3">Life Sciences</h6>
                    <ul class="list-unstyled mega-list">
                        <li><a href="#" class="mega-link">Clinical Trials</a></li>
                        <li><a href="#" class="mega-link">Medical Device</a></li>
                        <li><a href="#" class="mega-link">Pharmaceutical</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <h6 class="text-uppercase opacity-75 mb-3">Consumer Products</h6>
                    <ul class="list-unstyled mega-list">
                        <li><a href="#" class="mega-link">CPG</a></li>
                        <li><a href="#" class="mega-link">Chemical</a></li>
                        <li><a href="#" class="mega-link">Food & Beverage</a></li>
                        <li><a href="#" class="mega-link">Retail</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <h6 class="text-uppercase opacity-75 mb-3">Industrials</h6>
                    <ul class="list-unstyled mega-list">
                        <li><a href="#" class="mega-link">Automotive</a></li>
                        <li><a href="#" class="mega-link">Electronics</a></li>
                        <li><a href="#" class="mega-link">Manufacturing</a></li>
                        <li><a href="#" class="mega-link">Transportation & Logistics</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    @include('partials.flash')
</div>

@yield('content')

<script src="/laravel/resources/js/bootstrap.min.js"></script>
</body>
</html>
