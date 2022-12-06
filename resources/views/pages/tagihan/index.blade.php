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
                    Tagihan
                </li>
                <li class="breadcrumb-item active">
                    Pemeriksaan
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="card-title mb-3">Tagihan </div>
                <hr>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pasien</th>
                                <th>Pemeriksa</th>
                                <th>Obat</th>
                                <th>Harga Obat</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemeriksaanDetails as $pemeriksaanDetail)
                            <tr>
                                <td>{{ $pemeriksaanDetail->id }}</td>
                                <td>{{ $pemeriksaanDetail->pemeriksaan->pasien->nama }}</td>
                                <td>{{ $pemeriksaanDetail->pemeriksaan->employee->name }}</td>
                                <td>{{ $pemeriksaanDetail->obat->nama}}</td>
                                <td>{{ $pemeriksaanDetail->obat->harga}}</td>
                                <td>{{ $pemeriksaanDetail->tindakan_id}}</td>
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
