@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Categories</div>

        <div class="list-group">
            @foreach ($categories as $category)

            <a href="{{ $category->slug }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $category->name }}</h5>
                    <small>{{ $category->posts->count() }} Post in this category</small>
                </div>
                <p class="mb-1">{{ $category->description }}</p>
            </a>
            @endforeach
        </div>
    </div>
@endsection
