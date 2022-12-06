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
					Pasien
				</li>
				<li class="breadcrumb-item active">
					Pendaftaran
				</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-body">
				<div class="card-title mb-3">Pendaftaran Pasien</div>
				<div class="form-group col-md-12">
					<hr>
				</div>
				<form action="{{ route('pasiens.store') }}" method="POST">
					@csrf
					<div class="form-row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Enter regency id" required value="{{ old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="jenkel">Jenis Kelamin</label>
                            <select name="jenkel" id="jenkel" required class="form-control form-control-rounded @error('jenkel') is-invalid @enderror">
                                <option value="pria">PRIA</option>
                                <option value="wanita">WANITA</option>
                            </select>
                            @error('jenkel')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="gol_darah">Golongan Darah</label>
                            <select name="gol_darah" id="gol_darah" required class="form-control form-control-rounded @error('gol_darah') is-invalid @enderror">
                                <option value="">-Pilih-</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                            @error('gol_darah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="umur">Umur</label>
                            <input type="number" name="umur" class="form-control @error('umur') is-invalid @enderror" id="nama" placeholder="Enter regency id" required value="{{ old('umur') }}">
                            @error('umur')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
						<div class="form-group col-md-8 mb-3">
							<label for="village_id">Alamat</label>
							<select name="village_id" id="village_id" required
								class="form-control select-single form-control-rounded @error('village_id') is-invalid @enderror">
								<option value="">-Select-</option>
								@foreach ($villages as $village)
								<option value="{{ $village->id }}">{{ $village->name }}</option>
								@endforeach
							</select>
							@error('village_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-8 mb-3">
							<label for="alamat_detail">Alamat Detail</label>
                            <input type="text" name="alamat_detail" class="form-control @error('alamat_detail') is-invalid @enderror" id="alamat_detail" placeholder="Enter alamat detail" required value="{{ old('alamat_detail') }}">
                            @error('alamat_detail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group col-md-12">
							<hr>
						</div>
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{ route('pasiens.index') }}" class="btn btn-danger m-1">Cancel</a>
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
