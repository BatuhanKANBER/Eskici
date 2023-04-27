@extends("ui.shared.theme")
@section("content")
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-2 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                                                                                             width="150px"
                                                                                             src="{{url("ui/img/member.png")}}"><span
                        class="font-weight-bold">{{$user->name." ".$user->surname}}</span><span
                        class="text-black-50">{{$user->email}}</span></div>
            </div>
            <div class="col-md-8 border-right">
                <div class="d-flex justify-content-between ">
                    <h4 class="mb-4">{{$user->name." ".$user->surname}}, Kayıtlı Adresleri</h4>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                            <a href="{{url("/admin/profile/$user->user_id/address/create")}}" type="button"
                               class="btn btn-lg btn-lg-square btn-outline-success m-2"><i
                                    class="fa fa-plus" aria-hidden="true"></i></a>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                            <a href="{{url("/user/profile/$user->user_id/address/create")}}" type="button"
                               class="btn btn-lg btn-lg-square btn-outline-success m-2"><i
                                    class="fa fa-plus" aria-hidden="true"></i></a>
                        @endif
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">İl</th>
                            <th scope="col">İlçe</th>
                            <th scope="col">Posta Kodu</th>
                            <th scope="col">Varsayılan</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($addrs)>0)
                            @foreach($addrs as $address)
                                <tr id="{{$address->address_id}}">
                                    <th> {{$loop->iteration}}</th>
                                    <td>{{$address->city}}</td>
                                    <td>{{$address->district}}</td>
                                    <td>{{$address->zipcode}}</td>
                                    <td>
                                        @if($address->is_default==1)
                                            <span class="badge bg-success text-white">Evet</span>
                                        @elseif($address->is_default==0)
                                            <span class="badge bg-danger text-white">Hayır</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        @if(\Illuminate\Support\Facades\Auth::user())
                                            @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                                                <a href="{{url("/admin/profile/$user->user_id/address/$address->address_id/edit")}}"
                                                   type="button"
                                                   class="btn btn-sm btn-sm-square btn-outline-warning m-2"><i
                                                        class="fa fa-edit"></i></a>
                                            @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                                                <a href="{{url("/user/profile/$user->user_id/address/$address->address_id/edit")}}"
                                                   type="button"
                                                   class="btn btn-sm btn-sm-square btn-outline-warning m-2"><i
                                                        class="fa fa-edit"></i></a>
                                            @endif
                                        @endif
                                        <form
                                            @if(\Illuminate\Support\Facades\Auth::user())
                                                @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                                                    action="{{"/admin/profile/$user->user_id/address/$address->address_id"}}"
                                            @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                                                action="{{"/user/profile/$user->user_id/address/$address->address_id"}}"
                                            @endif
                                            @endif
                                            method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit"
                                                    class="delete-button btn btn-sm btn-sm-square btn-outline-danger m-2">
                                                <i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6"><p class="text-center">Sistemde bu kullanıcı için kayıtlı herhangi
                                        bir adres
                                        bulunamadı.</p>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2">
                @if(\Illuminate\Support\Facades\Auth::user())
                    @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                        <a href="{{"/admin/profile/$user->user_id/edit"}}"
                           class="btn btn-primary profile-button w-100"
                           type="submit"><i
                                class="fa fa-arrow-left"></i>
                        </a>
                    @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                        <a href="{{"/user/profile/$user->user_id/edit"}}"
                           class="btn btn-primary profile-button w-100"
                           type="submit"><i
                                class="fa fa-arrow-left"></i>
                        </a>
                    @endif
                @endif
                <br>
                <span class="badge bg-danger text-white mt-5 w-100 p-4"><p class="text-uppercase">LÜTFEN<br>
                        SADECE BİR ADET<br>
                        VARSAYILAN ADRES<br>
                        KULLANIN.</p></span>
            </div>
        </div>
    </div>
@endsection
