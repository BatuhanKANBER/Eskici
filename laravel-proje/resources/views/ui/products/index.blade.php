@extends("ui.shared.theme")
@section("content")


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                        </div>
                    </div>
                    @if(count($products)>0)

                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        @if(count($product->images)>0)
                                            <img class="w-100" height="300"
                                                 src="{{asset("/storage/products/".$product->images[0]->image_url)}}"
                                                 alt="{{"/storage/products/".$product->images[0]->alt}}">
                                        @else
                                            <img height="500px" class="img-fluid w-100"
                                                 src="{{asset('ui/img/no-image-avaliable.png')}}"
                                                 alt="no image">
                                        @endif
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>{{$product->price}}&#8378;</h6>
                                            <h6 class="text-muted ml-2">
                                                <del>{{$product->old_price}}&#8378;</del>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        @if(\Illuminate\Support\Facades\Auth::user())
                                            @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                                                <a href="/admin/product_detail/{{$product->product_id}}"
                                                   class="btn btn-sm text-dark p-0"><i
                                                        class="fas fa-eye text-primary mr-1"></i>İncele</a>
                                            @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                                                <a href="/user/product_detail/{{$product->product_id}}"
                                                   class="btn btn-sm text-dark p-0"><i
                                                        class="fas fa-eye text-primary mr-1"></i>İncele</a>
                                            @endif
                                        @else
                                            <a href="/login" class="btn btn-sm text-dark p-0"><i
                                                    class="fas fa-eye text-primary mr-1"></i>İncele</a>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::user())
                                            @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                                                <a href="/admin/my-basket/add/{{$product->product_id}}"
                                                   class="btn btn-sm text-dark p-0"><i
                                                        class="fas fa-shopping-cart text-primary mr-1"></i>Sepete
                                                    Ekle</a>
                                            @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                                                <a href="/user/my-basket/add/{{$product->product_id}}"
                                                   class="btn btn-sm text-dark p-0"><i
                                                        class="fas fa-shopping-cart text-primary mr-1"></i>Sepete
                                                    Ekle</a>
                                            @endif
                                        @else
                                            <a href="/login"
                                               class="btn btn-sm text-dark p-0"><i
                                                    class="fas fa-shopping-cart text-primary mr-1"></i>Sepete
                                                Ekle</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
