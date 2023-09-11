@extends('sections/navbar')

@section('title', 'Изменить статью')

@section('content')
@section('include_script')
<script src="{{asset('assets/js/my-switcher.js')}}"></script>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
    });
    quill.on('text-change', function(delta, source) {
        let content_val = document.querySelector('.content-value');
        content_val.value = source['ops'][0]['insert'];
    });
</script>
@endsection
@php
    function picUrl($pic){
        $arr = explode('/', $pic);
        $url = '/storage';
        foreach($arr as $a){
            if($a != 'public'){
                $url .= '/'.$a;
            }
        }
        return $url;
    }
@endphp
<h1 class="mb-5"><a href="/news" class="text-muted">Статьи</a> / Изменить статью</h1>

<div class="card mb-4">
    <div class="card-body">
        <form id="formAccountSettings" action="/edit-news/{{ $news[0]['id'] }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Example" value="{{ $news[0]['name'] }}" />
                <span class="text-danger">@error('name'){{$message}}@enderror<span>
            </div>
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="name" class="form-label">Слаг</label>
                <input type="text" name="slug" class="form-control" id="name" placeholder="..." value="{{ $news[0]['slug'] }}" />
                <span class="text-danger">@error('name'){{$message}}@enderror<span>
            </div>
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="lastName" class="form-label">Содержимое</label>
                <div id="editor">
                    <p>{{ $news[0]['content'] }}</p>
                </div>
                <input type="hidden" class="content-value" name="content" value="{{ $news[0]['content'] }}">
                <span class="text-danger">@error('content'){{$message}}@enderror<span>
            </div>
            <div class="col-12 mb-3">
                <label for="category" class="form-label">Категории</label>
                <br>
                <select name="category" class="form-control" id="category">
                    <option value="" hidden>Выберите категорию</option>
                    @foreach($category as $cat)
                        <option value="{{$cat['id']}}" @if($news[0]['category_id'] == $cat['id']) selected @endif>{{$cat['name']}}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('category'){{$message}}@enderror<span>
            </div>
            <div class="col-12 mb-3">
                <label for="image" class="form-label">Новое изображение</label>
                <input class="form-control" type="file" name="image" id="image" accept="image/*">
                <span class="text-danger">@error('image'){{$message}}@enderror<span>
                <img class="w-50 my-3 rounded-3" src="{{asset(picUrl($news[0]['image']))}}" />
            </div>
            <div class="mb-3 col-lg-12 col-md-6">
                <label for="status" class="form-label">Статус</label>
                <br>
                <input type="checkbox" class="js-switch" @if($news[0]['status'] == 1)checked @endif />
                <input type="hidden" class="status" name="status" value="{{$news[0]['status']}}">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Сохранить</button>
                <a href="/news">
                    <button type="button" class="btn btn-outline-secondary">Отмена</button>
                </a>
            </div>
        </form>
    </div>
</div>  

@endsection
