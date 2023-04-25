@extends("ui.shared.theme")
@section("content")
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Ürün</th>
                        <th>Ürün Ad</th>
                        <th>Fiyat</th>
                        <th>Adet</th>
                        <th>Toplam</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @if(count($card->details)>0)
                        @foreach($card->details as $detail)
                            <tr>

                                <td class="align-middle">
                                    <img
                                        src="{{asset("/storage/products/".$detail->product->images[0]->image_url)}}"
                                        alt="{{$detail->product->images[0]->alt}}" width="100">
                                </td>
                                <td class="align-middle">{{ $detail->product->name }}</td>
                                <td class="align-middle">{{ $detail->product->price }}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                               value="{{ $detail->quantity }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{($detail->price*$detail->quantity)}}</td>
                                <td class="align-middle">
                                    <a href="my-basket/remove/{{$detail->card_detail_id}}">Sepetten Sil</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6"><p class="align-middle text-center">
                                <p class="text-danger">Sepetinizde herhangi bir ürün bulunamadı.</p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
