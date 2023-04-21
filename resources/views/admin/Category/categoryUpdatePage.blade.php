@extends('admin.layouts.master')

@section('title','CategoryUpdatePage')
{{-- write different --}}


@section('content')


{{-- <div class="col-4">

     <div class="card">
        <div class="card-body">
             <form action="{{ route('admin#categoryCreate')}}" method="POST">
        @csrf
                  <label for="categoryName" >Category Name</label>
                  <div class="form-group">
                    <input type="text" name='categoryName' class="form-control" id="inputName" placeholder="Name" value="">
                                         @error('categoryName')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror</div>

                  <label for="categoryDescription">Category description</label>
                  <div class="form-group">
                    <input type="text" name='categoryDescription' class="form-control" id="inputName" placeholder="Name" value="">
                                         @error('categoryDescription')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror</div></div>
                  </form>

</div> --}}


<div class="col-9 mt-3">
    <div class="card">

        @if (Session::has('complete'))
<div class="alert alert-success alert-dismissible fade show shadow-sm m-3" role="alert">
    {{Session::get('complete')}}
    {{-- <strong>Update Success</strong> --}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
{{-- alert success with session end--}}
{{-- Delete --}}
        @if (Session::has('deleteCategory'))
<div class="alert alert-danger alert-dismissible fade show shadow-sm m-3" role="alert">
Category Deleted!
    {{-- <strong>Update Success</strong> --}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
{{-- alert success with session end--}}
      <div class="card-header">
        <h2 class="card-title" style="font-weight: bold">Categories <span class="text-success">Edit</span></h2>
        {{-- <button class="btn btn-danger">Back</button> --}}
        {{-- <h2 class="card-title" style="font-weight: bold">Categories-{{count($category)}}</h2> --}}
        <div class="card-tools">

              <form action="{{ route('admin#Search')}}" method="POST">
                    @csrf

          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="adminSearch" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
                </form>

            </div>

          </div>
        </div>
      </div>
      <!-- /.card-header -->
      {{-- Show Data --}}
      <div class="card-body table-responsive p-0">

        <table class="table table-hover text-nowrap text-center">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Category Title</th>
              <th>Category Description</th>

              <th></th>
            </tr>
          </thead>
          <tbody>
          @foreach ($category as $item)
                <tr>

              <td>{{$item->category_id}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->description}}</td>

              <td>
                       <a href="{{route('category#EditPage',$item->category_id)}}">
                <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                {{-- delete --}}
<a href="{{ route('admin#categoryDelete',$item->category_id)}}">
                <button class="btn btn-sm bg-danger text-white" disabled><i class="fas fa-trash-alt"></i></button>
</a>
            </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->

    </div>
    <a href="{{route('admin#category')}}">
        <button class="btn btn-dark col-4" ><i class="fas fa-arrow-left"></i>  Back to Create</button>
    </a>


    <!-- /.card -->
  </div>


<div class="col-3 mt-3">
    <div class="card">
      <div class="card-body">

        {{-- Create form --}}
<form action="{{route('category#Edit',$item->category_id)}}" method="POST">
    @csrf
        <div class="card-tools">


          {{-- <div class="input-group input-group-sm" style="width: 150px;"> --}}
            {{-- <label for="">Category id</label>
            <input type="text" name="categoryId" class="form-control" placeholder="Category Id">
                                @error('categoryId')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror --}}
            <h3>ID -{{$editData->category_id}} <span class="text-success">edit</span></h3>
            <label for="">Category Name</label>
            <input type="text" name="editName" class="form-control" placeholder="Category Name" value="{{ $editData->title}}">
                                @error('editName')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror

             <label for="">Category Description</label>
             <textarea name="editDescription" id="" cols="30" rows="10" value="" placeholder="Category Description" class='form-control'>{{ $editData->description}}</textarea>
            {{-- <div class="input-group-append"> --}}
`
                                @error('editDescription')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror

            </div>


                  <input type="submit" value="Update" class="btn btn-success shadow mt-3 float-right">


          </div>
        </div>
        </form>
      </div>
      <!-- /.card-header -->

      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection
