@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">{{ $formtitle }}</div>
        <div class="card-body">
            @if(isset($postslug))
            <form action="{{ route('editpost', ['category' => $preselect->slug, 'postslug' => $postslug]) }}" method="POST">
            @else
            <form action="{{ route('createpost', $preselect->slug) }}" method="POST">
            @endif
                @csrf
                <div class="form-group">
                    <label for="select_category">Select Category</label>
                    <select class="form-control" id="select_category" name="select_category">
                    @foreach ($categories as $category )
                        <option value="{{ $category->id }}"
                            @if (old('select_category') == $category->id)
                                selected="selected"
                            @elseif ($preselect->id == $category->id &! old('select_category') == $category->id)
                                selected="selected"
                            @endif
                            >{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        class="form-control @error('title') is-invalid @enderror @if(old('title')) is-valid @endif"
                        value="{{ old('title', $title ?? '') }}"
                        id="title"
                        name="title"
                        placeholder="Title"
                    >
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input
                        type="text"
                        class="form-control @if(old('subtitle')) is-valid @endif"
                        value="{{ old('subtitle', $subtitle ?? '') }}"
                        id="subtitle"
                        name="subtitle"
                        placeholder="Subtitle"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea
                        class="form-control summernote @error('content') is-invalid @enderror @if(old('content')) is-valid @endif"
                        id="content"
                        name="content"
                    >
                        {{ old('content', $content ?? '') }}
                    </textarea>
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

@section('afterjs')
<script>
$(document).ready(function () {
    $('.summernote').summernote({
        height: 300,
        toolbar: [
            // [groupName, [list of button]]

            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            // ['fontsize', ['fontsize']],
            // ['color', ['color']],
            ['para', ['ul', 'ol', 'hr', 'table']],
            ['link', ['linkDialogShow', 'unlink']],
            ['view', ['codeview','fullscreen'], 'right'],
            // ['height', ['height']]
          ],
    });
    $('.note-editor').addClass('bg-white');
    $('.note-toolbar').addClass('border-bottom');
    $('.note-view').addClass('float-right');
});

</script>
@endsection
