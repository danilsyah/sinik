@extends('layouts.admin')
@section('title','SINIK - Kecamatan')
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
                    Kecamatan
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="card-title mb-3">Kecamatan List</div>
                <a href="{{ route('districts.create') }}" class="btn btn-primary btn-rounded mb-1"
                    style="width: 100%">+Add</a>
                <hr>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kecamatan</th>
                                <th>ID Kabupaten</th>
                                <th>Name Kabupaten</th>
                                <th>Nama Provinsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($districts as $district)
                            <tr>
                                <td>{{ $district->id }}</td>
                                <td>{{ $district->name }}</td>
                                <td>{{ $district->regency_id }}</td>
                                <td>{{ $district->regency->name }}</td>
                                <td>{{ $district->regency->province->name }}</td>
                                <td>
                                    @if (Auth::user()->role_id == '1')
                                    <a href="{{ route('districts.edit', $district->id) }}" class="btn btn-outline-success">
                                        Edit
                                    </a>
                                    <form action="{{ route('districts.destroy', $district->id )}}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger m-1 delete-confirm"
                                            data-name="({{ $district->id }})-{{ $district->name }}">Delete</button>
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
