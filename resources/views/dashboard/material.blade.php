@extends('layouts.plantilla')

@section('contenido')
    @livewire('material',['tipo_id'=>$id])
@endsection