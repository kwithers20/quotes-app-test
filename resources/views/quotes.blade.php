<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="token" content="{{ config('auth.api.token') }}">

        <title>Quotes Retrieval App</title>

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="relative bg-gray-900">
        <div class="flex items-center justify-center h-screen p-10">
            <div class="text-white p-8 mx-auto w-full max-w-7xl">
                <div class="grid grid-cols-3 gap-24">
                    <div class="col-span-1">
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Quotes Retrieval App</h2>
                        <p class="mt-4 text-lg leading-6 text-gray-300">To generate some random more quotes, simply click <strong>'Generate'</strong> </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                            <!-- <input type="number" name="quotes" value="5" max="10" min="1" id="quotes" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white" placeholder="Number of quotes" /> -->
                            <a class="inline-flex items-center cursor-pointer rounded-full bg-emerald-500 px-7 py-3 font-bold text-white shadow-sm hover:bg-emerald-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white transition ease-in-out duration-300" id="generate">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="spinner">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Generate
                            </a>
                        </div>
                    </div>
                    <div class="col-span-2" id="quotes">
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute left-0 top-0 h-full w-full bg-scroll bg-cover bg-center bg-no-repeat opacity-60" style="background-image: url('{{ asset('images/rays.png') }}'); z-index: -1;"></div>
    </body>

    <!-- Scripts -->
    @vite('resources/js/app.js')    
</html>
