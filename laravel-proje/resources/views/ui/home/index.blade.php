@extends("ui.shared.theme")
@section("slider")
    @include("ui.shared.slider")
@endsection
@section("content")

    <!-- Categories Start-->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Favori Kategoriler</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @if(count($categories)>0)
                @foreach($categories as $category)
                    @if($category->is_active == true&&$category->is_favorite == true)
                        <div class="col-lg-4 col-md-6 pb-1">
                            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                                <a href="/products-page/category/{{$category->slug}}"
                                   class="cat-img position-relative overflow-hidden mb-3">
                                    @if(count($category->images)>0)
                                        <img width="100%" height="250"
                                             src="{{asset("/storage/categories/".$category->images[0]->image_url)}}"
                                             alt="{{"/storage/categories/".$category->images[0]->alt}}">

                                    @else
                                        <img width="100%" height="300" class="img-fluid"
                                             src="{{asset('ui/img/no-image-avaliable.png')}}"
                                             alt="no image">
                                    @endif
                                </a>
                                <h5 class="font-weight-semi-bold m-0 text-center text-uppercase">{{$category->name}}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <!-- Categories End -->

    <!-- Featured Start -->
    <div class="container-fluid bg-secondary pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Güvenli Ödeme</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hızlı Kargo</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14 Gün İçerisinde Geri İade</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">7/24 Destek</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Favori Ürünler</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2">
                                <del>$123.00</del>
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-shopping-cart text-primary mr-1"></i>Add
                            To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod
                        duo
                        labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->

    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Antika Kültürü Hakkında Bilgi Edinin</span></h2>
        </div>
        <iframe width="100%" height="600" src="https://www.youtube.com/embed/jFVy7RrTRZk?start=1"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
    </div>
@endsection
