<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier beneficiaire</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('entrepreneurs.update', $entrepreneur) }}">
                        @csrf
                        @method('PUT')
                        @include('entrepreneurs._form', ['entrepreneur' => $entrepreneur])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
