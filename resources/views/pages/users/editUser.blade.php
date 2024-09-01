@extends('layouts.main')
@section('breadcrumb')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('users.index') }}">
                                <button type="button" class="btn btn-outline-primary">Back</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <!-- Multi Columns Form -->
                            <form class="mt-2 row g-3" method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" name="password">
                                    <span>Biarkan kosong, jika tidak ingin mengganti password</span>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <textarea class="form-control" id="inputAddress" name="address">{{ $user->address }}</textarea>
                                </div>
                                <div class="gap-4 col-12 d-flex">
                                    <div class='d-flex flex-column'>
                                        <label for="inputFile" class="form-label">Photo Profile</label>
                                        <img class="rounded-circle" width="100px" height="100px" src="{{ asset('storage/images/'.$user->photo_profile) }}" alt="Image Description">
                                    </div>
                                    <div class="align-self-center">
                                        <input type="file" class="form-control" id="file" name="photo">
                                    </div>

                                </div>

                                <div class="gap-4 col-12 d-flex">
                                    <select class='form-select select-multiple' name="role[]" id="" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
