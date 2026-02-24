<?php

namespace App\Http\Controllers;

use App\Models\Sirovina;
use Illuminate\Http\Request;

class SirovineController extends Controller
{
    public function index()
    {
        $sirovine = Sirovina::all();
        return view('sirovine.index', compact('sirovine'));
    }

    public function create()
    {
        return view('sirovine.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
            'kolicina' => 'required|numeric',
            'jedinica_mere' => 'required|string',
            'minimalna_kolicina' => 'required|numeric',
            'napomena' => 'nullable|string',
        ]);

        Sirovina::create($validated);

        return redirect()->route('sirovine.index')
            ->with('success', 'Sirovina uspešno dodata.');
    }

    public function show(Sirovina $sirovina)
    {
        return view('sirovine.show', compact('sirovina'));
    }

    public function edit(Sirovina $sirovina)
    {
        return view('sirovine.edit', compact('sirovina'));
    }

    public function update(Request $request, Sirovina $sirovina)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
            'kolicina' => 'required|numeric',
            'jedinica_mere' => 'required|string',
            'minimalna_kolicina' => 'required|numeric',
            'napomena' => 'nullable|string',
        ]);

        $sirovina->update($validated);

        return redirect()->route('sirovine.index')
            ->with('success', 'Sirovina uspešno izmenjena.');
    }

    public function destroy(Sirovina $sirovina)
    {
        $sirovina->delete();

        return redirect()->route('sirovine.index')
            ->with('success', 'Sirovina uspešno obrisana.');
    }
}