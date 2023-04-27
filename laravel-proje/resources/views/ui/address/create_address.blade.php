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
            <div class="col-md-9 border-right">
                <div class="d-flex justify-content-between ">
                    <h6 class="mb-4">Yeni Adres Ekle</h6>
                </div>
                <form
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                            action="{{url("/admin/profile/$user->user_id/address")}}"
                    @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                        action="{{url("/user/profile/$user->user_id/address")}}"
                    @endif
                    @endif
                    method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->user_id}}">
                    <div class="mb-3">
                        <label for="tittle" class="form-label">Başlık</label>
                        <input name="tittle" type="text" class="form-control" id="tittle" value="{{old("tittle")}}">
                        @error("tittle")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">İl</label>
                        <input name="city" type="text" class="form-control" id="city" value="{{old("city")}}">
                        @error("city")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="district" class="form-label">İlçe</label>
                        <input name="district" type="text" class="form-control" id="district"
                               value="{{old("district")}}">
                        @error("district")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="zipcode" class="form-label">Posta Kodu</label>
                        <input name="zipcode" type="text" class="form-control" id="zipcode"
                               value="{{old("zipcode")}}">
                        @error("zipcode")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address_description" class="form-label">Adres</label>
                        <textarea name="address_description" type="text" class="form-control"
                                  id="address_description">{{old("address_description")}}</textarea>
                        @error("address_description")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-check form-switch">
                        <input name="is_default" class="form-check-input" type="checkbox" role="switch"
                               id="is_defaultSwitchCheckDefault">
                        <label class="form-check-label" for="is_defaultSwitchCheckDefault">Varsayılan Adres
                        </label>
                    </div>
                    <br>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Kaydet</button>
                    </div>
                </form>
            </div>
            <div class="col-md-1">
                @if(\Illuminate\Support\Facades\Auth::user())
                    @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                        <a href="{{"/admin/profile/$user->user_id/address"}}"
                           class="btn btn-primary profile-button w-100"
                           type="submit"><i
                                class="fa fa-arrow-left"></i>
                        </a>
                    @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                        <a href="{{"/user/profile/$user->user_id/address"}}"
                           class="btn btn-primary profile-button w-100"
                           type="submit"><i
                                class="fa fa-arrow-left"></i>
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
