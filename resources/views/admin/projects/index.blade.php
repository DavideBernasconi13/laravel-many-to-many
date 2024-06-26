@extends('layouts.admin')
@section('title', 'Projects')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fs-4 text-secondary my-4">
            Projects
        </h2>
        <a href="{{route('admin.projects.create')}}" class="btn btn-primary">Create new project</a>
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
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Update At</th>
                        <th scope="col" class="action-col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{$project->id}}</td>
                            <td>{{$project->title}}</td>
                            <td>{{$project->slug}}</td>
                            <td>{{$project->created_at}}</td>
                            <td>{{$project->updated_at}}</td>
                            <td>
                                <a href="{{route('admin.projects.show', $project->slug)}}" title="Show"
                                    class="text-black px-2"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('admin.projects.edit', $project->slug)}}" title="Edit"
                                    class="text-black px-2"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button border-0 bg-transparent"
                                        data-item-title="{{ $project->title }}" data-item-id="{{ $project->id }}">
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
    {{$projects->links('vendor.pagination.bootstrap-5')}}
    @include('partials.modal-delete')
</div>

@endsection