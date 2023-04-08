@extends('admin.layouts.master')

@section('title','Profile')

{{-- write different --}}


@section('content')


<div class="col-8 offset-3 mt-5">

    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-4">
          <legend class="text-center">Profile</legend>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
{{-- alert success with session start --}}
@if (Session::has('updateSuccess'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
    {{Session::get('updateSuccess')}}
    {{-- <strong>Update Success</strong> --}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
{{-- alert success with session end--}}
              <form class="form-horizontal" method="POST" action="{{ route('admin#update')}}">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label">Name</label>
                  <div class="col-sm-8">
                    <input type="text" name='adminName' class="form-control" id="inputName" placeholder="Name" value="{{$userData->name}}">
                                         @error('adminName')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror</div>
                  {{-- @error('adminName')
                            {{$message}}
                  @enderror --}}


                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name='adminEmail' class="form-control" id="inputEmail" placeholder="Email" value="{{$userData->email}}">
                       @error('adminEmail')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                </div>


                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                    <div class="col-sm-8">
                      <input type="phone" name='adminPhone' class="form-control" id="inputEmail" placeholder="Phone" value="{{$userData->phone}}">
                                           @error('adminPhone')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror</div>

                  </div>

                  <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                     <textarea  name='adminAddress' class="form-control" id="" cols="30" rows="8" placeholder="address" >{{ $userData->address}}</textarea>
                                           @error('adminAddress')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                  </div>

                  <div class="form-group row">
                    <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                        <select name='adminGender' id="" class="form-control">
                                @if ($userData->gender == 'male')
                                <option value="Select your gender">Select your gender</option>
                                <option value="male" selected >male</option>
                                <option value="female">female</option>
                                @elseif ($userData->gender == 'female')
                                <option value="Select your gender">Select your gender</option>
                                <option value="male">male</option>
                                <option value="female" selected >female</option>
                                @else
                                <option value="Select your gender" selected >Select your gender</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                                @endif
                        </select>
                      {{-- <input type="email" class="form-control" id="inputEmail" placeholder="Email" --}}
                                             @error('adminGender')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>

                <div class="form-group row">
                  <div class="offset-sm-4 col-sm-8">
                    <a href="{{ route('admin#directChangePasswordPage')}}">Change Password</a>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn bg-dark text-white">Submit</button>
                  </div>
                </div>
              </form>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
