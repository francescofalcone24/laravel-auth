<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'progetti' => Project::with(['languages', 'type'])->orderByDesc('id')->paginate(6)
            //languages e type del 'with()' li prendi dal metodo del modello Project
        ]);
    }

    public function show($slug)
    {
        $project = Project::with(['languages', 'type'])->where('slug', $slug)->first(); //con first al posto di get, ti da il primo dato non un array

        if ($project) {
            return response()->json([
                'status' => true,
                'progetto' => $project
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'project not found...'
            ]);
        }
    }
}
