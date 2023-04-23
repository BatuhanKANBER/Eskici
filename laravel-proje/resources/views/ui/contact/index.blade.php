@extends("ui.shared.theme")
@section("content")
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Bizimle İletişime Geçin</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Adınız"
                                   required="required" data-validation-required-message="Bu alan zorunlu."/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="E-posta"
                                   required="required" data-validation-required-message="Bu alan zorunlu."/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Başlık"
                                   required="required" data-validation-required-message="Bu alan zorunlu."/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Mesaj"
                                      required="required"
                                      data-validation-required-message="Bu alan zorunlu."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Gönder
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Eskici</h5>
                <p>Türkiye'nin en büyük ve en kapsamlı retro, vintage ve özenle seçilmiş antika ürünlerini Umuttepe
                    mağazamızda topladık. Antika yolculuğunda hikayesi olan ürünleri seçiyor ve sizlere sunuyoruz.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">İletişim Bilgileri</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Umuttepe, İzmit, Kocaeli</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@eskici.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+090 - (555) 555 55 55</p>
                </div>
            </div>
        </div>
    </div>
@endsection
