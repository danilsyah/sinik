@extends('layouts.admin')
@section('title','SINIK - Kabupaten ')
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
					Kabupaten
				</li>
				<li class="breadcrumb-item active">
					Edit
				</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-body">
				<div class="card-title mb-3">Edit Kabupaten</div>
				<div class="form-group col-md-12">
					<hr>
				</div>
				<form action="{{ route('regencies.update', $regency->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
                    @method('put')
					<div class="form-row">
                        <div class="form-group col-md-8 mb-3">
                            <label for="id">ID</label>
                            <input type="text" name="id" class="form-control @error('id') is-invalid @enderror" id="id" placeholder="Enter regency id" required value="{{ $regency->id }}">
                            @error('id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
						<div class="form-group col-md-8 mb-3">
							<label for="province_id">Province</label>
							<select name="province_id" id="province_id" required
								class="form-control select-single form-control-rounded @error('province_id') is-invalid @enderror">
								<option value="{{ $regency->province_id }}">{{ $regency->province->name }}</option>
								@foreach ($provinces as $province)
								<option value="{{ $province->id }}">{{ $province->name }}</option>
								@endforeach
							</select>
							@error('province_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-8 mb-3">
							<label for="name">Nama Kabupaten/Kota</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter regency name" required value="{{ $regency->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group col-md-12">
							<hr>
						</div>
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{ route('regencies.index') }}" class="btn btn-danger m-1">Cancel</a>
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
