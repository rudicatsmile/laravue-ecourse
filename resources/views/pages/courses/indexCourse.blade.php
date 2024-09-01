@extends('layouts.main')
@section('breadcrumb')
<nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Courses</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">

      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class='col-md-4'>
                        <form method='GET' action="{{ route('courses.index') }}">
                            <div class="max-w-sm space-y-3">
                                  <input value="{{ request('search') }}" name="search" type="text" class="form-control" placeholder="Search" focus>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('courses.create') }}"><button class='btn btn-primary'>New Course</button></a>

                </div>
              <div class="card-body">
                @php
                          $no = 1;
                      @endphp
                <!-- Table with stripped rows -->
                <table class="table">
                  <thead>
                    <tr>
                      <th> No</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($courses as $index => $row )
                      <tr>
                          <td>{{ $index + $courses->firstItem() }}</td>
                          <td>{{ $row->title }}</td>
                          <td>{{ $row->category->name }}</td>
                          <td>{{ ucwords($row->type) }}</td>
                          <td>
                            <a href="{{ route('courses.edit', $row->id) }}">
                                <i class="bi bi-pencil-fill text-primary"></i>
                            </a> |
                            <a href="#"
                                onclick="event.preventDefault(); if(confirm('Are you sure?'))
        document.getElementById('delete-{{ $row->id }}').submit();">
                                <i class="bi bi-trash3-fill text-danger"></i>
                            </a>
                            <form id="delete-{{ $row->id }}"
                                action="{{ route('courses.destroy', $row->id) }}" method="POST"
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
                <div>
                    {{ $courses->links('pagination::bootstrap-5') }}
                </div>
              </div>
            </div>
            </div>

      </div>

    </div>
</div>
@endsection
