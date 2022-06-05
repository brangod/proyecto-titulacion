@extends('layouts.admin')

@section('contenido')
    <div class="relative">
        <a href="{{ route('pdf.lista.recursos', $t->id) }}" class="bg-indigo-500 text-white p-3 rounded-xl absolute top-0 right-10">
            Descargar Lista PDF
        </a>
    </div>


    @livewire('recursos',['t'=>$t])
@endsection
