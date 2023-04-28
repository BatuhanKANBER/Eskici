@extends("ui.shared.theme")
<style>
    .card {
        width: 460px;
        height: 280px;
        margin: 0 auto;
        background: linear-gradient(45deg, rgb(6, 36, 58) 0%, rgb(170, 228, 245) 35%, rgb(6, 36, 58) 100%);
        border: 1px solid rgba(0, 0, 0, .3);
        border-radius: 15px;
    }

    .intern {
        padding: 20px;
    }

    .visa {
        width: 70px;
        height: 50px;
    }

    .chip {
        height: 40px;
        position: relative;
        left: 87%;
        bottom: 20px;
    }

    .card_number {
        margin-top: 40px;
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        display: flex;
    }

    .card-holder {
        color: whitesmoke;
    }

    .card label {
        font-size: .7rem;
    }

    .card-infos {
        display: flex;
        width: 40%;
        justify-content: space-between;
        color: white;
    }

    #credit-card {
        display: flex;
        flex-direction: column;
        gap: 15px;
        font-size: 1.1rem;
        color: white;
        text-transform: uppercase;
    }

    input[type="text"]:focus {
        border: 1px solid #95B8D1;
    }

    input#valid-thru-text, input#cvv {
        width: 80%;
    }

    input[type="submit"] {
        width: 95%;
        background-color: #008cb1;
        cursor: pointer;
    }
</style>
@section("content")
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 border-right">

                <div class="card">
                    <div class="intern">
                        <img class="visa" src="{{asset("ui/img/visa.png")}}" alt="chip">
                        <div class="card_number">
                            <div class="number-vl">0000 0000 0000 0000</div>
                        </div>
                        <div class="card-holder d-flex">
                            <div class="name-vl">AD</div>&nbsp;
                            <div class="surname-vl">SOYAD</div>
                        </div>
                        <br>
                        <div class="card-infos">
                            <div class="exp">
                                <label>Valid-Thru</label>
                                <div class="d-flex">
                                    <div class="month-vl">AA</div>
                                    /
                                    <div class="year-vl">YY</div>
                                </div>
                            </div>
                            <div class="cvv">
                                <label>CVV</label>
                                <div class="cvv-vl">000</div>
                            </div>
                        </div>
                        <img class="chip" src="{{asset("ui/img/chip.png")}}" alt="chip">
                    </div>
                </div>

            </div>
            <div class="col-md-5 border-right">
                <form id="credit-card">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="card_number" class="text-dark">Kart Numarası</label>
                            <input type="text"
                                   class="form-control" name="card_number" id="card_number" maxlength="19"
                                   placeholder="0000 0000 0000 0000"
                                   required
                                   onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="text-dark">Ad</label>
                            <input type="text"
                                   class="form-control" name="name" id="name" maxlength="30"
                                   placeholder="Ad"
                                   required
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.key == ' '">
                        </div>
                        <div class="col-md-6">
                            <label for="surname" class="text-dark">Soyad</label>
                            <input type="text"
                                   class="form-control" name="surname" id="surname" maxlength="30"
                                   placeholder="Soyad"
                                   required
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.key == ' '">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="col-md-6">
                                <label class="text-dark" for="month">Ay</label>
                                <input type="text"
                                       class="form-control" name="month" id="month" maxlength="2"
                                       placeholder="AA"
                                       required
                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="col-md-6">
                                <label class="text-dark" for="year">Yıl</label>
                                <input type="text"
                                       class="form-control" name="year" id="year" maxlength="2"
                                       placeholder="YY"
                                       required
                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cvv" class="text-dark">Cvv</label>
                            <input type="text"
                                   class="form-control mr-0" name="cvv" id="cvv" maxlength="3"
                                   placeholder="000"
                                   required
                                   onkeypress="return event.charCode >=48 && event.charCode <= 57">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" value="ADD" id="add">ÖDEMEYİ TAMAMLA</button>
                </form>
            </div>
            <div class="col-md-1">
                @if(\Illuminate\Support\Facades\Auth::user())
                    @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                        <a href="{{"/admin/my-basket"}}"
                           class="btn btn-primary profile-button ml-3"
                           type="submit"><i
                                class="fa fa-arrow-left"></i>
                        </a>
                    @elseif(\Illuminate\Support\Facades\Auth::user()->role=="user")
                        <a href="{{"/user/my-basket"}}"
                           class="btn btn-primary profile-button ml-3"
                           type="submit"><i
                                class="fa fa-arrow-left"></i>
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <script>
        const form = document.querySelector("#credit-card");
        const cardNumber = document.querySelector("#card_number");
        const cardName = document.querySelector("#name");
        const cardSurname = document.querySelector("#surname");
        const cardMonth = document.querySelector("#month");
        const cardYear = document.querySelector("#year");
        const cardCVV = document.querySelector("#cvv");
        const cardNumberText = document.querySelector(".number-vl");
        const cardNameText = document.querySelector(".name-vl");
        const cardSurnameText = document.querySelector(".surname-vl");
        const cardMonthText = document.querySelector(".month-vl");
        const cardYearText = document.querySelector(".year-vl");
        const cardCVVText = document.querySelector(".cvv-vl");

        cardNumber.addEventListener("keyup", (e) => {
            if (!e.target.value) {
                cardNumberText.innerText = "1234 5678 9101 1121";
            } else {
                const valuesOfInput = e.target.value.replaceAll(" ", "");

                if (e.target.value.length > 14) {
                    e.target.value = valuesOfInput.replace(/(\d{4})(\d{4})(\d{4})(\d{0,4})/, "$1 $2 $3 $4");
                    cardNumberText.innerHTML = valuesOfInput.replace(/(\d{4})(\d{4})(\d{4})(\d{0,4})/, "$1 $2 $3 $4");
                } else if (e.target.value.length > 9) {
                    e.target.value = valuesOfInput.replace(/(\d{4})(\d{4})(\d{0,4})/, "$1 $2 $3");
                    cardNumberText.innerHTML = valuesOfInput.replace(/(\d{4})(\d{4})(\d{0,4})/, "$1 $2 $3");
                } else if (e.target.value.length > 4) {
                    e.target.value = valuesOfInput.replace(/(\d{4})(\d{0,4})/, "$1 $2");
                    cardNumberText.innerHTML = valuesOfInput.replace(/(\d{4})(\d{0,4})/, "$1 $2");
                } else {
                    cardNumberText.innerHTML = valuesOfInput
                }
            }
        })

        cardName.addEventListener("keyup", (e) => {
            if (!e.target.value) {
                cardNameText.innerHTML = "AD";
            } else {
                cardNameText.innerHTML = e.target.value.toUpperCase();
            }
        })

        cardSurname.addEventListener("keyup", (e) => {
            if (!e.target.value) {
                cardSurnameText.innerHTML = "SOYAD";
            } else {
                cardSurnameText.innerHTML = e.target.value.toUpperCase();
            }
        })

        cardMonth.addEventListener("keyup", (e) => {
            if (!e.target.value) {
                cardMonthText.innerHTML = "AA";
            } else {
                cardMonthText.innerHTML = e.target.value.mask("12");
                cardMonthText.innerHTML = e.target.value.toUpperCase();
            }
        })

        cardYear.addEventListener("keyup", (e) => {
            if (!e.target.value) {
                cardYearText.innerHTML = "YY";
            } else {
                cardYearText.innerHTML = e.target.value.toUpperCase();
            }
        })

        cardCVV.addEventListener("keyup", (e) => {
            if (!e.target.value) {
                cardCVVText.innerHTML = "123";
            } else {
                cardCVVText.innerHTML = e.target.value;
            }
        })

        form.addEventListener("submit", (e) => {
            e.preventDefault();

            alert("Credit Card Added!");
        })
    </script>
@endsection
