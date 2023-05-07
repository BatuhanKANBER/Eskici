<nav class="navbar bg-secondary navbar-dark">
    <a href="/users" class="navbar-brand mx-4 mb-3">
        <h3 class="text-primary"><i class="fa fa-user-secret"></i>AdminPaneli</h3>
    </a>
    <div class="d-flex align-items-center ms-4 mb-4">
        <div class="position-relative">
            <img class="rounded-circle" src="{{asset('admin/img/admin.png')}}" alt=""
                 style="width: 40px; height: 40px;">
            <div
                class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
        </div>
        <div class="ms-3">
            <h6 class="mb-0">{{Auth::user()->name." ".Auth::user()->surname}}</h6>
            <span>Admin</span>
        </div>
    </div>
    <div class="navbar-nav w-100">
        <a href="/users" class="nav-item nav-link"><i class="fa fa-users"></i>Kullanıcılar</a>
        <a href="/categories" class="nav-item nav-link"><i class="fa fa-tags"></i>Kategoriler</a>
        <a href="/products" class="nav-item nav-link"><i class="fa fa-th-large"></i>Ürünler</a>
        <a href="/orders" class="nav-item nav-link"><i class="fa fa-archive"></i>Siparişler</a>
        <a href="/faqs" class="nav-item nav-link"><i class="fa fa-question-circle-o"></i>SSS</a>
    </div>
</nav>
