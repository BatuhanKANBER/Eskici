<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        @include("ui.shared.categories")
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold">E</span>skici</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <div class="navbar-categories" data-toggle="collapse" data-target="#navbarCollapse">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kategoriler</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="/products-page" class="dropdown-item nav-link">Hepsi</a>
                                    @if(count($categories)>0)
                                        @foreach($categories as $category)
                                            <a href="/products-page/category/{{$category->slug}}"
                                               class="dropdown-item nav-link">{{$category->name}}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <a href="/" class="nav-item nav-link">Anasayfa</a>
                        <a href="/products-page" class="nav-item nav-link">Ürünler</a>
                        <a href="/contact-page" class="nav-item nav-link">İletişim</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        <a href="" class="nav-item nav-link">Giriş Yap</a>
                        <a href="" class="nav-item nav-link">Üye Ol</a>
                    </div>
                </div>
            </nav>
            @yield("slider")
        </div>
    </div>
</div>
