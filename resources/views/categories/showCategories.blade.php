@extends('layouts.main')

@section('content')

    <div>
        {{ $category->name }},
        {{ $category->slug }}

    </div>

@endsection

