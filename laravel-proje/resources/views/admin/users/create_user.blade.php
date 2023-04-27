@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="rounded p-4">
                    <div class="d-flex justify-content-between ">
                        <h6 class="mb-4">Yeni Kullanıcı Ekle</h6>
                        <a href="/users" type="button"
                           class="btn btn-lg btn-lg-square btn-outline-light m-2"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
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
                            <label for="phone_number" class="form-label">Telefon Numarası</label>
                            <input name="phone_number" type="text" class="form-control" id="phone_number"
                            >
                            @error("phone_number")
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
                            <input name="password" type="password" class="form-control" id="password">
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input onclick="myFunction1()" type="checkbox" class="form-check-input" id="passwordCheck1">
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
                            <label class="form-check-label" for="passwordCheck2">Göster</label>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check form-switch d-block">
                                <div>
                                    <input name="role" class="form-check-input" type="checkbox" role="switch"
                                           id="roleSwitchCheckDefault">
                                    <label class="form-check-label" for="roleSwitchCheckDefault">Yetkili Kullanıcı
                                    </label>
                                </div>
                                <div>
                                    <input name="is_active" class="form-check-input" type="checkbox" role="switch"
                                           id="is_activeSwitchCheckDefault">
                                    <label class="form-check-label" for="is_activeSwitchCheckDefault">Aktif Kullanıcı
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-danger">Kaydet</button>
                        </div>

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
