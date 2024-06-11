@extends('layouts.admin')
@section('title', 'tags')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fs-4 text-secondary my-4">
            tags
        </h2>
        <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Create new tag</a>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Update At</th>
                        <th scope="col" class="action-col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->slug}}</td>
                            <td>{{$tag->created_at}}</td>
                            <td>{{$tag->updated_at}}</td>
                            <td>
                                <a href="{{route('admin.tags.show', $tag->slug)}}" title="Show"
                                    class="text-black px-2"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('admin.tags.edit', $tag->slug)}}" title="Edit"
                                    class="text-black px-2"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{route('admin.tags.destroy', $tag->slug)}}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button border-0 bg-transparent"
                                        data-item-title="{{ $tag->title }}" data-item-id="{{ $tag->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    @include('partials.modal-delete')
</div>

@endsection