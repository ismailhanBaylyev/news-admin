@extends('sections/navbar')

@section('title', 'Категории')

@section('content')
@section('include_script')
<script>
  const myCategory = document.getElementById('listCategory');
  new Sortable(myCategory, {
      animation: 350,
      chosenClass: 'sortable-chosen',
      dragClass: 'sortable-drag',
      onEnd: function(evt) {
          let id = $(evt.item).attr('data-my');
          $.ajax({
              url: '/sort-category',
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
<h1>Категории</h1>

<div class="demo-inline-spacing d-flex justify-content-end">
  <a href="/add-category">
    <button type="button" class="btn btn-icon btn-primary">
    <i class="ti ti-plus text-white"></i>
    </button>
  </a>
</div>

  @if(isset($category[0]))
    <div class="d-flex my-3">
      <div class="col-1 fw-bolder filter-link" data-name="id"><a href="/category/id">ID</a></div>
      <div class="col-3 fw-bolder filter-link"><a href="/category/name">Название</a></div>
      <div class="col-3 fw-bolder text-center filter-link"><a href="/category/updated_at">Дата изменения</a></div>
      <div class="col-3 fw-bolder text-center filter-link"><a href="/category/created_at">Дата создания</a></div>
      <div class="col-2 fw-bolder text-center filter-link">Действия</div>
    </div>
    <div class="row list-group" id="listCategory" >
      @foreach($category as $cat)
      <div class="list-group-item myCategoryItem @if($cat['status'] != 0) bg-black text-white @endif" data-my="{{ $cat['id'] }}">
        <div class="row">
          <div class="col-1">{{ $cat['id'] }}</div>
          <div class="col-3">{{ $cat['name'] }}</div>
          <div class="col-3 text-center">{{ $cat['updated_at'] }}</div>
          <div class="col-3 text-center">{{ $cat['created_at'] }}</div>
          <div class="col-2 text-center">
            <a href="/edit-category/{{$cat['id']}}">
              <i class="ti ti-edit @if($cat['status'] != 0) text-white @else text-black @endif  h2"></i>
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
    {{$category->links()}}
  </div>

</div>
@endsection