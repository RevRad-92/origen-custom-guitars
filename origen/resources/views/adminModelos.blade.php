<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de administración de Modelos
        </h2>
    </x-slot>

    @if ( session('mensaje') )
            <div class="alert alert-success max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{ session('mensaje') }}
            </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th colspan="2">
                                    <a href="/agregarModelo" class="btn btn-outline-secondary">
                                        Agregar
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>    
                    @foreach($modelos as $modelo)      
                          <tr>
                            <td>{{ $modelo->idModelo}}</td>
                            <td>{{ $modelo->modNombre}}</td>
                            <td>
                                <a href="/modificarModelo/{{ $modelo->idModelo }}" class="btn btn-outline-secondary">
                                    Modificar
                                </a>
                            </td>
                            <td>
                                <a href="/eliminarModelo/{{ $modelo->idModelo }}" class="btn btn-outline-secondary">
                                    Eliminar
                                </a>
                            </td>
                          </tr>
                    @endforeach
                        </tbody>
                    </table>
                    {{ $modelos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
