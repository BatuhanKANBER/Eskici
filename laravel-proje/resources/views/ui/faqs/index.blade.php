@extends("ui.shared.theme")
@section("content")
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sıkça Sorulan Sorular</span></h2>
    </div>
    <div class="accordion" id="accordionExample">
        @if(count($faqs)>0)
            @foreach($faqs as $faq)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="{{"#a".$faq->faq_id}}"
                                    aria-expanded="true" aria-controls="collapseOne">
                                {{$faq->question}}?
                            </button>
                        </h5>
                    </div>

                    <div id="{{"a".$faq->faq_id}}" class="collapse" aria-labelledby="headingOne"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p> {{$faq->answer}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
