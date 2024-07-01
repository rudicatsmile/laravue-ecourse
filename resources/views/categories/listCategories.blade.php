@extends('layouts.main')

@section('breadcrumbs')
    <h1>{{ $title }}</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
    </nav>
@endsection
@section('content')
    <div class='col-md-12'>

        <div class="card">
            <div class="card-header">
                <h1>Table Category</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($categories as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->slug }}</td>
                                <td>
                                    <a href="{{ route('categories.show',$row->id) }}"> Show </a>
                                    | <a href="{{ route('categories.edit',$row->id) }}"> Edit </a>

                                    <form
                                        method='post'
                                        onsubmit="return confirm('Are you sure?')"
                                        action="{{ route('categories.destroy', $row->id) }}">

                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        <a href="{{ route('categories.create') }}">Add (go to cretae)</a> |
        <a href="{{ route('categories.edit',1) }}">Edit </a>

        <div>


        </div>

    </div>
@endsection

