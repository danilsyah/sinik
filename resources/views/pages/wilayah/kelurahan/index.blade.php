@extends('layouts.admin')
@section('title','SINIK - Keluarahan/Desa')
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
                    Wilayah
                </li>
                <li class="breadcrumb-item active">
                    Keluarahan
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="card-title mb-3">Keluarahan List</div>
                <a href="{{ route('villages.create') }}" class="btn btn-primary btn-rounded mb-1"
                    style="width: 100%">+Add</a>
                <hr>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                {{-- <th>Kabupaten</th>
                                <th>Provinsi</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($villages as $village)
                            <tr>
                                <td>{{ $village->id }}</td>
                                <td>{{ $village->name }}</td>
                                <td>{{ $village->district->name }}</td>
                                {{-- <td>{{ $village->district->regency->name }}</td>
                                <td>{{ $village->district->regency->province->name }}</td> --}}
                                <td>
                                    @if (Auth::user()->role->nama_rule == 'ADMIN')
                                    <a href="{{ route('villages.edit', $village->id) }}" class="btn btn-outline-success">
                                        Edit
                                    </a>
                                    <form action="{{ route('villages.destroy', $village->id )}}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger m-1 delete-confirm"
                                            data-name="({{ $village->id }})-{{ $village->name }}">Delete</button>
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
