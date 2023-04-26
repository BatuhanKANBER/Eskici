@extends("ui.shared.theme")
@section("content")
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                                                                                             width="150px"
                                                                                             src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">{{$user->name." ".$user->surname}}</span><span
                        class="text-black-50">{{$user->email}}</span><span> </span></div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">{{$user->name}}, Profili</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Ad</label><input type="text"
                                                                                     class="form-control"
                                                                                     value="{{$user->name}}" disabled
                            >
                        </div>
                        <div class="col-md-6"><label class="labels">Soyad</label><input type="text"
                                                                                        class="form-control"
                                                                                        value="{{$user->surname}}"
                                                                                        disabled
                            ></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Telefon Numarası</label><input type="text"
                                                                                                    class="form-control"
                                                                                                    value="{{$user->phone_number}}"
                                                                                                    disabled
                            >
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Varsayılan Adres</label> <select
                                class="form-control" aria-label="Default select example"
                                name="address_id" id="address_id">
                                <option value="-1">Seçiniz</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mt-5 text-center">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                            <a href="{{"/admin/profile/$user->user_id/edit"}}" class="btn btn-primary profile-button"
                               type="submit"><i class="fa fa-edit"></i>
                            </a>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                            <a href="{{"/user/profile/$user->user_id/edit"}}" class="btn btn-primary profile-button"
                               type="submit"><i class="fa fa-edit"></i>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
