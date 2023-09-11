@extends('sections/navbar')

@section('title', 'Статьи')

@section('content')
@section('include_script')
<script>
  const myNews = document.getElementById('listNewss');
  new Sortable(myNews, {
      animation: 350,
      chosenClass: 'sortable-chosen',
      dragClass: 'sortable-drag',
      onEnd: function(evt) {
          let id = $(evt.item).attr('data-my');
          $.ajax({
              url: '/sort-news',
              method: 'post',
              dataType: 'html',
              data: {'id': id, 'sort': evt.newIndex},
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
          });
    }
  });
</script>
@endsection
<h1>Статьи</h1>

<div class="demo-inline-spacing d-flex justify-content-end">
  <a href="/add-news">
    <button type="button" class="btn btn-icon btn-primary">
    <i class="ti ti-plus text-white"></i>
    </button>
  </a>
</div>

  @if(isset($news[0]))
    <div class="d-flex my-3">
      <div class="col-1 fw-bolder filter-link" data-name="id"><a href="/news/id">ID</a></div>
      <div class="col-4 fw-bolder filter-link"><a href="/news/name">Название</a></div>
      <div class="col-1 fw-bolder filter-link"><a href="/news/slug">Слаг</a></div>
      <div class="col-2 fw-bolder text-center filter-link"><a href="/news/updated_at">Дата изменения</a></div>
      <div class="col-2 fw-bolder text-center filter-link"><a href="/news/created_at">Дата создания</a></div>
      <div class="col-2 fw-bolder text-center filter-link">Действия</div>
    </div>
    <div class="row list-group" id="listNewss" >
      @foreach($news as $n)
      <div class="list-group-item mynewsItem @if($n['status'] != 0) bg-black text-white @endif" data-my="{{ $n['id'] }}">
        <div class="row">
          <div class="col-1">{{ $n['id'] }}</div>
          <div class="col-4">{{ $n['name'] }}</div>
          <div class="col-1">{{ $n['slug'] }}</div>
          <div class="col-2 text-center">{{ $n['updated_at'] }}</div>
          <div class="col-2 text-center">{{ $n['created_at'] }}</div>
          <div class="col-2 text-center">
            <a href="/edit-news/{{$n['id']}}">
              <i class="ti ti-edit @if($n['status'] != 0) text-white @else text-black @endif  h2"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  @else
  <div class="text-center"><h2>Нет данных</h2></div>
  @endif
  

  <div class="d-flex justify-content-center mt-3">
    {{$news->links()}}
  </div>

</div>

@endsection