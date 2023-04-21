@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h4 class="mb-4">Ürün Fotoğrafları Tablosu</h4>
                        <ul class="d-flex list-unstyled">
                            <li><a href="{{url("/products/$product->product_id/images/create")}}" type="button"
                                   class="btn btn-lg btn-lg-square btn-outline-success m-2"><i
                                        class="fa fa-plus" aria-hidden="true"></i></a></li>
                            <li><a href="/products" type="button"
                                   class="btn btn-lg btn-lg-square btn-outline-light m-2"><i
                                        class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fotoğraf</th>
                                <th scope="col">Açıklama</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($product->images)>0)
                                @foreach($product->images as $image)
                                    <tr id="{{$image->image_id}}">
                                        <th>{{$image->seq}}</th>
                                        <td>{{$image->image_url}}</td>
                                        <td>{{$image->alt}}</td>
                                        <td class="d-flex">
                                            <a href="{{url("/products/$product->product_id/images/$image->image_id/edit")}}"
                                               type="button"
                                               class="btn btn-sm btn-sm-square btn-outline-warning m-2"><i
                                                    class="fa fa-pencil-square-o"></i></a>

                                            <form action="{{"/products/$product->product_id/images/$image->image_id"}}"
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
                                    <td colspan="4"><p class="text-center">Sistemde bu ürün için herhangi bir fotoğraf
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
