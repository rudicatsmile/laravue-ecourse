@extends('layouts.main')

@section('content')

    <div>
        <h1>Create Categories Form</h1>
        <a href="{{ route('categories.index') }}">Back to Index</a>
        <br>

        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <input type="text" name="name">
            <br>
            @error('name')
            <p style color='red'>{{ $message }}</p>
            @enderror
            <input type="submit" value="Save">
        </form>
    </div>

@endsection

