@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between ">
                        <h4 class="mb-4">Kullanıcılar Tablosu</h4>
                        <a href="/users/create" type="button" class="btn btn-lg btn-lg-square btn-outline-success m-2"><i
                                    class="fa fa-user-plus" aria-hidden="true"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ad</th>
                                <th scope="col">Soyad</th>
                                <th scope="col">Email</th>
                                <th scope="col">Durum</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users)>0)
                                @foreach($users as $user)
                                    <tr id="{{$user->user_id}}">
                                        <th> {{$loop->iteration}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->surname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->is_active==1)
                                                <span class="badge bg-success">Aktif</span>
                                            @elseif($user->is_active==0)
                                                <span class="badge bg-danger">Pasif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{"/users/$user->user_id"}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <a href="{{url("/users/$user->user_id/edit")}}" type="button"
                                                   class="btn btn-sm btn-sm-square btn-outline-warning m-2"><i
                                                            class="fa fa-pencil-square-o"></i></a>
                                                -
                                                <button type="submit"
                                                        class="delete-button btn btn-sm btn-sm-square btn-outline-primary m-2">
                                                    <i
                                                            class="fa fa-trash-o"></i></button>
                                                -
                                                <a href="{{url("/users/$user->user_id/password-change")}}" type="button"
                                                   class="btn btn-sm btn-sm-square btn-outline-light m-2"><i
                                                            class="fa fa-key"></i></a>
                                                -
                                                <a href="{{url("/users/$user->user_id/addresses")}}" type="button"
                                                   class="btn btn-sm btn-sm-square btn-outline-info m-2"><i
                                                            class="fa fa-map-signs"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"><p class="text-center">Herhangi bir kullanıcı bulunamadı.</p>
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
