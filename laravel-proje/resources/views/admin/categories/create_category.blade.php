@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h6 class="mb-4">Yeni Kategori Ekle</h6>
                        <a href="/categories" type="button"
                           class="btn btn-lg btn-lg-square btn-outline-light m-2"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <form action="{{url("/categories")}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Kategori Ad</label>
                            <input name="name" type="text" class="form-control" id="city" value="{{old("name")}}">
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-check form-switch">
                            <input name="is_active" class="form-check-input" type="checkbox" role="switch"
                                   id="is_activeSwitchCheckDefault">
                            <label class="form-check-label" for="is_activeSwitchCheckDefault">Aktif Kategori
                            </label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
