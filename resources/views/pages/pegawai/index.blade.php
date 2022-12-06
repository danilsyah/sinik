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
                    Master
                </li>
                <li class="breadcrumb-item active">
                    Pegawai
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="card-title mb-3">Pegawai List</div>
                <a href="{{ route('employees.create') }}" class="btn btn-primary btn-rounded mb-1"
                    style="width: 100%">+Add</a>
                <hr>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->jabatan }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                    @if (Auth::user()->role->nama_rule == 'ADMIN')
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-outline-success">
                                        Edit
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee->id )}}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger m-1 delete-confirm"
                                            data-name="({{ $employee->id }})-{{ $employee->name }}">Delete</button>
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
