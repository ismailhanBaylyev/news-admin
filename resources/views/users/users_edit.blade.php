@extends('sections/navbar')

@section('title', 'Изменить пользователя')

@section('content')
@section('include_script')
<script src="{{asset('assets/js/my-switcher.js')}}"></script>
@endsection
<h1 class="mb-5"><a href="/users" class="text-muted">Пользователи</a> / Изменить пользователя</h1>

<div class="card mb-4">
    <div class="card-body">
        <form id="formAccountSettings" action="/edit-users/{{ $users[0]['id'] }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="test@example.com" value="{{ $users[0]['email'] }}" />
                <span class="text-danger">@error('email'){{$message}}@enderror<span>
            </div>
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="pass" class="form-label">Новый пароль</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="12345678" />
                <span class="text-danger">@error('password'){{$message}}@enderror<span>
            </div>
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="status" class="form-label">Статус</label>
                <br>
                <input type="checkbox" class="js-switch" @if($users[0]['status'] == 1)checked @endif />
                <input type="hidden" class="status" name="status" value="{{$users[0]['status']}}">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Сохранить</button>
                <a href="/users">
                    <button type="button" class="btn btn-outline-secondary">Отмена</button>
                </a>
            </div>
        </form>
    </div>
</div>  

@endsection
