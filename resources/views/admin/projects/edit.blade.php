@extends('layouts.admin')

@section('title', 'Edit Project: ' . $project->title)

@section('content')
<div class="container">
    <section>
        <div class="d-flex justify-content-between align-items-center py-4">
            <h2>Edit project: {{$project->title}}</h2>
            <a href="{{route('admin.projects.show', $project->slug)}}" class="btn btn-secondary">Show project</a>
        </div>

        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $project->title) }}" minlength="3" maxlength="200" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div id="titleHelp" class="form-text">Inserire minimo 3 caratteri e massimo 200</div>
            </div>
            <div class='d-flex'>
                <div class="media me-4">
                    @if($project->image)
                        <img class="shadow" width="150" src="{{asset('storage/' . $project->image)}}"
                            alt="{{$project->title}}" id="uploadPreview">
                    @else
                        <img class="shadow" width="150" src="/images/placeholder.png" alt="{{$project->title}}"
                            id="uploadPreview">
                    @endif

                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror"
                        id="uploadImage" name="image" value="{{ old('image', $project->image) }}" maxlength="255">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" required>{{ old('description', $project->description) }}</textarea>
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
                            <option value="{{$category->id}}" {{ $category->id == $project->category_id ? 'selected' : '' }}>
                                {{$category->name}}</option>
                            }
                        @endforeach
                    </select>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>



        </form>


    </section>
</div>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

@endsection