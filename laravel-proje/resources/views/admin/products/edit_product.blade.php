@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h6 class="mb-4">Ürünü Güncelle</h6>
                        <a href="/products" type="button"
                           class="btn btn-lg btn-lg-square btn-outline-light m-2"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <form action="{{url("/products/$product->product_id ")}}" method="POST" autocomplete="off">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="product_id" value="{{$product->product_id}}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Ürün Adı</label>
                            <input name="name" type="text" class="form-control" id="name"
                                   value="{{old("name",$product->name)}}">
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select class="form-select mb-3" aria-label="Default select example"
                                    name="category_id" id="category_id">
                                <option selected>Seçiniz</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->category_id}}" {{$product->category_id==$category->category_id ? "selected":""}}>{{old("name",$category->is_active==true ? "$category->name":null)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Fiyat</label>
                            <input name="price" type="text" class="form-control" id="price"
                                   value="{{old("price",$product->price)}}">
                            @error("price")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="old_price" class="form-label">Eski Fiyat</label>
                            <input name="old_price" type="text" class="form-control" id="old_price"
                                   value="{{old("old_price",$product->old_price)}}">
                            @error("old_price")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lead" class="form-label">Kısa Açıklama</label>
                            <input name="lead" type="text" class="form-control" id="lead"
                                   value="{{old("lead",$product->lead)}}">
                            @error("lead")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea name="description" type="text" class="form-control"
                                      id="description">{{old("description",$product->description)}}</textarea>
                            @error("description")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-check form-switch">
                            <input name="is_active" class="form-check-input" type="checkbox" role="switch"
                                   id="is_activeSwitchCheckDefault" {{$product->is_active == 1 ? "checked":""}}>
                            <label class="form-check-label" for="is_activeSwitchCheckDefault">Aktif Ürün
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input name="is_favorite" class="form-check-input" type="checkbox" role="switch"
                                   id="is_favoriteSwitchCheckDefault" {{$product->is_favorite == 1 ? "checked":""}}>
                            <label class="form-check-label" for="is_favoriteSwitchCheckDefault">Favori Ürün
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
