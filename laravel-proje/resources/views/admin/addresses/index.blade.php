@extends("admin.shared.theme")
@section("content")
    {{--    <style>--}}
    {{--        ul {--}}
    {{--            list-style-type: none;--}}
    {{--        }--}}
    {{--    </style>--}}

    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h4 class="mb-4">{{$user->name." ".$user->surname}}, Adresler Tablosu</h4>
                        <ul class="d-flex list-unstyled">
                            <li><a href="{{url("/users/$user->user_id/address/create")}}" type="button"
                                   class="btn btn-lg btn-lg-square btn-outline-success m-2"><i
                                        class="fa fa-plus" aria-hidden="true"></i></a></li>
                            <li><a href="/users" type="button"
                                   class="btn btn-lg btn-lg-square btn-outline-light m-2"><i
                                        class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
                        </ul>
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
                                                <span class="badge bg-success">Evet</span>
                                            @elseif($address->is_default==0)
                                                <span class="badge bg-danger">Hayır</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{url("/users/$user->user_id/address/$address->address_id/edit")}}"
                                               type="button"
                                               class="btn btn-sm btn-sm-square btn-outline-warning m-2"><i
                                                    class="fa fa-pencil-square-o"></i></a>

                                            <form action="{{"/users/$user->user_id/address/$address->address_id"}}"
                                                  method="POST">
                                                @csrf
                                                @method("DELETE")

                                                <button type="submit"
                                                        class="delete-button btn btn-sm btn-sm-square btn-outline-primary m-2">
                                                    <i
                                                        class="fa fa-trash-o"></i></button>
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
            </div>
        </div>
    </div>
@endsection
