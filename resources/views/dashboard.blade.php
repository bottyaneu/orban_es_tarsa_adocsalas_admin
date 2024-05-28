<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Kezdőfelület
        </h2>
    </x-slot>

    <div class="pb-12 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-xl mb-4 dark:text-white">Kezdőfelület</h2>

            <div class="my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-3 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl mb-2 text-black dark:text-white">Összes kiadás:</h2>
                    <p>
                        Bruttó: <span class="text-gray-700 dark:text-gray-500">{{ number_format($total_spending) }}</span> Ft<br/>
                        Nettó: <span class="text-gray-700 dark:text-gray-500">{{ number_format($net_total_spending) }}</span> Ft<br/>
                    </p>
                </div>
            </div>

            <div class="my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-3 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl mb-2 text-black dark:text-white">Összes bevétel:</h2>
                    <p>
                        Bruttó: <span class="text-gray-700 dark:text-gray-500">{{ number_format($total_income) }}</span> Ft<br/>
                        Nettó: <span class="text-gray-700 dark:text-gray-500">{{ number_format($net_total_income) }}</span> Ft<br/>
                    </p>
                </div>
            </div>

            <div class="my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-3 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl mb-2 text-black dark:text-white">Cég:</h2>
                    <p>
                        Bruttó: <span class="text-gray-700 dark:text-gray-500">{{ number_format($total_income - $total_spending) }}</span> Ft<br/>
                        Nettó: <span class="text-gray-700 dark:text-gray-500">{{ number_format($net_total_income - $net_total_spending) }}</span> Ft<br/>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
