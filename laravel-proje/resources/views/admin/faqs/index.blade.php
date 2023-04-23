@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h4 class="mb-4">SSS Tablosu</h4>
                        <a href="/faqs/create" type="button"
                           class="btn btn-lg btn-lg-square btn-outline-success m-2"><i
                                class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Soru</th>
                                <th scope="col">Cevap</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($faqs)>0)
                                @foreach($faqs as $faq)
                                    <tr id="{{$faq->faq_id}}">
                                        <th> {{$loop->iteration}}</th>
                                        <td>{{$faq->question}}</td>
                                        <td>{{$faq->answer}}</td>
                                        <td class="d-flex">
                                            <a href="{{url("/faqs/$faq->faq_id/edit")}}"
                                               type="button"
                                               class="btn btn-sm btn-sm-square btn-outline-warning m-2"><i
                                                    class="fa fa-pencil-square-o"></i></a>

                                            <form action="{{url("/faqs/$faq->faq_id")}}"
                                                  method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit"
                                                        class="delete-button btn btn-sm btn-sm-square btn-outline-primary m-2">
                                                    <i
                                                        class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5"><p class="text-center">Sistemde kayıtlı herhangi bir SSS
                                            bulunamadı.</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
