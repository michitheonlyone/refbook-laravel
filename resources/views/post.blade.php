@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">{{ $post->title }}</div>
        <div class="card-body">{{ $post->subtitle }}</div>
    </div>
    <div class="card">
        <div class="card-body">
            {!! $post->content !!}
        </div>
    </div>
@endsection
