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
                            <form class="mt-2 row g-3" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="inputName" name="name"> @error('name')
                                    <div class="pt-2 invalid text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email">
                                    @error('email')
                                    <div class="pt-2 invalid text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" name="password">
                                    @error('password')
                                    <div class="pt-2 invalid text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <textarea class="form-control" id="inputAddress"
                                        placeholder="Apartment, studio, or floor" name="address"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="inputFile" class="form-label">Photo Profile</label>
                                    <input type="file" class="form-control" id="file" name="photo">
                                    @error('photo')
                                    <div class="pt-2 invalid text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
