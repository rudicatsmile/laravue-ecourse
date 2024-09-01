@extends('layouts.main')
@section('breadcrumb')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Course</a></li>
            <li class="breadcrumb-item active">Form</li>
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
                            <a href="{{ route('courses.index') }}">
                                <button type="button" class="btn btn-outline-primary">Back</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <!-- Multi Columns Form -->
                            <form class="mt-2 row g-3" method="post" action="{{ route('courses.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4">
                                    <label for="inputCategory" class="form-label">Category</label>
                                    <select name="category" class="form-select">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label for="inputTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="inputTitle" name="title">
                                    @error('title')
                                        <div class="pt-2 invalid text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-4 row">
                                    <div class="col-md-4">
                                        <label for="inputEmail" class="form-label">Type</label>
                                        <div class="gap-4 d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type"
                                                    id="gridRadios1" value="free" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Free
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type"
                                                    id="gridRadios1" value="paid">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Paid
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Level</label>
                                        <div class="gap-4 d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="level"
                                                    id="gridRadios1" value="Beginner" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Beginner
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="level"
                                                    id="gridRadios1" value="Medium">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Medium
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="level"
                                                    id="gridRadios1" value="Expert">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Expert
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="inputDuration" class="form-label">Duration</label>
                                    <input type="text" class="form-control" id="inputDuration" name="duration">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputTotalSection" class="form-label">Total Section</label>
                                    <input type="text" class="form-control" id="inputTotalSection" name="total_section">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPrice" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="inputPrice" name="price">
                                </div>

                                <div class="col-12">
                                    <label for="inputDescription" class="form-label">Description</label>
                                    <textarea class='form-control' name="description"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="inputFile" class="form-label">Cover Image</label>
                                    <input type="file" class="form-control" id="file" name="coverImage">
                                    @error('coverImage')
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
