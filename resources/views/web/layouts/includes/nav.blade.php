
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
    <a href="" class="text-decoration-none d-block d-lg-none">
        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="<?php echo url(''); ?>" class="nav-item nav-link active">Home</a>
            <a href="<?php echo url('shop'); ?>" class="nav-item nav-link">Shop</a>
            <!-- <a href="<?php echo url('product/show'); ?>" class="nav-item nav-link">Shop Detail</a> -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{route('view')}}" class="dropdown-item">Shopping Cart</a>
                    <a href="<?php echo url('checkout'); ?>" class="dropdown-item">Checkout</a>
                </div>
            </div>
            <a href="<?php echo url('contact'); ?>" class="nav-item nav-link">Contact</a>
        </div>
        <div class="navbar-nav ml-auto py-0">
            @if (Auth::check())
                <a href="" class="nav-item nav-link">
                    <i class="fa-solid fa-user"> </i>
                    {{ Auth::user()->name }}
                </a>
                <a href="{{ route('logout') }}" class="nav-item nav-link">logout</a>
            @else
                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
            @endif
        </div>
    </div>
</nav>
