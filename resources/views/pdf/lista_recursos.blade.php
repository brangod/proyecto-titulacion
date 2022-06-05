<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de {{$tipo->nombre}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <h1 class="font-bold text-lg">Lista de {{$tipo->nombre}}</h1>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-4">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">ID</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Nombre</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Descripcion</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Categoria</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Estado</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Fecha adquirido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historial as $h)
                            <tr>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->id}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->nombre}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->descripcion}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->categoria->nombre}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->estado->nombre}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
