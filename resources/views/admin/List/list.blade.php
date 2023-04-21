@extends('admin.layouts.master')

@section('title','List')
{{-- write different --}}


@section('content')

<div class="col-12 mt-3">
    @if (Session::has('delete'))
<div class="alert alert-danger alert-dismissible fade show shadow-sm mt-3" role="alert">
    {{Session::get('delete')}}
    {{-- <strong>Update Success</strong> --}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List</h3>

        <div class="card-tools">
{{-- Search start--}}
          <form action="{{ route('admin#listSearch')}}" method='POST'>
            @csrf
            <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="adminSearchKey" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
{{-- start end --}}
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Gender</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($userData as $user)
                        <tr>
              <td>{{ $user->id}}</td>
              <td>{{ $user->name}}</td>
              <td>{{ $user->email}}</td>
              <td>{{ $user->phone}}</td>
              <td>{{ $user->address}}</td>
              <td>{{ $user->gender}}</td>
              <td>
                <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>

                {{-- delete only other acc , cant delete auth account start --}}
               {{-- @if (auth()->user()->id != $user->id)
                @if (count($userData) == 1)
                    <a href="#">
              <button  class="btn btn-sm bg-danger text-white" disabled><i class="fas fa-trash-alt"></i></button></a>
                @else
                    <a href="{{ route('admin#deleteList',$user->id) }}">
              <button  class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                @endif --}}

                @if (auth()->user()->id != $user->id || count($userData) == 1)
        <a href="{{ route('admin#deleteList',$user->id) }}">
              <button  class="btn btn-sm bg-danger text-white" ><i class="fas fa-trash-alt"></i></button></a>
                @else
        <a href="#">
              <button  class="btn btn-sm bg-danger text-white" disabled><i class="fas fa-trash-alt"></i></button></a>
                @endif

                {{-- delete only other acc , cant delete auth account end --}}


              </td>
            </tr>

            @endforeach

          </tbody>
        </table>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
      {{ $userData->links() }}

  </div>

@endsection
