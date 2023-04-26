@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h6 class="mb-4">Kullanıcıyı Güncelle</h6>
                        <a href="/users" type="button"
                           class="btn btn-lg btn-lg-square btn-outline-light m-2"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <form action="{{url("/users/$user->user_id")}}" method="POST">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="user_id" value="{{$user->user_id}}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Ad</label>
                            <input name="name" type="text" class="form-control" id="name"
                                   value="{{old("name",$user->name)}}">
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Soyad</label>
                            <input name="surname" type="text" class="form-control" id="surname"
                                   value="{{old("surname",$user->surname)}}">
                            @error("surname")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Telefon Numarası</label>
                            <input name="phone_number" type="text" class="form-control" id="phone_number"
                                   value="{{old("phone_number",$user->phone_number)}}">
                            @error("phone_number")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="{{old("email",$user->email)}}">
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-check form-switch">
                            <input name="is_active" class="form-check-input" type="checkbox" role="switch"
                                   id="is_activeSwitchCheckDefault" {{$user->is_active == 1 ? "checked":""}}>
                            <label class="form-check-label" for="is_activeSwitchCheckDefault">Aktif Kullanıcı
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input name="role" class="form-check-input" type="checkbox" role="switch"
                                   id="roleSwitchCheckDefault" {{$user->role == "admin" ? "checked":""}}>
                            <label class="form-check-label" for="roleSwitchCheckDefault">Yetkili Kullanıcı
                            </label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
