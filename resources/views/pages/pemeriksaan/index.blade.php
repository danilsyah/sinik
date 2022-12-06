@extends('layouts.admin')
@section('title','SINIK - Pegawai')
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
                    Pendaftaran
                </li>
                <li class="breadcrumb-item active">
                    Pasien
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="card-title mb-3">Pasien List</div>
                <a href="{{ route('pemeriksaans.create') }}" class="btn btn-primary btn-rounded mb-1"
                    style="width: 100%">+Add</a>
                <hr>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pasien</th>
                                <th>Jenkel</th>
                                <th>Gol Darah</th>
                                <th>Umur</th>
                                <th>Pemeriksa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemeriksaans as $pemerisaan)
                            <tr>
                                <td>{{ $pemerisaan->id }}</td>
                                <td>{{ $pemerisaan->pasien->nama }}</td>
                                <td>{{ $pemerisaan->pasien->jenkel }}</td>
                                <td>{{ $pemerisaan->pasien->gol_darah }}</td>
                                <td>{{ $pemerisaan->pasien->umur }}</td>
                                <td>{{ $pemerisaan->employee->name }}</td>
                                <td>
                                    @if (Auth::user()->role->nama_rule == 'ADMIN')
                                    {{-- <a href="{{ route('pemeriksaans.edit', $pemerisaan->id) }}" class="btn btn-outline-success">
                                        Edit
                                    </a> --}}
                                    {{-- <form action="{{ route('pemeriksaans.destroy', $pemerisaan->id )}}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger m-1 delete-confirm"
                                            data-name="({{ $pemerisaan->id }})-{{ $pemerisaan->pasien->nama }}">Delete</button>
                                    </form> --}}
                                    <a href="{{ route('pemeriksaans.show', $pemerisaan->id) }}" class="btn btn-outline-success">
                                        Tindakan
                                    </a>
                                    <a href="{{ route('pemeriksaan-cekTagihan', $pemerisaan->id) }}" class="btn btn-outline-info">Cek Tagihan</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('confirm-delete')
<script>
    $('.delete-confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete ${name}?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
@endpush
