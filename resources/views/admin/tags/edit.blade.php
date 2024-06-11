@extends('layouts.admin')

@section('title', 'Edit Tag: ' . $tag->title)

@section('content')
<div class="container">
    <section>
        <div class="d-flex justify-content-between align-items-center py-4">
            <h2>Edit tag: {{$tag->title}}</h2>
            <a href="{{route('admin.tags.show', $tag->slug)}}" class="btn btn-secondary">Show tag</a>
        </div>

        <form action="{{ route('admin.tags.update', $tag->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="name"
                    value="{{ old('title', $tag->name) }}" minlength="3" maxlength="200" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div id="titleHelp" class="form-text">Inserire minimo 3 caratteri e massimo 200</div>
            </div>



            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>

            </div>
        </form>


    </section>
</div>

@endsection