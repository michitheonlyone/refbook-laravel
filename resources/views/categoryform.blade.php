@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">{{ $formtitle }}</div>
        <div class="card-body">
            <form action="{{ route('createcategory') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror @if(old('name')) is-valid @endif" value="{{ old('name') }}" id="name" name="name" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror @if(old('description')) is-valid @endif" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                {{-- <div class="form-control"> --}}
                    <button type="submit" class="btn btn-success">Save</button>
                {{-- </div> --}}
              </form>
        </div>
    </div>
    {{-- <div class="card">
        <div class="card-body">
            {!! $post->content !!}
        </div>
    </div> --}}
@endsection
