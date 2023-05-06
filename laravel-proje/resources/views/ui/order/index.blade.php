@extends("ui.shared.theme")
@section("content")
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                                                                                             width="150px"
                                                                                             src="{{url("ui/img/member.png")}}"><span
                        class="font-weight-bold">{{$user->name." ".$user->surname}}</span><span
                        class="text-black-50">{{$user->email}}</span><span> </span></div>
            </div>
            <div class="col-md-9 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Sipariş Kodu</th>
                        <th>Durum</th>
                        <th>Siparişler</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @if(count($orders)>0)
                        @foreach($orders as $order)
                            <tr>

                                <td class="align-middle">
                                    {{$order->code}}
                                </td>
                                <td class="align-middle">
                                    {{ $order->status }}
                                </td>
                                <td class="align-middle">
                                    @if(\Illuminate\Support\Facades\Auth::user())
                                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                                            <a href="{{"/admin/order/$order->order_id"}}"><i class="fa fa-eye"></i></a>
                                        @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                                            <a href="{{"/user/order/$order->order_id"}}"><i class="fa fa-eye"></i></a>
                                        @endif
                                    @endif
                                    -
                                    <a href=""><i class="fa fa-ban"></i></a>
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
        </div>
    </div>

@endsection
