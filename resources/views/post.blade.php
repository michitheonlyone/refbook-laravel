@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex d-flex justify-content-between">
            {{ $post->title }}
            @auth
                <div>
                    <a href="{{ route('editpost', ['category' => $categoryslug, 'postslug' => $postslug]) }}" class="btn btn-outline-success btn-sm">Edit Post</a>
                    <a href="{{ route('deletepost', ['category' => $categoryslug, 'postslug' => $postslug]) }}" class="btn btn-outline-danger btn-sm">Delete Post</a>
                </div>
            @endauth
        </div>
        <div class="card-body">{{ $post->subtitle }}</div>
    </div>
    <div class="card">
        <div class="card-body">
            {!! $post->content !!}
        </div>
    </div>
@endsection
