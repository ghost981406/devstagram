@extends('layouts.app')

@section('titulo')
Inicia Sesión en MetAdmin
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <!--<div class="md:w-4/12 p-5 flex">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios">
        </div>-->

        <div class="md:w-6/12 lg:w-4/12 bg-white p-10 border rounded-lg">
            <!--<h2 class="text-3xl pb-5 font-bold text-center">Inicia Sesión</h2>-->
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif
                <div class="mb5">
                    <label for="email" class="mb-2 block text-black mt-3">Correo</label>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="-"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500
                            
                        @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="bg-red-500 text-sm text-white rounded-lg my-2 p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb5">
                    <label for="password" class="mb-2 block text-black mt-3">Contraseña</label>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="-"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500
                            
                        @enderror"
                    />
                    @error('password')
                        <p class="bg-red-500 text-sm text-white rounded-lg my-2 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"><label class="text-gray-500 text-sm">Mantener Sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" class="bg-blue-600 hover:bg-blue-700 transition-colors cursor-pointer w-full text-white uppercase mt-5 rounded-lg p-3 font-bold">
            
            </form>
        </div>
    </div>
@endsection