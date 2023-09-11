@extends('sections/navbar')

@section('title', 'Изменить пользователя')

@section('content')
@section('include_script')
<script src="{{asset('assets/js/my-switcher.js')}}"></script>
@endsection
<h1 class="mb-5"><a href="/category" class="text-muted">Категории</a> / Изменить категорию</h1>

<div class="card mb-4">
    <div class="card-body">
        <form id="formAccountSettings" action="/edit-category/{{ $category[0]['id'] }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Example" value="{{ $category[0]['name'] }}" />
                <span class="text-danger">@error('name'){{$message}}@enderror<span>
            </div>
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="status" class="form-label">Статус</label>
                <br>
                <input type="checkbox" class="js-switch" @if($category[0]['status'] == 1)checked @endif />
                <input type="hidden" class="status" name="status" value="{{$category[0]['status']}}">
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
