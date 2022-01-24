<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modificar modelo: {{ $Modelo->modNombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4"> 
                    {{-- class="p-6 bg-white border-b border-gray-200" --}}
                    
                    <form action="/modificarModelo" method="post" class="form-control">
                    @csrf
                    @method('put')
                    
                        Nombre del modelo: 
                            <br> 
                            <input type="text" name ="modNombre" value="{{ old('modNombre', $Modelo->modNombre) }}" class="form-control">
                            
                            <br>

                            <input type="hidden" name="idModelo" value="{{ $Modelo->idModelo }}">
                        
                        <button class="btn btn-dark mb-3">Modificar modelo</button>
                        <a href="/adminModelos" class="btn btn-outline-secondary mb-3">Volver al panel de categorías</a>
                    </form>

                    @include('layouts.msgErrorValidate')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
