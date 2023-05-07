@extends("admin.shared.theme")
@section("content")
    <head>
        <style>
            #progressbar-1 {
                color: #455A64;
            }

            #progressbar-1 li {
                list-style-type: none;
                font-size: 13px;
                width: 33.33%;
                float: left;
                position: relative;
            }

            #progressbar-1 #step1:before {
                content: "1";
                color: #fff;
                width: 29px;
                margin-left: 22px;
                padding-left: 11px;
            }

            #progressbar-1 #step2:before {
                content: "2";
                color: #fff;
                width: 29px;
            }

            #progressbar-1 #step3:before {
                content: "3";
                color: #fff;
                width: 29px;
                margin-right: 22px;
                text-align: center;
            }

            #progressbar-1 li:before {
                line-height: 29px;
                display: block;
                font-size: 12px;
                background: #455A64;
                border-radius: 50%;
                margin: auto;
            }

            #progressbar-1 li:after {
                content: '';
                width: 121%;
                height: 2px;
                background: #455A64;
                position: absolute;
                left: 0%;
                right: 0%;
                top: 15px;
                z-index: -1;
            }

            #progressbar-1 li:nth-child(2):after {
                left: 50%
            }

            #progressbar-1 li:nth-child(1):after {
                left: 25%;
                width: 121%
            }

            #progressbar-1 li:nth-child(3):after {
                left: 25%;
                width: 50%;
            }

            #progressbar-1 li.active:before,
            #progressbar-1 li.active:after {
                background: #1266f1;
            }

            .card-stepper {
                z-index: 0
            }
        </style>
    </head>
    <div class="container py-5 h-100 ">
        <div class="row d-flex justify-content-center align-items-center h-100 ">
            <div class="col-md-12">
                <div class="card card-stepper bg-secondary" style="border-radius: 16px;">
                    @if(count($orders->details)>0)
                        @foreach($orders->details as $order)
                            <div class="card-header p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-2"> Sipariş Kodu: <span
                                                class="fw-bold text-body">{{$orders->code}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="d-flex flex-row mb-4 pb-2">
                                    <div class="flex-fill">
                                        <h5 class="bold">{{$order->product->name}}</h5>
                                        <p class="text-muted"> Adet: {{$order->quantity}}</p>
                                        <h4 class="mb-3"> {{$order->product->price}} &#8378;
                                        </h4>
                                        <p class="text-muted">Sipariş Oluşturma Tarihi: {{$order->created_at}} <span
                                                class="text-body">11:30pm, Today</span>
                                        </p>
                                    </div>
                                    <div>
                                        <img
                                            src="{{asset("/storage/products/".$order->product->images[0]->image_url)}}"
                                            alt="{{$order->product->images[0]->alt}}" width="100">
                                    </div>

                                </div>
                                <form action="{{url('/update_status/'.$orders->order_id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label>Sipariş Durumu</label>
                                    <select name="order_status" class="form-control mb-3">
                                        <option {{$orders->status == 'Hazırlanıyor'?'selected':''}} value="Hazırlanıyor">
                                            Hazırlanıyor
                                        </option>
                                        <option {{$orders->status == 'Kargoya Verildi'?'selected':''}} value="Kargoya Verildi">Kargoya
                                            Verildi
                                        </option>
                                        <option {{$orders->status == 'Teslim Edildi'?'selected':''}} value="Teslim Edildi">Teslim
                                            Edildi
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-dark">Güncelle</button>
                                </form>
                                <hr>
                                <ul id="progressbar-1" class="mx-0 mt-0 mb-5 px-0 pt-0 pb-4">
                                    @if($orders->status=="Hazırlanıyor")
                                        <li class="step0 active text-left" id="step1"><span
                                                style="margin-left: 22px; margin-top: 12px;">Hazırlanıyor</span></li>
                                        <li class="step0  text-center" id="step2"><span>Kargoya Verildi</span></li>
                                        <li class="step0 text-right " id="step3"><span>Teslim Edildi</span></li>
                                    @elseif($orders->status=="Kargoya Verildi")
                                        <li class="step0 active text-left" id="step1"><span
                                                style="margin-left: 22px; margin-top: 12px;">Hazırlanıyor</span></li>
                                        <li class="step0 active  text-center" id="step2"><span>Kargoya Verildi</span>
                                        </li>
                                        <li class="step0 text-right " id="step3"><span>Teslim Edildi</span></li>
                                    @elseif($orders->status=="Teslim Edildi")
                                        <li class="step0 active text-left" id="step1"><span
                                                style="margin-left: 22px; margin-top: 12px;">Hazırlanıyor</span></li>
                                        <li class="step0 active  text-center" id="step2"><span>Kargoya Verildi</span>
                                        </li>
                                        <li class="step0 active text-right " id="step3"><span>Teslim Edildi</span></li>
                                    @else
                                        <li class="step0 text-left" id="step1"><span
                                                style="margin-left: 22px; margin-top: 12px;">Hazırlanıyor</span></li>
                                        <li class="step0  text-center" id="step2"><span>Kargoya Verildi</span></li>
                                        <li class="step0  text-right " id="step3"><span>Teslim Edildi</span></li>
                                    @endif


                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

