<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Realizar Orden de compra *DESARROLLO*
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4"> 
                    {{-- class="p-6 bg-white border-b border-gray-200" --}}
                    
                    <form action="/generarOrden2" method="post" class="form-control">
                    @csrf

                        <input type="hidden" name="idOrden"> 
                        <input type="hidden" name="idCliente" value=1> 
                        
                        <input type="hidden" name="idEstado" value=1>

                        <h1><b>Elegir características del mastil: </b></h1>
                        
                        
                
                        <br>
                        Seleccionar modelo: 
                        <br> 
                        <select name="idModelo" class="form-control desplegarModelo">
                        <option value="">-- Seleccionar modelo --</option>
                @foreach ($modelos as $modelo)        
                        <option {{ (old('idModelo') == $modelo->idModelo) ? 'selected' : '' }} value="{{ $modelo->idModelo }}">{{ $modelo->modNombre }}</option>
                @endforeach
                    </select>
                    
                        Seleccionar madera: 
                        <br> 
                        <select name="idMadera" class="form-control desplegarMadera">
                        <option value="">-- Seleccionar madera --</option>
                @foreach ($maderas as $madera)        
                        <option {{ (old('idMadera') == $madera->idMadera) ? 'selected' : '' }} value="{{ $madera->idMadera }}">{{  $madera->madNombre }}</option>
                @endforeach
                        </select>



                        
                        
                        <button class="btn btn-dark mb-3">Continuar</button>
                        <a href="/generarOrden2" class="btn btn-outline-secondary mb-3">Volver al panel de Mis Ventas</a>
                    </form>

                    @include('layouts.msgErrorValidate')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
