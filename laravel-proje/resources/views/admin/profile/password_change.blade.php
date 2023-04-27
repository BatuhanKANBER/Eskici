@extends("admin.shared.theme")
@section("content")
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 ">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle mt-5"
                            width="150px"
                            src="{{url("ui/img/member.png")}}"><span
                            class="font-weight-bold">{{$user->name." ".$user->surname}}</span><span
                            class="text-secondary-50">{{$user->email}}</span><span> </span></div>
                </div>
                <div class="col-md-8 card-body border-right">
                    <form action="{{url("/admin-in/profile/$user->user_id/password_change")}}" method="POST">
                        @csrf
                        @method("POST")
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mevcut Parola</label><input
                                    name="old_password" id="old_password"
                                    type="password"
                                    class="form-control"
                                >
                                @error("old_password")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels">Yeni Parola</label><input
                                    name="password" id="password"
                                    type="password"
                                    class="form-control"
                                >
                                @error("password")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels">Parolayı Onayla</label><input
                                    name="password_confirmation" id="password_confirmation"
                                    type="password"
                                    class="form-control"
                                >
                                @error("password")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Kaydet</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 card-body">
                    <a href="/admin-in/profile" type="button"
                       class="btn btn-lg btn-lg-square btn-outline-light m-2"><i
                            class="fa fa-arrow-left" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

