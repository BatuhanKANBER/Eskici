@extends("ui.shared.theme")
@section("content")
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-2 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                                                                                             width="150px"
                                                                                             src="{{url("ui/img/member.png")}}"><span
                        class="font-weight-bold">{{$userIn->name." ".$userIn->surname}}</span><span
                        class="text-black-50">{{$userIn->email}}</span><span> </span></div>
            </div>
            <div class="col-md-7 border-right">
                <form
                    @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                        action="{{url("/admin/profile/$userIn->user_id")}}"
                    @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                        action="{{url("/user/profile/$userIn->user_id")}}"
                    @endif
                    method="POST"
                >
                    @csrf
                    @method("POST")
                    <input type="hidden" name="user_id" value="{{$userIn->user_id}}">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">{{$userIn->name}}, Profili</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Ad</label><input name="name" id="name"
                                                                                         type="text"
                                                                                         class="form-control"
                                                                                         value="{{old("name",$userIn->name)}}"
                                >
                                @error("name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6"><label class="labels">Soyad</label><input name="surname" id="surname"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            value="{{old("surname",$userIn->surname)}}"

                                >
                                @error("surname")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Telefon Numarası</label><input
                                    name="phone_number" id="phone_number"
                                    type="text"
                                    class="form-control"
                                    value="{{old("phone_number",$userIn->phone_number)}}"
                                >
                                @error("phone_number")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Kaydet</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2 d-block ">
                <div class="row mt-3">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                            <a href="{{"/admin/profile/$userIn->user_id/password_change"}}"
                               class="btn btn-primary profile-button w-100 ml-3"
                               type="submit">Parola Değiştir<i class="fa fa-key"></i></a>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                            <a href="{{"/user/profile/$userIn->user_id/password_change"}}"
                               class="btn btn-primary profile-button w-100 ml-3"
                               type="submit">Parola Değiştir<i class="fa fa-key"></i></a>
                        @endif
                    @endif
                </div>
                <div class="row mt-3">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                            <a href="{{"/admin/profile/$userIn->user_id/address"}}"
                               class="btn btn-primary profile-button w-100 ml-3"
                               type="submit">Adreslerim<i class="fa fa-map-signs"></i></a>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                            <a href="{{"/user/profile/$userIn->user_id/address"}}"
                               class="btn btn-primary profile-button w-100 ml-3"
                               type="submit">Adreslerim<i class="fa fa-map-signs"></i></a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="col-md-1 d-block">
                <div class="row mt-3">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                            <a href="{{"/admin/profile"}}"
                               class="btn btn-primary profile-button ml-3"
                               type="submit"><i
                                    class="fa fa-arrow-left"></i>
                            </a>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                            <a href="{{"/user/profile"}}"
                               class="btn btn-primary profile-button ml-3"
                               type="submit"><i
                                    class="fa fa-arrow-left"></i>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>

        var phoneInput = document.getElementById('phone_number');
        var myForm = document.forms.myForm;
        var result = document.getElementById('result');  // only for debugging purposes

        phoneInput.addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });

        myForm.addEventListener('submit', function (e) {
            phoneInput.value = phoneInput.value.replace(/\D/g, '');
            result.innerText = phoneInput.value;  // only for debugging purposes

            e.preventDefault(); // You wouldn't prevent it
        });
    </script>
@endsection


