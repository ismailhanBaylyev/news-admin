@extends('sections/auth_base')

@section('title', 'Авторизация')

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <div class="w-100 text-center mb-3">
                    <img src="{{asset('assets/images/logos/logo.png')}}" width="180" alt="">
                </div>
                <p class="mb-4 text-danger">@error('auth'){{$message}}@enderror</p>
                <form method="POST">
                @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="test@example.com">
                    <span class="text-danger">@error('email'){{$message}}@enderror<span>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="12345678">
                    <span class="text-danger">@error('password'){{$message}}@enderror<span>
                  </div>
                  <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Войти">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection