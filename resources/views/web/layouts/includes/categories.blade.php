<a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
    data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
    <h6 class="m-0">Categories</h6>
    <i class="fa fa-angle-down text-dark"></i>
    <?php $categories = new App\Models\Categories();
    $categoriess = $categories->all();
    ?>
</a>
<nav class="collapse navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
    id="navbar-vertical">
    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
        @foreach ($categoriess as $categories)
            <div>
                <a href="{{ route('categories').'?'.http_build_query(['slug' => $categories->slug]) }}"
                     class="nav-item nav-link">{{ $categories->name }}</a>
            </div>
        @endforeach
    </div>
</nav>