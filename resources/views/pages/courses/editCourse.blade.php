@extends('layouts.main')
@section('breadcrumb')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Course</li>
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
                            <form class="mt-2 row g-3" method="post" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $course->title }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputDescription" class="form-label">Description</label>
                                    <input type="description" class="form-control" id="inputDescription" name="description" value="{{ $course->description }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputType" class="form-label">Type</label>
                                    <input type="type" class="form-control" id="inputType" name="type" value="{{ $course->type }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLevel" class="form-label">Level</label>
                                    <input type="level" class="form-control" id="inputLevel" name="level" value="{{ $course->level }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputTotalSection" class="form-label">Total Section</label>
                                    <input type="totalSection" class="form-control" id="inputTotalSection" name="totalSection" value="{{ $course->total_section }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputDuration" class="form-label">Duration</label>
                                    <input type="duration" class="form-control" id="inputDuration" name="duration" value="{{ $course->duration }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPrice" class="form-label">Price</label>
                                    <input type="price" class="form-control" id="inputPrice" name="price" value="{{ $course->price }}">
                                </div>


                                <div class="gap-4 col-12 d-flex">
                                    <div class='d-flex flex-column'>
                                        <label for="inputFile" class="form-label">Cover Image</label>
                                        <img class="rounded-circle" width="100px" height="100px" src="{{ asset('storage/images/course-'.$course->cover_image) }}" alt="Cover Image">
                                    </div>
                                    <div class="align-self-center">
                                        <input type="file" class="form-control" id="file" name="coverImage">
                                    </div>

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
