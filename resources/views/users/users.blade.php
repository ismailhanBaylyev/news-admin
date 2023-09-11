@extends('sections/navbar')

@section('title', 'Пользователи')

@section('content')
<h1>Пользователи</h1>

<div class="demo-inline-spacing d-flex justify-content-end">
  <a href="/add-users">
    <button type="button" class="btn btn-icon btn-primary">
    <i class="ti ti-plus text-white"></i>
    </button>
  </a>
</div>

<div class="row">
@if(isset($users[0]))
  <div class="col-lg-12 card mt-3 py-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="filter-link"><a href="/users/id">ID</a></th>
          <th scope="col" class="filter-link"><a href="/users/email">Email</a></th>
          <th scope="col" class="filter-link"><a href="/users/updated_at">Дата изменения</a></th>
          <th scope="col" class="filter-link"><a href="/users/created_at">Дата создания</a></th>
          <th scope="col" class="text-center">Действия</th>
        </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
        <tr >
          <td>{{ $user['id'] }}</td>
          <td>{{ $user['email'] }}</td>
          <td>{{ $user['updated_at'] }}</td>
          <td>{{ $user['created_at'] }}</td>
          <td class="text-center">
            <a href="/edit-users/{{$user['id']}}">
              <i class="ti ti-edit text-black h2"></i>
            </a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  @else
  <div class="text-center"><h2>Нет данных</h2></div>
  @endif

  <div class="d-flex justify-content-center mt-3">
    {{$users->links()}}
  </div>

</div>
@endsection