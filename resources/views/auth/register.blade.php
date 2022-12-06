@extends('layouts.app')
@section('title','Register')

@section('content')
<div class="auth-content">
    <div class="card o-hidden">
        <div class="row">
            <div class="col-md-6 text-center "
                style="background-size: cover;background-image: url({{ url('backend/assets/images/photo-long-3.jpg') }})">
            </div>

            <div class="col-md-6">
                <div class="p-3">
                    <h1 class="mb-3 text-18">Sign Up</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group col-md-14">
                            <label for="employee_id">Nama Pegawai</label>
                            <select name="employee_id" id="employee_id" required
								class="form-control select-single form-control-rounded @error('employee_id') is-invalid @enderror">
								<option value="">-Select-</option>
								@foreach ($employees as $employee)
								<option value="{{ $employee->id }}">{{ $employee->name }}</option>
								@endforeach
							</select>
                            @error('employee_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" name="username"
                                class="form-control form-control-rounded @error('username') is-invalid @enderror"
                                type="text" value="{{ old('username') }}" required autocomplete="username">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email" name="email"
                                class="form-control form-control-rounded @error('email') is-invalid @enderror"
                                type="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password"
                                class="form-control form-control-rounded  @error('password') is-invalid @enderror"
                                type="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="repassword">Retype password</label>
                            <input id="repassword" class="form-control form-control-rounded" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="Role">Role Level</label>
                            <select name="role_id" id="" class="form-control select-single2 form-control-rounded  @error('role_id') is-invalid @enderror">
                                <option value="">--Pilih--</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->nama_rule }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Sign Up</button>
                    </form>
                    <hr>
                    <a class="btn btn-outline-google btn-block btn-icon-text btn-rounded" href="{{ route('login') }}">
                        <i class="i-Mail-with-At-Sign"></i> Sign in with Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
