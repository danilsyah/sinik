@extends('layouts.admin')
@section('title','SINIK - Pegawai ')
@section('content')
<div class="separator-breadcrumb border-top"></div>
<div class="row mb-4">
	<div class="col-md-12">
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					Home
				</li>
				<li class="breadcrumb-item">
					Pegawai
				</li>
				<li class="breadcrumb-item active">
					Create
				</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-body">
				<div class="card-title mb-3">Create Pegawai</div>
				<div class="form-group col-md-12">
					<hr>
				</div>
				<form action="{{ route('employees.store') }}" method="POST">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-8 mb-3">
							<label for="name">Nama</label>
                            <input type="text" name="name" class="form-control @error('id') is-invalid @enderror" id="id" placeholder="Enter karyawan name" required value="{{ old('name') }}">
							@error('name')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-8 mb-3">
							<label for="address">Alamat</label>
                            <select name="address" id="address" required
								class="form-control select-single form-control-rounded @error('address') is-invalid @enderror">
								<option value="">-Select-</option>
								@foreach ($villages as $village)
								<option value="{{ $village->name }}">{{ $village->name }}</option>
								@endforeach
							</select>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group col-md-8 mb-3">
							<label for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" required
								class="form-control select-single form-control-rounded @error('jabatan') is-invalid @enderror">
								<option value="">-Select-</option>
								<option value="apoteker">APOTEKER</option>
								<option value="dokter">DOKTER</option>
								<option value="administrasi">ADMINISTRASI</option>
								<option value="lab">LAB</option>
							</select>
                            @error('jabatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
                        <div class="form-group col-md-8 mb-3">
							<label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone number" required value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group col-md-12">
							<hr>
						</div>
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{ route('employees.index') }}" class="btn btn-danger m-1">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@push('select2-autocompelete')
<script>
	$(document).ready(function () {
        $('.select-single').select2();
    });
</script>
@endpush
