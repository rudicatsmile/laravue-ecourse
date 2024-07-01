@extends('layouts.main')

@section('content')

    <div>
        <h1>Edit Categories Form</h1>
        <a href="{{ route('categories.index') }}">Back to Index</a>

        <br>

        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @method('PUT')
            @csrf
            <input type="text" name="name" value="{{ $category->name }}">
            <input type="submit" value="Update">
        </form>
    </div>

@endsection

