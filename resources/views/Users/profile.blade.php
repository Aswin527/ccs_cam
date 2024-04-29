@extends('layouts.header')
@section('title','My Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-user"></i>
                    My Profile
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <h6>Name: {{ Auth::User()->firstname }} {{ Auth::User()->lastname }}</h6>
                            <h6>Email: {{ Auth::User()->email }}</h6>
                            <h6>Mobile: {{ Auth::User()->mobile }}</h6>
                            <h6>Role:
                                @if(Auth::User()->isAdmin)
                                    <span class="badge badge-danger">Admin</span>
                                @endif
                                @if(Auth::User()->isAuthor)
                                    <span class="badge badge-warning">Author</span>
                                @endif
                            </h6>
                        </div>
                        <div class="col-lg-8">
                            <form action="{{ url('/home/profile/update') }}" method="post">
                                @csrf
                                @if (count($errors)>0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group row">
                                    <label for="firstname" class="col-md-3 col-form-label text-md-right">{{ __('First Name*') }}</label>
                                    <div class="col-md-9">
                                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ Auth::User()->firstname }}" required autocomplete="firstname" autofocus>
                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-md-3 col-form-label text-md-right">{{ __('Last Name*') }}</label>
                                    <div class="col-md-9">
                                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ Auth::User()->lastname }}" required autocomplete="lastname" autofocus>
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-md-3 col-form-label text-md-right">{{ __('Mobile*') }}</label>
                                    <div class="col-md-9">
                                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ Auth::User()->mobile }}" required autocomplete="mobile" autofocus>
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-4">
                                        <button type="submit" class="btn btn-outline-primary">
                                            Edit Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#changepassword">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="changepasswordLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changepasswordLabel">Change my Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/home/profile/change-password') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="oldpassword" class="col-md-5 col-form-label text-md-right">{{ __('Old Password*') }}</label>
                            <div class="col-md-7">
                                <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('New Password*') }}</label>
                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection