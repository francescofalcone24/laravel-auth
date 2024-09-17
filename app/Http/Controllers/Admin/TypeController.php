<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        $data = [
            'tipi' => $types
        ];
        return view('admin.types.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        $data = [
            'types' => $types
        ];
        return view('admin.types.create', $data);
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
            "name" => "required|min:3|max:200",
            "description" => "required|min:5|max:255",
            "icon" => "required|min:3|max:200",
        ]);


        //CREO L'OGGETTO
        $newType = new Type();

        //POPOLO L'OGGETTO CREANDO L'ISTANZA
        $newType->fill($data);

        //SALVO SUL DB
        $newType->save();

        //RITORNO LA ROTTA
        // return redirect()->route('project.index');
        return redirect()->route('admin.types.index', $newType);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $data = [
            "type" => $type
        ];

        return view('admin.types.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $types = Type::all();
        $tipo = $type;
        $data = [
            "type" => $tipo,
            "types" => $types
        ];
        return view('admin.types.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->all();

        //$project->update($data);

        $type->fill($data);
        $type->save();
        return redirect()->route('admin.types.show', $type->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index');
    }
}
