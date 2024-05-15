<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <h2 class="text-xl my-4 dark:text-white">Munka hozzáadása</h2>

            <div class="my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5">
                <form action="" method="POST">
                    <div>
                        <x-input-label for="work_description" value="Munka leírása" />
                        <x-text-input id="work_description" name="description" class="mt-1 block w-full" />
                        <x-input-error :messages="$errors->updatePassword->get('description')" class="mt-2" />
                    </div>
                </form>
            </div>
            </div>

            @if(count($works) > 0)
                <h2 class="text-xl my-4 dark:text-white">Munkák</h2>
                @foreach($works as $work)
                <div class="my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-between">
                        <div>
                            <h2 class="text-gray-700 dark:text-gray-500">{{ $work->user->name }}:</h2>
                            <h4 class="text-lg">{{ $work->description }}</h4>
                            <p>Létrehozva: <span class="text-gray-700 dark:text-gray-500">{{ $work->created_at->diffForHumans() }}</span></p>
                        </div>
                        <div>
                            <h3 class="text-lg">{{ $work->is_finished ? 'Befejezve' : 'Folyamatban' }}</h3>
                            @if(!$work->is_finished)
                            <form method="post" action="{{ route('works.finish', $work->id) }}">
                                @csrf
                                @method('put')
                                <x-primary-button class="mt-2">Megjelölés készként</x-primary-button>
                            </form>
                            @else
                                <p><span class="text-gray-700 dark:text-gray-500">{{ $work->updated_at->diffForHumans() }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
