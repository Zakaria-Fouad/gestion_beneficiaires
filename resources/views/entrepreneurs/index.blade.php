<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Beneficiaires</h2>
            <a href="{{ route('entrepreneurs.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">Nouveau beneficiaire</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">{{ session('status') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="GET" action="{{ route('entrepreneurs.index') }}" class="mb-4">
                        <div class="flex gap-2">
                            <x-text-input name="q" type="text" class="w-full" :value="request('q')" placeholder="Recherche: nom, CIN, telephone, ville, region" />
                            <x-primary-button>Rechercher</x-primary-button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">CIN</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Telephone</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Region</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Saisi par</th>
                                    <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($entrepreneurs as $entrepreneur)
                                    <tr>
                                        <td class="px-4 py-2">{{ $entrepreneur->nom_prenom }}</td>
                                        <td class="px-4 py-2">{{ $entrepreneur->cin ?: '-' }}</td>
                                        <td class="px-4 py-2">{{ $entrepreneur->telephone ?: '-' }}</td>
                                        <td class="px-4 py-2">{{ $entrepreneur->region ?: '-' }}</td>
                                        <td class="px-4 py-2">{{ $entrepreneur->user_name }}</td>
                                        <td class="px-4 py-2 text-right">
                                            <div class="inline-flex items-center gap-2">
                                                <a href="{{ route('entrepreneurs.show', $entrepreneur) }}" class="text-indigo-600 hover:text-indigo-800">Voir</a>
                                                <a href="{{ route('entrepreneurs.edit', $entrepreneur) }}" class="text-amber-600 hover:text-amber-800">Modifier</a>
                                                <form method="POST" action="{{ route('entrepreneurs.destroy', $entrepreneur) }}" onsubmit="return confirm('Supprimer ce beneficiaire ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800">Supprimer</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">Aucun beneficiaire enregistre.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $entrepreneurs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
