<?php
namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AlternatifController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Alternatif::query();

        if ($search) {
            $query->where('merek', 'LIKE', "%{$search}%")
                  ->orWhere('C1', 'LIKE', "%{$search}%")
                  ->orWhere('C2', 'LIKE', "%{$search}%")
                  ->orWhere('C3', 'LIKE', "%{$search}%")
                  ->orWhere('C4', 'LIKE', "%{$search}%")
                  ->orWhere('C5', 'LIKE', "%{$search}%");
        }

        $alternatifs = $query->get();

        return view('alternatif.index', compact('alternatifs'));
    }

    public function create()
    {
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'C1' => 'nullable|numeric',
            'C2' => 'nullable|numeric',
            'C3' => 'nullable|numeric',
            'C4' => 'nullable|numeric',
            'C5' => 'nullable|numeric',
        ]);

        try {
            Alternatif::create($request->all());
            return redirect()->route('alternatif.index')->with('success', 'Alternatif created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create alternatif.']);
        }
    }

    public function show($id)
    {
        try {
            $alternatif = Alternatif::findOrFail($id);
            return view('alternatif.show', compact('alternatif'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('alternatif.index')->withErrors(['error' => 'Alternatif not found.']);
        }
    }

    public function edit($id)
    {
        try {
            $alternatif = Alternatif::findOrFail($id);
            return view('alternatif.edit', compact('alternatif'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('alternatif.index')->withErrors(['error' => 'Alternatif not found.']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merek' => 'required',
            'C1' => 'nullable|numeric',
            'C2' => 'nullable|numeric',
            'C3' => 'nullable|numeric',
            'C4' => 'nullable|numeric',
            'C5' => 'nullable|numeric',
        ]);

        try {
            $alternatif = Alternatif::findOrFail($id);
            $alternatif->update($request->all());
            return redirect()->route('alternatif.index')->with('success', 'Alternatif updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to update alternatif.']);
        }
    }

    public function destroy($id)
    {
        try {
            $alternatif = Alternatif::findOrFail($id);
            $alternatif->delete();
            return redirect()->route('alternatif.index')->with('success', 'Alternatif deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete alternatif.']);
        }
    }
}
