@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h6 class="mb-4">Yeni Fotoğraf Ekle</h6>
                        <a href="{{url("/categories/$category->category_id/category_images")}}" type="button"
                           class="btn btn-lg btn-lg-square btn-outline-light m-2"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <form action="{{url("/categories/$category->category_id/category_images")}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <input type="hidden" name="category_id" value="{{$category->category_id}}">
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Fotoğraf</label>
                            <input class="form-control bg-dark" type="file" id="image_url" name="image_url">
                            @error("image_url")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alt" class="form-label">Alternatif Açıklama</label>
                            <input name="alt" type="text" class="form-control" id="alt"
                                   value="{{old("alt")}}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
