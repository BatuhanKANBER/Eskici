@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h6 class="mb-4">Yeni SSS Ekle</h6>
                        <a href="/faqs" type="button"
                           class="btn btn-lg btn-lg-square btn-outline-light m-2"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <form action="{{url("/faqs")}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="question" class="form-label">Soru</label>
                            <input name="question" type="text" class="form-control" id="question"
                                   value="{{old("question")}}">
                            @error("question")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Cevap</label>
                            <textarea name="answer" type="text" class="form-control" id="answer"
                            >{{old("answer")}}</textarea>
                            @error("answer")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
