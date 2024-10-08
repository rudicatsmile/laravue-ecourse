@extends('layouts.main')
@section('breadcrumb')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>Add category.</p>
                            @php
                                $no = 1;
                            @endphp
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->slug }}</td>
                                            <td>
                                                <a href="{{ route('categories.index') }}?edit={{ $row->slug }}">
                                                    <i class="bi bi-pencil-fill text-primary"></i>
                                                </a> |
                                                <a href="#"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure?'))
                            document.getElementById('delete-{{ $row->id }}').submit();">
                                                    <i class="bi bi-trash3-fill text-danger"></i>
                                                </a>
                                                <form id="delete-{{ $row->id }}"
                                                    action="{{ route('categories.destroy', $row->id) }}" method="POST"
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

                @can('category')
                    <div class='col-lg-4'>
                        <div class="card">
                            <div class="card-header">
                                Form Category
                            </div>
                            <div class="card-body">
                                <form method="post"
                                    action="{{ $edit ? route('categories.update', $edit->id) : route('categories.store') }}"
                                    class="mt-1 row g-3">
                                    @if ($edit)
                                        @method('PUT')
                                    @endif
                                    @csrf
                                    <div class="col-md-12 has-validation">
                                        <input id="validationCustom03" type="text" name="name" class="form-control" placeholder="Your Name"
                                            value="{{ $edit->name ?? '' }}" required>
                                        @error('name')
                                        <div class="pt-2 invalid text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                @endcan


            </div>

        </div>
    </div>
@endsection
