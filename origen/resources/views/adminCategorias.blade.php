<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de administración de Categorías
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
                                <th>Categoría</th>
                                <th colspan="2">
                                    <a href="/agregarCategoria" class="btn btn-outline-secondary">
                                        Agregar
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>    
                    @foreach($categorias as $categoria)      
                          <tr>
                            <td>{{ $categoria->idCategoria}}</td>
                            <td>{{ $categoria->catNombre}}</td>
                            <td>
                                <a href="/modificarCategoria/{{ $categoria->idCategoria }}" class="btn btn-outline-secondary">
                                    Modificar
                                </a>
                            </td>
                            <td>
                                <a href="/eliminarCategoria/{{ $categoria->idCategoria }}" class="btn btn-outline-secondary">
                                    Eliminar
                                </a>
                            </td>
                          </tr>
                    @endforeach
                        </tbody>
                    </table>
                    {{ $categorias->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
