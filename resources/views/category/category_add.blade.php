@extends('sections/navbar')

@section('title', 'Добавить пользователя')

@section('content')
@section('include_script')
<script src="{{asset('assets/js/my-switcher.js')}}"></script>
@endsection
<h1 class="mb-5"><a href="/category" class="text-muted">Категории</a> / Добавить категорию</h1>

<div class="card mb-4">
    <div class="card-body">
        <form id="formAccountSettings" action="/add-category" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Example" />
                <span class="text-danger">@error('name'){{$message}}@enderror<span>
            </div>
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="status" class="form-label">Статус</label>
                <br>
                <input type="checkbox" class="js-switch" checked />
                <input type="hidden" class="status" name="status" value="1">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Сохранить</button>
                <a href="/category">
                    <button type="button" class="btn btn-outline-secondary">Отмена</button>
                </a>
            </div>
        </form>
    </div>
</div>  

@endsection
