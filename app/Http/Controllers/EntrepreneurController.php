<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneur;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EntrepreneurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Entrepreneur::query()->latest();

        if ($request->filled('q')) {
            $term = (string) $request->string('q');
            $query->where(function ($subQuery) use ($term): void {
                $subQuery->where('nom_prenom', 'like', "%{$term}%")
                    ->orWhere('cin', 'like', "%{$term}%")
                    ->orWhere('telephone', 'like', "%{$term}%")
                    ->orWhere('ville', 'like', "%{$term}%")
                    ->orWhere('region', 'like', "%{$term}%");
            });
        }

        return view('entrepreneurs.index', [
            'entrepreneurs' => $query->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('entrepreneurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nom_prenom' => ['required', 'string', 'max:255'],
            'date_naissance' => ['nullable', 'date'],
            'cin' => ['nullable', 'string', 'max:255', 'unique:entrepreneurs,cin'],
            'genre' => ['nullable', 'string', 'max:20'],
            'region' => ['nullable', 'string', 'max:255'],
            'ville' => ['nullable', 'string', 'max:255'],
            'situation_maritale' => ['nullable', 'string', 'max:255'],
            'activite' => ['nullable', 'string', 'max:255'],
            'niveau_scolaire' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:30'],
            'statut_juridique' => ['nullable', 'string', 'max:255'],
            'secteur' => ['nullable', 'string', 'max:255'],
            'imf' => ['nullable', 'string', 'max:255'],
            'date_premiere_participation' => ['nullable', 'date'],
        ]);

        $validated['user_id'] = $request->user()->id;
        $validated['user_name'] = $request->user()->name;

        Entrepreneur::create($validated);

        return redirect()->route('entrepreneurs.index')->with('status', 'Beneficiaire cree avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrepreneur $entrepreneur): View
    {
        return view('entrepreneurs.show', [
            'entrepreneur' => $entrepreneur,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrepreneur $entrepreneur): View
    {
        return view('entrepreneurs.edit', [
            'entrepreneur' => $entrepreneur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrepreneur $entrepreneur): RedirectResponse
    {
        $validated = $request->validate([
            'nom_prenom' => ['required', 'string', 'max:255'],
            'date_naissance' => ['nullable', 'date'],
            'cin' => ['nullable', 'string', 'max:255', 'unique:entrepreneurs,cin,' . $entrepreneur->id],
            'genre' => ['nullable', 'string', 'max:20'],
            'region' => ['nullable', 'string', 'max:255'],
            'ville' => ['nullable', 'string', 'max:255'],
            'situation_maritale' => ['nullable', 'string', 'max:255'],
            'activite' => ['nullable', 'string', 'max:255'],
            'niveau_scolaire' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:30'],
            'statut_juridique' => ['nullable', 'string', 'max:255'],
            'secteur' => ['nullable', 'string', 'max:255'],
            'imf' => ['nullable', 'string', 'max:255'],
            'date_premiere_participation' => ['nullable', 'date'],
        ]);

        $entrepreneur->update($validated);

        return redirect()->route('entrepreneurs.index')->with('status', 'Beneficiaire modifie avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrepreneur $entrepreneur): RedirectResponse
    {
        $entrepreneur->delete();

        return redirect()->route('entrepreneurs.index')->with('status', 'Beneficiaire supprime avec succes.');
    }
}
