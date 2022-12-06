@extends('layouts.admin')
@section('title','SINIK - Pemeriksaan ')
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
					Pemeriksaan
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
				<div class="card-title mb-3">Create Pemeriksaan</div>
				<div class="form-group col-md-12">
					<hr>
				</div>
				<form action="{{ route('pemeriksaans.store') }}" method="POST">
					@csrf
					<div class="form-row">
                        <div class="form-group col-md-8 mb-3">
							<label for="pasien_id">Pasien</label>
                            <select name="pasien_id" id="pasien_id" required
								class="form-control select-single form-control-rounded @error('pasien_id') is-invalid @enderror">
								<option value="">-Select-</option>
								@foreach ($pasiens as $pasien)
								<option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
								@endforeach
							</select>
                            @error('pasien_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
                        <div class="form-group col-md-8 mb-3">
							<label for="employee_id">Pemeriksa</label>
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

                        <div class="form-group col-md-8 mb-3">
							<label for="catatan">Catatan</label>
                            <input type="text" name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan" placeholder="Enter catatan" required value="{{ old('catatan') }}">
                            @error('catatan')
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
