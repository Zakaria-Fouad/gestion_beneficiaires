<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Details beneficiaire</h2>
            <a href="{{ route('entrepreneurs.edit', $entrepreneur) }}" class="inline-flex items-center px-4 py-2 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-400">Modifier</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><dt class="font-semibold text-gray-700">Nom et prenom</dt><dd>{{ $entrepreneur->nom_prenom }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">CIN</dt><dd>{{ $entrepreneur->cin ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Genre</dt><dd>{{ $entrepreneur->genre ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Date de naissance</dt><dd>{{ optional($entrepreneur->date_naissance)->format('d/m/Y') ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Niveau scolaire</dt><dd>{{ $entrepreneur->niveau_scolaire ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Situation maritale</dt><dd>{{ $entrepreneur->situation_maritale ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Telephone</dt><dd>{{ $entrepreneur->telephone ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">IMF</dt><dd>{{ $entrepreneur->imf ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Region</dt><dd>{{ $entrepreneur->region ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Ville</dt><dd>{{ $entrepreneur->ville ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Statut juridique</dt><dd>{{ $entrepreneur->statut_juridique ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Secteur</dt><dd>{{ $entrepreneur->secteur ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Activite</dt><dd>{{ $entrepreneur->activite ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Date premiere participation</dt><dd>{{ optional($entrepreneur->date_premiere_participation)->format('d/m/Y') ?: '-' }}</dd></div>
                        <div><dt class="font-semibold text-gray-700">Saisi par</dt><dd>{{ $entrepreneur->user_name }}</dd></div>
                    </dl>

                    <div class="mt-6">
                        <a href="{{ route('entrepreneurs.index') }}" class="text-indigo-600 hover:text-indigo-800">Retour a la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
