<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quotes App</title>

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="relative bg-gray-900">
        <div class="flex items-center justify-center h-screen p-10">
            <div class="text-white p-8 mx-auto w-full max-w-7xl">
                <div class="grid grid-cols-3 gap-24">
                    <div class="col-span-1">
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Quote Retrieval App</h2>
                        <p class="mt-4 text-lg leading-6 text-gray-300">To generate some random quotes, simply click <strong>'Generate'</strong> </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">

                            <!-- <input type="number" name="quotes" value="5" max="10" min="1" id="quotes" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white" placeholder="Number of quotes" /> -->
                            <a href="#" class="rounded-full bg-emerald-500 px-7 py-3 font-bold text-white shadow-sm hover:bg-emerald-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white transition ease-in-out duration-300">Generate</a>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="w-full p-6 mb-4 rounded-md bg-white text-gray-900 shadow">
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum in eos error magnam doloremque.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute left-0 top-0 h-full w-full bg-scroll bg-cover bg-center bg-no-repeat opacity-60" style="background-image: url('{{ asset('images/rays.png') }}'); z-index: -1;"></div>
    </body>
</html>
