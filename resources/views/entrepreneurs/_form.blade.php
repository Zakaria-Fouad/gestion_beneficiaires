@php
    $isEdit = isset($entrepreneur);
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <x-input-label for="nom_prenom" value="Nom et Prenom" />
        <x-text-input id="nom_prenom" name="nom_prenom" type="text" class="mt-1 block w-full" :value="old('nom_prenom', $entrepreneur->nom_prenom ?? '')" required />
        <x-input-error class="mt-2" :messages="$errors->get('nom_prenom')" />
    </div>

    <div>
        <x-input-label for="cin" value="CIN" />
        <x-text-input id="cin" name="cin" type="text" class="mt-1 block w-full" :value="old('cin', $entrepreneur->cin ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('cin')" />
    </div>

    <div>
        <x-input-label for="date_naissance" value="Date de naissance" />
        <x-text-input id="date_naissance" name="date_naissance" type="date" class="mt-1 block w-full" :value="old('date_naissance', isset($entrepreneur) && $entrepreneur->date_naissance ? $entrepreneur->date_naissance->format('Y-m-d') : '')" />
        <x-input-error class="mt-2" :messages="$errors->get('date_naissance')" />
    </div>

    <div>
        <x-input-label for="date_premiere_participation" value="Date premiere participation" />
        <x-text-input id="date_premiere_participation" name="date_premiere_participation" type="date" class="mt-1 block w-full" :value="old('date_premiere_participation', isset($entrepreneur) && $entrepreneur->date_premiere_participation ? $entrepreneur->date_premiere_participation->format('Y-m-d') : '')" />
        <x-input-error class="mt-2" :messages="$errors->get('date_premiere_participation')" />
    </div>

    <div>
        <x-input-label for="genre" value="Genre" />
        <select id="genre" name="genre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">Selectionner</option>
            @foreach (['Femme', 'Homme'] as $genreOption)
                <option value="{{ $genreOption }}" @selected(old('genre', $entrepreneur->genre ?? '') === $genreOption)>{{ $genreOption }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('genre')" />
    </div>

    <div>
        <x-input-label for="situation_maritale" value="Situation maritale" />
        <x-text-input id="situation_maritale" name="situation_maritale" type="text" class="mt-1 block w-full" :value="old('situation_maritale', $entrepreneur->situation_maritale ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('situation_maritale')" />
    </div>

    <div>
        <x-input-label for="niveau_scolaire" value="Niveau scolaire" />
        <x-text-input id="niveau_scolaire" name="niveau_scolaire" type="text" class="mt-1 block w-full" :value="old('niveau_scolaire', $entrepreneur->niveau_scolaire ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('niveau_scolaire')" />
    </div>

    <div>
        <x-input-label for="telephone" value="Telephone" />
        <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" :value="old('telephone', $entrepreneur->telephone ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
    </div>

    <div>
        <x-input-label for="imf" value="IMF" />
        <x-text-input id="imf" name="imf" type="text" class="mt-1 block w-full" :value="old('imf', $entrepreneur->imf ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('imf')" />
    </div>

    <div>
        <x-input-label for="statut_juridique" value="Statut juridique" />
        <x-text-input id="statut_juridique" name="statut_juridique" type="text" class="mt-1 block w-full" :value="old('statut_juridique', $entrepreneur->statut_juridique ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('statut_juridique')" />
    </div>

    <div>
        <x-input-label for="secteur" value="Secteur" />
        <x-text-input id="secteur" name="secteur" type="text" class="mt-1 block w-full" :value="old('secteur', $entrepreneur->secteur ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('secteur')" />
    </div>

    <div>
        <x-input-label for="activite" value="Activite" />
        <x-text-input id="activite" name="activite" type="text" class="mt-1 block w-full" :value="old('activite', $entrepreneur->activite ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('activite')" />
    </div>

    <div>
        <x-input-label for="region" value="Region" />
        <x-text-input id="region" name="region" type="text" class="mt-1 block w-full" :value="old('region', $entrepreneur->region ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('region')" />
    </div>

    <div>
        <x-input-label for="ville" value="Ville" />
        <x-text-input id="ville" name="ville" type="text" class="mt-1 block w-full" :value="old('ville', $entrepreneur->ville ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('ville')" />
    </div>
</div>

<div class="flex items-center justify-end gap-2 mt-6">
    <a href="{{ route('entrepreneurs.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200">Annuler</a>
    <x-primary-button>
        {{ $isEdit ? 'Mettre a jour' : 'Enregistrer' }}
    </x-primary-button>
</div>
