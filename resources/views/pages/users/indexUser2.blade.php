@extends('layouts.main')
@section('breadcrumb')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">User</a></li>
            <li class="breadcrumb-item active">List</li>
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
                                <form method='GET' action="{{ route('users.index') }}">
                                    <div class="max-w-sm space-y-3">
                                          <input value="{{ request('search') }}" name="search" type="text" class="form-control" placeholder="Search" focus>
                                    </div>
                                    </form>
                            </div>
                            <a href="{{ route('users.create') }}">
                                <button type="button" class="btn btn-outline-primary">Add User</button>
                            </a>
                        </div>
                        <div class="card-body">
                            @php
                                $no = 1;
                            @endphp
                            <!-- Table with stripped rows -->

                            <form action="{{ route('users.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')

                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-danger pull-right">Delete Checklist</button>
                                    </div>
                                </div>
                            </div>

                            <table class="table align-middle">

                                <thead >
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th> No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $row)
                                        <tr>
                                            <td class='align-middle'><input type="checkbox" name="user_ids[]" value="{{ $row->id }}"></td>
                                            <td class='align-middle'>{{ $no++ }}</td>
                                            <td>
                                                <img class="rounded-circle" width="50px" height="50px" src="{{ asset('storage/images/'.$row->photo_profile) }}" alt="Image Description">
                                                {{ $row->name }}
                                            </td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                @foreach ($row->roles as $role)
                                                    {{ $role->name}}@if(!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $row->id) }}">
                                                    <i class="bi bi-pencil-fill text-primary"></i>
                                                </a> |
                                                <a href="#"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure?'))
                                                    document.getElementById('delete-{{ $row->id }}').submit();">
                                                    <i class="bi bi-trash3-fill text-danger"></i>
                                                </a>
                                                <form id="delete-{{ $row->id }}"
                                                    action="{{ route('users.destroy', $row->id) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>


                            </form>
                            <!-- End Table with stripped rows -->
                            <div>
                                {{ $users->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('javascript')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    document.getElementById('selectAll').addEventListener('change', function() {
        var checkboxes = document.getElementsByName('user_ids[]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }
    });
</script>
@endpush


