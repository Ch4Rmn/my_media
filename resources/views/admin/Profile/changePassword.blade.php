@extends('admin.layouts.master')

@section('title','Change Password')

{{-- write different --}}


@section('content')


<div class="col-8 offset-3 mt-5">

    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">Change Password</legend>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
{{-- alert success with session start --}}
@if (Session::has('changePasswordSuccess'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
    {{Session::get('changePasswordSuccess')}}
    {{-- <strong>Update Success</strong> --}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if (Session::has('passUpdateFail'))
<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
    {{Session::get('passUpdateFail')}}
    {{-- <strong>Update Success</strong> --}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
{{-- alert success with session end--}}
              <form class="form-horizontal" method="POST" action="{{ route('admin#ChangePasswordPage')}}">
                @csrf

                <div class="form-group row">
                  <label for="adminOldPassword" class="col-sm-2 col-form-label">Old Password</label>
                  <div class="col-sm-10">
                    <input type="password" name='adminOldPassword' class="form-control" id="inputName" placeholder="OldPassword" value="{{ old('adminOldPassword')}}">
                                         @error('adminOldPassword')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror</div>



                </div>
                <div class="form-group row">
                  <label for="adminNewPassword" class="col-sm-2 col-form-label">new Password</label>
                  <div class="col-sm-10">
                    <input type="Password" name='adminNewPassword' class="form-control" id="newPassword" placeholder="newPassword" value="{{  old('adminNewPassword')}}">
                       @error('adminNewPassword')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                </div>


                <div class="form-group row">
                    <label for="adminConfirmPassword" class="col-sm-2 col-form-label">ConfirmPassword</label>
                    <div class="col-sm-10">
                      <input type="password" name='adminConfirmPassword' class="form-control" id="adminConfirmPassword" placeholder="adminConfirmPassword" value="{{  old('adminConfirmPassword')}}">
                                           @error('adminConfirmPassword')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror</div>

                  </div>



                <div class="form-group row">

                  <div class="offset-sm-3 col-sm-6">
                    {{-- <a href="">Change Password</a> --}}
                    <button type="submit" class="btn btn-dark shadow-sm">Change Update Password</button>
                  </div>
                </div>

                {{-- <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn bg-dark text-white">Submit</button>
                  </div>
                </div> --}}
              </form>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
