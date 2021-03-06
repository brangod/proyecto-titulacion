<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="bg-white py-6 sm:py-0">
        <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
            <div class="grid sm:grid-cols-2 gap-8 sm:gap-12">
                <!-- image - start -->
                <div
                    class="h-80 md:h-auto bg-gray-100 overflow-hidden shadow-lg sm:shadow-none rounded-lg sm:rounded-none">
                    <img src="https://images.unsplash.com/photo-1452022449339-59005948ec5b?auto=format&q=75&fit=crop&w=600"
                        loading="lazy" alt="Photo by Jeremy Cai" class="w-full h-full object-cover object-center" />
                </div>
                <!-- image - end -->

                <!-- content - start -->
                <div class="flex flex-col justify-center items-center sm:items-start md:py-24 lg:py-32 xl:py-64">
                    <p class="text-indigo-500 text-sm md:text-base font-semibold uppercase mb-4">Error 404</p>
                    <h1 class="text-gray-800 text-2xl md:text-3xl font-bold text-center sm:text-left mb-2">Page not found
                    </h1>

                    <p class="text-gray-500 md:text-lg text-center sm:text-left mb-8">The page you’re looking for doesn’t
                        exist.</p>

                </div>
                <!-- content - end -->
            </div>
        </div>
    </div>
</body>

</html>
