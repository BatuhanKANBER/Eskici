@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4 d-flex">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                        class="rounded-circle mt-3"
                        width="150px"
                        src="{{url("ui/img/member.png")}}"><span
                        class="font-weight-bold">{{$user->name." ".$user->surname}}</span><span
                        class="text-secondary-50">{{$user->email}}</span><span> </span></div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">{{$user->name}}, Profili</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Ad</label><input type="text"
                                                                                     class="form-control"
                                                                                     value="{{$user->name}}"
                                                                                     disabled
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
                                name="address_id" id="address_id" disabled>
                                <option value="-1">Seçiniz</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mt-5 text-center">
                    <a href="{{"/admin-in/profile/$user->user_id/edit"}}" class="btn btn-primary profile-button"
                       type="button"><i class="fa fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
