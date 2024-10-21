<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate();

        $data = [
            'projects' => $projects
        ];
        return view('admin.projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $languages = Language::all();

        $data = [
            'types' => $types,
            'languages' => $languages
        ];

        return view('admin.projects.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //PRENDO TUTTI I DATI
        // $data = $request->all();
        // Qui abbiamo la validazione
        $data = $request->validate([
            "name_project" => "required|min:3|max:200",
            "img" => "required|image",
            "link" => "required",
            "description" => "required",
            "type_id" => "required",
            "languages " => "array",
            "languages.*" => "required|exists:languages,id",
            // "date" => "required"
        ]);
        //aggiungo data ad ogni nuovo progetto
        $data['date'] = now();
        $data['slug'] = Str::slug($request->name_project, '-');
        if ($request->has('img')) {
            // una volta online, storage:put non funziona
            //$img_path = Storage::put('img', $request['img']);
            $img_path = $request->file('img')->store('img', 'public');
            $data['img'] = $img_path;
        }
        //CREO L'OGGETTO
        $newProject = new Project();


        //POPOLO L'OGGETTO CREANDO L'ISTANZA
        $newProject->fill($data);


        //SALVO SUL DB
        $newProject->save();
        $newProject->languages()->sync($data['languages']);


        //RITORNO LA ROTTA
        // return redirect()->route('project.index');
        return redirect()->route('admin.projects.index', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        $data = [
            "project" => $project,


        ];

        return view("admin.projects.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $tipi = Type::all();
        $languages = Language::all();
        $projectLanguages = $project->languages->pluck('id')->toArray();
        $data = [
            "project" => $project,
            "types" => $tipi,
            'languages' => $languages,
            'projectLanguages' => $projectLanguages,

        ];

        return view("admin.projects.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {


        $data = $request->validate([
            "name_project" => "required|min:3|max:200",
            "img" => "required|image",
            "link" => "required",
            "description" => "required",
            "type_id" => "required",
            "languages " => "array",
            "languages.*" => "required|exists:languages,id",
            // "date" => "required"
        ]);


        //aggiungo data ad ogni nuovo progetto
        $data['date'] = now();
        $data['slug'] = Str::slug($request->name_project, '-');
        if ($request->has('img')) {

            $img_path = Storage::put('img', $request['img']);
            $data['img'] = $img_path;
            if ($project->img && !Str::startsWith($project->img, 'http')) {
                // not null and not startingn with http
                Storage::delete($project->img);
            }
            //dd($data['img']);
        }

        $project->update($data);
        $project->languages()->sync($data['languages']);



        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)

    {
        if ($project->img && !Str::startsWith($project->img, 'http')) {
            // not null and not startingn with http
            Storage::delete($project->img);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
