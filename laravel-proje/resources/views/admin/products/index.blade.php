@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h4 class="mb-4">Ürünler Tablosu</h4>
                        <a href="/products/create" type="button"
                           class="btn btn-lg btn-lg-square btn-outline-success m-2"><i
                                class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ürün Adı</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Fiyat</th>
                                <th scope="col">Durum</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($products)>0)
                                @foreach($products as $product)
                                    <tr id="{{$product->product_id}}">
                                        <th> {{$loop->iteration}}</th>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->price}}&#8378;</td>
                                        <td>
                                            @if($product->is_active==1)
                                                <span class="badge bg-success">Aktif</span>
                                            @elseif($product->is_active==0)
                                                <span class="badge bg-danger">Pasif</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{url("/products/$product->product_id/edit")}}"
                                               type="button"
                                               class="btn btn-sm btn-sm-square btn-outline-warning m-2"><i
                                                    class="fa fa-pencil-square-o"></i></a>
                                            <form action="{{"/products/$product->product_id"}}"
                                                  method="POST">
                                                @csrf
                                                @method("DELETE")

                                                <button type="submit"
                                                        class="delete-button btn btn-sm btn-sm-square btn-outline-primary m-2">
                                                    <i
                                                        class="fa fa-trash-o"></i></button>
                                            </form>
                                            <a href="{{url("/products/$product->product_id/images ")}}"
                                               type="button"
                                               class="btn btn-sm btn-sm-square btn-outline-info m-2"><i
                                                    class="fa fa-picture-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"><p class="text-center">Sistemde kayıtlı herhangi
                                            bir ürün
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
