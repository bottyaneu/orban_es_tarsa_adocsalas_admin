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
                    <form action="{{ route('location.create') }}" method="POST">
                        @csrf
                        <h1 class="mb-2 dark:text-white text-xl">Telephely hozzáadása</h1>
                        <div class="my-3">
                            <x-input-label for="country_code" value="Ország azonsosító (pl.: HU)" />
                            <x-text-input placeholder="Pl.: HU, US" id="work_description" name="country_code" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->first('country_code')" class="mt-2" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="city" value="Város" />
                            <x-text-input type="text" placeholder="Pl.: Budapest" id="city" name="city" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->first('city')" class="mt-2" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="address" value="Cím" />
                            <x-text-input placeholder="Pl.: Arany János utca" id="address" type="text" min="0" max="100" name="address" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->first('address')" class="mt-2" />
                        </div>
                        <x-primary-button class="my-2">Létrehozás</x-primary-button>
                    </form>
                </div>
            </div>

            @if(count($locations) > 0)
                <h2 class="text-xl my-4 dark:text-white">Telephelyek</h2>
                @foreach($locations as $l)
                    <div class="my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-between">
                            <div>
                                <h2 class="text-gray-700 dark:text-gray-500">{{ $l->country_code }} - {{ $l->city }}</h2>
                                <p>{{ $l->address }}</p>
                            </div>
                            <div>
                                <form method="post" action="{{ route('location.delete', $l->id) }}">
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
