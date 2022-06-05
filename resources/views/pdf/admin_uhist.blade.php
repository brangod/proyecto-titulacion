<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuario Historial</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <h1 class="font-bold text-lg">Historial Usuario: {{$user->name}}</h1>
    <h3 class="text-xs italic">{{$user->boleta}}</h3>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-4">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">ID</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Recurso</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Tipo</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Detalles</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Estado</th>
                                <th class="px-5 py-3 border-b-2 border-sky-200 bg-blue-100 text-center text-xs font-semibold text-gray-600 uppercase">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historial as $h)
                            <tr>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->id}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->recurso->nombre}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->recurso->tipo->nombre}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->detalles}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->estado->nombre}}</td>
                                <td class="px-5 py-5 border-b border-sky-200 bg-blue-100 text-sm">{{$h->updated_at}}</td>
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
