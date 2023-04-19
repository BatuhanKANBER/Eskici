@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Şifre Değiştirme</h6>
                    <form action="{{url("/users/$user->user_id/password-change")}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->user_id}}">
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input name="password" type="password" class="form-control" id="password"
                                   autocomplete="new-password">
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
