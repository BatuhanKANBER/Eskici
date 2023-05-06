@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h4 class="mb-4">Siparişler Tablosu</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Sipariş Kodu</th>
                                <th>Durum</th>
                                <th>Siparişler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($orders)>0)
                                @foreach($orders as $order)
                                    <tr>

                                        <td>
                                            {{$order->code}}
                                        </td>
                                        <td>
                                            @if($order->status=="Hazırlanıyor")
                                                <span class="badge bg-info">{{ $order->status }}</span>
                                            @elseif($order->status=="Kargoya Verildi")
                                                <span class="badge bg-warning">{{ $order->status }}</span>
                                            @elseif($order->status=="Teslim Edildi")
                                                <span class="badge bg-success">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user())
                                                @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                                                    <a href="" type="button"
                                                       class="btn btn-sm btn-sm-square btn-outline-light m-2"><i
                                                            class="fa fa-eye"></i></a>
                                                @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                                                    <a href="" type="button"
                                                       class="btn btn-sm btn-sm-square btn-outline-light m-2"><i
                                                            class="fa fa-eye"></i></a>
                                                @endif
                                            @endif
                                            -
                                                <a href="" type="button"
                                                   class="btn btn-sm btn-sm-square btn-outline-danger m-2"><i
                                                        class="fa fa-ban"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"><p class="align-middle text-center">
                                        <p class="text-danger">Sistemde kayıtlı herhangi bir ürün bulunamadı.</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
