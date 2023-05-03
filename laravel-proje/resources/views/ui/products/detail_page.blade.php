@extends("ui.shared.theme")
@section("content")
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        @if(count($product->images)>0)
                            <div class="carousel-item active">
                                <img class="w-100"
                                     height="500"
                                     src="{{asset("/storage/products/".$product->images[0]->image_url)}}"
                                     alt="{{"/storage/products/".$product->images[0]->alt}}">
                            </div>
                            @foreach($product->images as $image)
                                <div class="carousel-item ">
                                    <img class="w-100"
                                         height="500"
                                         src="{{asset("/storage/products/".$image->image_url)}}"
                                         alt="{{"/storage/products/".$image->alt}}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5 ">
                <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
                <hr>
                <h3 class="font-weight-semi-bold mb-4 d-flex">FİYAT: {{$product->price}}&#8378;
                    <del style="color: #7a7a7a"><h5>{{$product->old_price}}&#8378;</h5></del>
                </h3>
                <br>
                @if($product->is_active==true)
                    <h5>STOK DURUMU: <span class="badge badge-success">MEVCUT</span></h5>
                @else
                    <h5>STOK DURUMU: <span class="badge badge-danger">TÜKENMİŞ</span></h5>
                @endif
                <br>
                <br>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                            <a href="/admin/my-basket/add/{{$product->product_id}}"
                               type="submit"
                               class="btn btn-primary px-3"><i
                                    class="fa fa-shopping-cart mr-1"></i>Sepete
                                Ekle</a>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                            <a href="/user/my-basket/add/{{$product->product_id}}"
                               type="submit"
                               class="btn btn-primary px-3"><i
                                    class="fa fa-shopping-cart mr-1"></i>Sepete
                                Ekle</a>
                        @endif
                    @else
                        <a href="/login"
                           class="btn btn-sm text-dark p-0"><i
                                class="fas fa-shopping-cart text-primary mr-1"></i>Sepete
                            Ekle</a>
                    @endif
                </div>
                <br>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Paylaş:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Ayrıntılar</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Daha Fazla Bilgi</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <p>{{$product->lead}}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <p>{{$product->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
@endsection
