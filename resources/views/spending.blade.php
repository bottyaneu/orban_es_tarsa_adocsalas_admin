<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Kiadások kezelése
        </h2>
    </x-slot>

    <div class="pb-12 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-xl mb-4 dark:text-white">Kiadások hozzáadása</h2>

            <div class="my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-3">
                    <form action="{{ route('spending.create') }}" method="POST">
                        @csrf
                        <h1 class="mb-2 dark:text-white text-xl">Kiadás hozzáadása</h1>
                        <div class="my-3">
                            <x-input-label for="work_description" value="Kiadás leírása" />
                            <x-text-input placeholder="Pl.: Új szoftverek" id="work_description" name="description" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->first('description')" class="mt-2" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="price" value="Ár" />
                            <x-text-input type="number" placeholder="Pl.: 100000 Ft" id="price" name="price" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->first('price')" class="mt-2" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="tax_percentage" value="Adó százalék" />
                            <x-text-input placeholder="Pl.: 100000 Ft" id="tax_percentage" type="number" min="0" max="100" name="tax_percentage" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->first('tax_percentage')" class="mt-2" />
                        </div>
                        <x-primary-button class="my-2">Létrehozás</x-primary-button>
                    </form>

                </div>
            </div>

            @if(count($spending) > 0)
                <h2 class="text-xl my-4 dark:text-white">Kiadások</h2>
                @foreach($spending as $s)
                    <div class="my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-between">
                            <div>

                                <h2 class="text-gray-700 dark:text-gray-500">{{ $s->user->name }}:</h2>
                                <h4 class="text-lg">{{ $s->description }}</h4>
                                <p>
                                    Ár: <span class="text-gray-700 dark:text-gray-500">{{ number_format($s->price) }}</span> Ft - Adó: {{ $s->tax_percentage }}%<br/>
                                    Létrehozva: <span class="text-gray-700 dark:text-gray-500">{{ $s->created_at->diffForHumans() }}</span>
                                </p>

                            </div>
                            <div>
                                <form method="post" action="{{ route('spending.delete', $s->id) }}">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button class="mt-2">Törlés</x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
