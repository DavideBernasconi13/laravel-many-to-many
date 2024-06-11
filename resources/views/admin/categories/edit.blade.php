@extends('layouts.admin')

@section('title', 'Edit Category: ' . $category->title)

@section('content')
<div class="container">
    <section>
        <div class="d-flex justify-content-between align-items-center py-4">
            <h2>Edit category: {{$category->title}}</h2>
            <a href="{{route('admin.categories.show', $category->slug)}}" class="btn btn-secondary">Show category</a>
        </div>

        <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="name"
                    value="{{ old('title', $category->name) }}" minlength="3" maxlength="200" required>
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