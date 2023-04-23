@extends("ui.shared.theme")
@section("content")
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Hakkımızda</span></h2>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading"><span
                    class="text-muted">Eskici nedir?</span></h2>
            <p class="lead">Türkiye'nin en büyük ve en kapsamlı retro, vintage ve özenle seçilmiş antika ürünlerini
                Umuttepe mağazamızda topladık. Antika yolculuğunda hikayesi olan ürünleri seçiyor ve sizlere
                sunuyoruz.</p>
        </div>
        <div class="col-md-5">
            <img width="600" height="400" src="{{asset("ui/img/about_us_1.jpg")}}"
                 class="featurette-image img-fluid mx-auto"
            >
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading"><span class="text-muted">Vizyonumuz</span>
            </h2>
            <p class="lead">Kaliteli ve temiz antika eserleri Türkiye'nin yanı sıra tüm dünyada müşteriyle buluşturan;
                müşterilerin kendini iyi hissedeceği ve güvenle alışveriş yapabileceği ortamı sunarak, sektöründe en çok
                tercih edilen ve beğenilen marka olmaktır.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img width="600px" height="400px" src="{{asset("ui/img/about_us_2.jpg")}}"
                 class="featurette-image img-fluid mx-auto"
            >
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading"><span class="text-muted">Misyonumuz</span></h2>
            <p class="lead">En doğru fiyat-kalite oranını sağlayarak, temiz ve ahlaklı çalışma sürdürerek geniş ürün
                yelpazesiyle müşteri beklentilerini en üst seviyede karşılamaktır.</p>
        </div>
        <div class="col-md-5">
            <img width="600px" height="400px" src="{{asset("ui/img/about_us_3.jpg")}}"
                 class="featurette-image img-fluid mx-auto"
            >
        </div>
    </div>

@endsection
