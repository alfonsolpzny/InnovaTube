<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buscar videos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Busca videos y añade a favoritos.</h1>
                    <form action="{{ url('/youtube/search') }}" method="get">
                        
                        <input class="form-control" type="text" name="query" placeholder="Buscar..." required style="margin-bottom: 15px">  
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
