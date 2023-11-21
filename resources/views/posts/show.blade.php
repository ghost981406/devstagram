@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del Post {{ $post->titulo }}">

            <div class="p-3 flex items-center gap-4">
                @auth

                    <livewire:like-post :post="$post"/>

                    
                @endauth
                
            </div>

            <div>
                <p class="font-bold">
                    {{ $post->user->username}}
                </p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion}}
                </p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @method('DELETE')<!--Metodo Spoofing-->
                        @csrf
                        <input 
                            type="submit"
                            value="Eliminar Publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                @else
                    
                @endif
            @endauth
        </div>
        
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <form action="{{ route('comentarios.store', ['post'=>$post, 'user'=>$user])}}" method="POST">
                        @csrf
                        <div class="mb5">
                            <label for="comentario" class="font-bold mb-2 block text-gray-500 uppercase mt-3">Añade un comentario</label>
                            <textarea 
                                id="comentario"
                                name="comentario"
                                placeholder="-"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"
                            ></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-sm text-white rounded-lg my-2 p-2 text-center">
                                    {{ $message }}
                                </p> 
                            @enderror
                        </div>
                        
                        <input 
                            type="submit" 
                            value="Agregar comentario" 
                            class="bg-blue-600 hover:bg-blue-700 transition-colors cursor-pointer w-full text-white uppercase mt-5 rounded-lg p-3 font-bold"
                        />

                    </form>    
                @endauth
                
                <div  class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">Aún no hay comentarios</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection