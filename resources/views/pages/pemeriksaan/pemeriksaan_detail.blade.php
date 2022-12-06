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
					Pemeriksaan
				</li>
				<li class="breadcrumb-item active">
					Tindakan
				</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-body">
				<div class="card-title mb-3">Tindakan Pemeriksaan - {{ $pemeriksaan->id }} {{ $pemeriksaan->pasien->nama }}</div>
				<div class="form-group col-md-12">
					<hr>
				</div>
				<form action="{{ route('pemeriksaan-tindakan', $pemeriksaan->id ) }}" method="POST">
					@csrf
                    <input type="hidden" name="pemeriksaan_id" value="{{ $pemeriksaan->id }}">
					<div class="form-row">
                        <div class="form-group col-md-8 mb-3">
                            <label for="obat_id">Obat</label>
                            <select name="obat_id" id="obat_id" class="form-control select-single form-control-rounded @error('obat_id') is-invalid @enderror">
                                <option value="">-Pilih-</option>
                                @foreach ($obats as $obat)
								<option value="{{ $obat->id }}">{{ $obat->nama }} - {{ $obat->harga }}</option>
								@endforeach
                            </select>
                            @error('obat_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

						<div class="form-group col-md-8 mb-3">
							<label for="tindakan_id">Tindakan</label>
							<select name="tindakan_id" id="tindakan_id"
								class="form-control select-single form-control-rounded @error('tindakan_id  ') is-invalid @enderror">
								<option value="">-Select-</option>
								@foreach ($tindakans as $tindakan)
								<option value="{{ $tindakan->id }}">{{ $tindakan->nama }} - {{ $tindakan->harga }}</option>
								@endforeach
							</select>
							@error('tindakan_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-12">
							<hr>
						</div>
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{ route('pemeriksaans.index') }}" class="btn btn-danger m-1">Cancel</a>
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
