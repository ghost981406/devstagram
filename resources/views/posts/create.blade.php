@extends('layouts.app')

@section('titulo')
    Crea una nueva publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10 ">
            <form id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" 
            action="{{ route('imagenes.store') }}" 
            method="POST"
            enctype="multipart/form-data">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white border rounded-lg shadow-lg mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb5">
                    <label for="titulo" class="mb-2 block text-black mt-3">Título</label>
                    <input 
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="-"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500
                            
                        @enderror"
                        value="{{ old('titulo') }}"
                    />
                    @error('titulo')
                        <p class="bg-red-500 text-sm text-white rounded-lg my-2 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
                </div>

                <div class="mb5">
                    <label for="descripcion" class="mb-2 block text-black mt-3">Descripción</label>
                    <textarea 
                        id="descripcion"
                        name="descripcion"
                        placeholder="-"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-sm text-white rounded-lg my-2 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
                </div>

                <div class="mb-5">
                    <input 
                        name="imagen"
                        type="hidden"
                        value="{{ old('imagen') }}"
                    />
                    @error('imagen')
                        <p class="bg-red-500 text-sm text-white rounded-lg my-2 p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input 
                    type="submit" 
                    value="Crear Publicación" 
                    class="bg-blue-600 hover:bg-blue-700 transition-colors cursor-pointer w-full text-white uppercase mt-5 rounded-lg p-3 font-bold"
                />
            </form>
        </div>
    </div>
@endsection