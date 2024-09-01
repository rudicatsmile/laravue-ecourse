@extends('layouts.main')
@section('breadcrumb')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Permissions</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Permissions</h5>
                            @php
                                $no = 1;
                            @endphp
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th>Name</th>
                                        <th>Module</th>
                                        {{-- <th>Role</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->module }}</td>
                                            {{-- <td>{{ $row->roles }}</td>  --}}
                                            <td>
                                                <a href="{{ route('roles.edit', $row->id) }}">
                                                    <i class="bi bi-pencil-fill text-primary"></i>
                                                </a> |
                                                <a href="#"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure?'))
                            document.getElementById('delete-{{ $row->id }}').submit();">
                                                    <i class="bi bi-trash3-fill text-danger"></i>
                                                </a>
                                                <form id="delete-{{ $row->id }}"
                                                    action="{{ route('roles.destroy', $row->id) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>

                <div class='col-lg-5'>
                    <div class="card">
                        <div class="card-header">
                            Form Permission
                        </div>
                        <div class="card-body">
                            <form method="post"
                                action="{{ route('permissions.store') }}"
                                class="mt-1 row g-3">
                                @csrf
                                <div class="col-md-12 has-validation">
                                    <input id="validationCustom03" type="text" name="module" class="form-control" placeholder="Name Module"
                                        value="" required>
                                    @error('module')
                                    <div class="pt-2 invalid text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 has-validation">
                                    <input id="validationCustom03" type="text" name="name" class="form-control" placeholder="Name Permission"
                                        value="" required>
                                    @error('name')
                                    <div class="pt-2 invalid text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 has-validation">
                                    <select class='form-select select-multiple' name="role[]" id="" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('javascript')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
@endpush
