<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(5);
        return view('admin.projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['title']);
        //controllo se c'è un file
        if ($request->hasFile('image')) {
            $path = Storage::put('project_images', $request->image);
            //dd($request->image);
            $name = $request->image->getClientOriginalName(); //prende il nome originale dal mio pc 
            $path = $request->file('image')->storeAs(
                'project_images',
                $name
            );


            //     //dd($name);
            $path = Storage::putFileAs('post_images', $request->image, $name);
            $path = Storage::put('post_images', $request->image);
            $form_data['image'] = $path;
            // dd($path); // post_images/nomefile.png
        }

        $newProject = Project::create($form_data);
        return redirect()->route('admin.projects.show', $newProject->slug);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        if ($project->title !== $form_data['title']) {
            $form_data['slug'] = Project::generateSlug($form_data['title']);
        }
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            $name = $request->image->getClientOriginalName();
            // //dd($name);
            $path = Storage::putFileAs('project_images', $request->image, $name);
            $form_data['image'] = $path;
        }
        // DB::enableQueryLog();
        $project->update($form_data);
        // $query = DB::getQueryLog();
        // dd($query);
        return redirect()->route('admin.projects.show', $project->slug);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // if ($post->image) {
        //     Storage::delete($post->image);
        // }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project->title . ' è stato eliminato');
    }
}
