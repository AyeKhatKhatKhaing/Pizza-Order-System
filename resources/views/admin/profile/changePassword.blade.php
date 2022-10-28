@extends('admin.layout.app')
@section('content')

<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">Change Password</legend>
                </div>
                <div class="card-body">

                    @if (Session::has('notMatchError'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{Session::get('notMatchError')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (Session::has('notSameError'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{Session::get('notSameError')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (Session::has('lengthError'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{Session::get('lengthError')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (Session::has('lengthSuccess'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{Session::get('lengthSuccess')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" method="POST" action="{{ route('admin#changePassword',Auth()->user()->id)}}">
                        @csrf
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="oldPassword" value="{{ old('oldPassword')}}" placeholder="">
                            @if($errors->has('oldPassword'))
                            <p class="text-danger">{{ $errors->first('oldPassword') }}</p>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="newPassword" value="{{ old('newPassword')}}" placeholder="">
                            @if($errors->has('newPassword'))
                            <p class="text-danger">{{ $errors->first('newPassword') }}</p>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label"> Confirm Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="confirmPassword" value="{{ old('confirmPassword')}}" placeholder="">
                            @if($errors->has('confirmPassword'))
                            <p class="text-danger">{{ $errors->first('confirmPassword') }}</p>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            {{-- <a href="">Change Password</a> --}}
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-danger text-white">Change</button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

@endsection
