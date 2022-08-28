@extends('web/layouts.app')

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid pt-5 text-align">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Đăng nhập</span></h2>
        </div>

        <div class="row justify-content-md-center px-xl-5">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form class="col-md-6 col-12" action="/login" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">mật khẩu</label>
                    <input type="password" class="form-control" value="{{ old('password') }}"name="password"
                        id="exampleInputPassword1">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember_me" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>

                <button type="submit"  class="btn btn-primary">Login</button>

            </form>
        </div>
    </div>
    <!-- Contact End -->
@endsection
