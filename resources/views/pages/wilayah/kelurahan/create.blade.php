@extends('layouts.admin')
@section('title','SINIK - Kecamatan ')
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
					Kelurahan
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
				<div class="card-title mb-3">Create Keluarhan</div>
				<div class="form-group col-md-12">
					<hr>
				</div>
				<form action="{{ route('villages.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="id">ID</label>
                            <input type="text" name="id" class="form-control @error('id') is-invalid @enderror" id="id" placeholder="Enter district id" required value="{{ old('id') }}">
                            @error('id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
						<div class="form-group col-md-8 mb-3">
							<label for="district_id">Kecamatan</label>
							<select name="district_id" id="district_id" required
								class="form-control select-single form-control-rounded @error('district_id') is-invalid @enderror">
								<option value="">-Select-</option>
								@foreach ($districts as $district)
								<option value="{{ $district->id }}">{{ $district->name }}</option>
								@endforeach
							</select>
							@error('district_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-8 mb-3">
							<label for="name">Nama Keluarahan</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Kecamatan name" required value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group col-md-12">
							<hr>
						</div>
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{ route('villages.index') }}" class="btn btn-danger m-1">Cancel</a>
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
