@extends('layouts.admin')
@section('title','SINIK - Provinces')
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
                    Province
                </li>
                <li class="breadcrumb-item active">
                    Edit
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Edit Province - {{ $province->name }}</div>
                <form action="{{ route('provinces.update', $province->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="name">ID</label>
                            <input type="text" name="id" class="form-control form-control-rounded @error('id') is-invalid @enderror" id="id" placeholder="Enter province id" required value="{{ $province->id }}">
                            @error('id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control form-control-rounded @error('name') is-invalid @enderror" id="name" placeholder="Enter category name" required value="{{ $province->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



