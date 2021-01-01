@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">{{ $formtitle }}</div>
        <div class="card-body">
            <form action="{{ route('createpost', 'category') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category">Select Category</label>
                    {{-- <select class="form-control" id="category">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select> --}}
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror @if(old('title')) is-valid @endif" value="{{ old('title') }}" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" class="form-control @if(old('subtitle')) is-valid @endif" value="{{ old('subtitle') }}" id="subtitle" name="subtitle" placeholder="Subtitle">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror @if(old('content')) is-valid @endif" id="content" name="content" rows="3">{{ old('content') }}</textarea>
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
