@extends("backend.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Yeni Kullanıcı Ekle</h6>
                    <form action="{{url("/users")}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Ad</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{old("name")}}">
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Soyad</label>
                            <input name="surname" type="text" class="form-control" id="name" value="{{old("surname")}}">
                            @error("surname")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="{{old("email")}}">
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input name="password" type="password" class="form-control" id="password"
                                   autocomplete="new-password">
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input  onclick="myFunction1()" type="checkbox" class="form-check-input" id="passwordCheck1">
                            <label class="form-check-label" for="passwordCheck1">Göster</label>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Şifreyi Doğrula</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                   id="password_confirmation"
                                   autocomplete="new-password">
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input onclick="myFunction2()" type="checkbox" class="form-check-input" id="passwordCheck2">
                            <label  class="form-check-label" for="passwordCheck2">Göster</label>
                        </div>
                        <div class="form-check form-switch">
                            <input name="is_admin" class="form-check-input" type="checkbox" role="switch"
                                   id="is_adminSwitchCheckDefault">
                            <label class="form-check-label" for="is_adminSwitchCheckDefault">Yetkili Kullanıcı
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input name="is_active" class="form-check-input" type="checkbox" role="switch"
                                   id="is_activeSwitchCheckDefault">
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

    <script>
        function myFunction1() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function myFunction2() {
            var x = document.getElementById("password_confirmation");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

@endsection
