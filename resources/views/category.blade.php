@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">{{ $category->name }}</div>
        <div class="card-body">{{ $category->description }}</div>
    </div>

    <div class="list-group">
        @foreach ($category->posts as $post)

        <a href="{{ url($category->slug."/".$post->slug) }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <small>Postet {{ $post->updated_at }}</small>
            </div>
            <p class="mb-1">{{ $post->subtitle }}</p>
        </a>
        @endforeach
    </div>
@endsection
