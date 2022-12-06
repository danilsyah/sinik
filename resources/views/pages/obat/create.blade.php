@extends('layouts.admin')
@section('title','SINIK - Tindakan ')
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
					Obat
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
				<div class="card-title mb-3">Create Obat</div>
				<div class="form-group col-md-12">
					<hr>
				</div>
				<form action="{{ route('obats.store') }}" method="POST">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-8 mb-3">
							<label for="kode">Kode</label>
                            <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="Enter kode" required value="{{ old('kode') }}">
							@error('kode')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-8 mb-3">
							<label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Enter tindakan name" required value="{{ old('nama') }}">
							@error('nama')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
                        <div class="form-group col-md-8 mb-3">
							<label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Enter harga" required value="{{ old('harga') }}">
                            @error('harga')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
                        <div class="form-group col-md-8 mb-3">
							<label for="tgl_expire">Tgl Expire</label>
                            <input type="date" name="tgl_expire" class="form-control @error('tgl_expire') is-invalid @enderror" id="tgl_expire" placeholder="Enter tgl" required value="{{ old('tgl_expire') }}">
                            @error('tgl_expire')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group col-md-12">
							<hr>
						</div>
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{ route('obats.index') }}" class="btn btn-danger m-1">Cancel</a>
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
