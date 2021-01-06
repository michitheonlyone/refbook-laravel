@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex d-flex justify-content-between">
            <div>{{ $category->name }}</div>
            @auth
            <a href="{{ route('createpost', $category->slug) }}" class="btn btn-outline-success btn-sm">Add Post</a>
            @endauth
        </div>
        <div class="card-body">{{ $category->description }}</div>
    </div>

    <div class="list-group">
        @foreach ($category->posts as $post)

        <a href="{{ url($category->slug."/".$post->slug) }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <small>Postet {{ $post->created_at->diffForHumans() }}</small>
                {{-- <small>Updated {{ $post->updated_at->diffForHumans() }}</small> --}}
            </div>
            <p class="mb-1">{{ $post->subtitle }}</p>
        </a>
        @endforeach
    </div>
@endsection
