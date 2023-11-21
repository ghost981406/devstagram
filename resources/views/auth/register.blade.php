@extends('layouts.app')

@section('titulo')
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <!--<div class="hidden md:block bg-white p-5 pt-36 px-20">
            <img src="{{ asset('img/R.png') }}" alt="Imagen Registro de usuarios">
        </div>-->

        <div class="md:w-4/12 bg-white p-10 border rounded-lg">
            <h2 class="text-3xl pb-5 font-bold text-center">Regístrate</h2>
            <form action="{{ route('registrar') }}" method="POST" novalidate>
                @csrf
                <div class="mb5">
                    <label for="name" class="mb-2 block text-black mt-3">Nombre</label>
                    <input 
                        id="name"
                        name="name"
                        type="text"
                        placeholder="-"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500
                            
                        @enderror"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="bg-red-500 text-sm text-white rounded-lg my-2 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
                </div>

                <div class="mb5">
                    <label for="username" class="mb-2 block text-black mt-3">Usuario</label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="-"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500
                            
                        @enderror"
                        value="{{ old('username') }}"
                    />
                    @error('username')
                        <p class="bg-red-500 text-sm text-white rounded-lg my-2 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
                </div>

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

                <div class="mb5">
                    <label for="password_confirmation" class="mb-2 block text-black mt-3">Repetir Contraseña</label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="-"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>

                <input type="submit" value="Crear Cuenta" class="bg-blue-600 hover:bg-blue-700 transition-colors cursor-pointer w-full text-white uppercase mt-5 rounded-lg p-3 font-bold">
            </form>
        </div>
    </div>
@endsection