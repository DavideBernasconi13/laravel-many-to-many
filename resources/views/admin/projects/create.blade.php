@extends('layouts.admin')

@section('title', 'Create Project')

@section('content')
<section>
    <div class="container">
        <h2>Create a new project</h2>
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}" minlength="3" maxlength="200" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div id="titleHelp" class="form-text">Inserire minimo 3 caratteri e massimo 200</div>
            </div>

            <div class="mb-3">
                <img id="uploadPreview" width="100" src="/images/placeholder.png">
                <label for="image" class="form-label">Image</label>
                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror"
                    id="uploadImage" name="image" value="{{ old('image') }}" maxlength="255">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('desscription') is-invalid @enderror" id="description"
                    name="description" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex align-items-center">
                <div class="col-auto">
                    <label for="category_id" class="col-form-label">Select category</label>
                </div>
                <div class="col-auto">
                    <select class="form-control @error('category_id') is-invalid @enderror mx-3 w50" id="category_id"
                        name="category_id">
                        <option value="">Select category</option>
                        @foreach($categories as $category){
                            <option value="{{$category->id}} {{$category->id == old('category_id') ? 'selected' : ''}}">
                                {{$category->name}}
                            </option>
                            }
                        @endforeach
                    </select>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Create</button>
                <button type="reset" class="btn btn-secondary">Reset</button>

            </div>
        </form>
    </div>


</section>


@endsection