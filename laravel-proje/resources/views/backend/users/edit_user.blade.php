@extends("backend.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Kullanıcıyı Güncelle</h6>
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
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="{{old("email",$user->email)}}">
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-check form-switch">
                            <input name="is_admin" class="form-check-input" type="checkbox" role="switch"
                                   id="is_adminSwitchCheckDefault" {{$user->is_admin == 1 ? "checked":""}}>
                            <label class="form-check-label" for="is_adminSwitchCheckDefault">Yetkili Kullanıcı
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input name="is_active" class="form-check-input" type="checkbox" role="switch"
                                   id="is_activeSwitchCheckDefault" {{$user->is_active == 1 ? "checked":""}}>
                            <label class="form-check-label" for="is_activeSwitchCheckDefault">Aktif Kullanıcı
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
