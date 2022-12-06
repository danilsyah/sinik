@extends('layouts.admin')
@section('title','SINIK - Obat')
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
                    Master
                </li>
                <li class="breadcrumb-item active">
                    Obat
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="card-title mb-3">Obat List</div>
                <a href="{{ route('obats.create') }}" class="btn btn-primary btn-rounded mb-1"
                    style="width: 100%">+Add</a>
                <hr>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Tgl Expire</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obats as $obat)
                            <tr>
                                <td>{{ $obat->id }}</td>
                                <td>{{ $obat->kode }}</td>
                                <td>{{ $obat->nama }}</td>
                                <td>{{ $obat->harga }}</td>
                                <td>{{ $obat->tgl_expire }}</td>
                                <td>
                                    @if (Auth::user()->role->nama_rule == 'ADMIN')
                                    <a href="{{ route('obats.edit', $obat->id) }}" class="btn btn-outline-success">
                                        Edit
                                    </a>
                                    <form action="{{ route('obats.destroy', $obat->id )}}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger m-1 delete-confirm"
                                            data-name="({{ $obat->kode }})-{{ $obat->nama }}">Delete</button>
                                    </form>
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
