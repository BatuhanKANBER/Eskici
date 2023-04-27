<html lang="tr">
<head>
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
        rel="stylesheet"
    />
</head>
<body>
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
        body {
            background-color: aliceblue;
        }

        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }
    </style>

    <!-- Jumbotron -->
    <div class="container py-4">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class="card-body p-5 shadow-5 text-center">
                        <h2 class="fw-bold mb-5">Üye Ol</h2>
                        <form action="{{url("/register")}}" method="POST">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input name="name" type="text" id="name" class="form-control"
                                               value="{{old("name")}}"/>
                                        <label class="form-label" for="name">Ad</label>
                                    </div>
                                    @error("name")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input name="surname" type="text" id="surname" class="form-control"
                                               value="{{old("surname")}}"/>
                                        <label class="form-label" for="surname">Soyad</label>
                                    </div>
                                    @error("surname")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-outline mb-4">
                                <input name="phone_number" type="text" id="phone_number" class="form-control"
                                       value="{{old("phone_number")}}"/>
                                <label class="form-label" for="phone_number">Telefon Numarası</label>
                            </div>
                            @error("phone_number")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <!-- Email input phone_number-->
                            <div class="form-outline mb-4">
                                <input name="email" type="email" id="email" class="form-control"
                                       value="{{old("email")}}"/>
                                <label class="form-label" for="email">Email Adresi</label>
                            </div>
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="password" class="form-control"/>
                                <label class="form-label" for="password">Parola</label>
                            </div>
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="password_confirmation" type="password" id="password_confirmation"
                                       class="form-control"/>
                                <label class="form-label" for="password_confirmation">Parolayı Onayla</label>
                            </div>
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Kaydet
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="{{asset("ui/img/login.jpg")}}" class="w-100 rounded-4 shadow-4"
                     alt="login image"/>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
<!-- MDB -->
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
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
</body>
</html>

