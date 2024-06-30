<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use Illuminate\Http\Request;


class ConceptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $concepts = Concept::all();
        return view('concept/index', ['concepts' => $concepts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('concept/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'explanation' => 'required',
            'examples' => 'required',
        ]);

        $newConcept = Concept::create($validated);

        return redirect(route('concept.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $concept = Concept::findOrFail($id);
        return view('concept/show' , ['concept' => $concept]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concept $concept)
    {
        return view('concept/edit', ['concept' => $concept]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concept $concept)
    {
        $validated = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'explanation' => 'required',
            'examples' => 'required',
        ]);

        $concept->update($validated);

        return redirect(route('concept.index'))->with('success', 'Concept Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concept $concept)
    {
        $concept->delete();
        return redirect(route('concept.index'))->with('success', 'Concept Deleted Successfully!');
    }
}
