@extends('layouts.main')

@section('breadcrumbs')
    <h1>{{ $title }}</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ol>
    </nav>
@endsection
@section('content')
    <div class='col-md-12'>

        <div class="card">
            <div class="card-header">
                <h1>Table User</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($users as $index => $row)
                            <tr>
                                <td>{{ $index + $users->firstItem() }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <a href="{{ route('users.show',$row->id) }}"> Show </a>
                                    | <a href="{{ route('users.edit',$row->id) }}"> Edit </a>

                                    <form
                                        method='post'
                                        onsubmit="return confirm('Are you sure?')"
                                        action="{{ route('users.destroy', $row->id) }}">

                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <div>


        </div>

    </div>
@endsection

