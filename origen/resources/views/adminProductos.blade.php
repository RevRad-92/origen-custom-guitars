<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de administración de Productos
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
                                <th>Modelo</th>
                                <th>Madera</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th colspan="2">
                                    <a href="/agregarProducto" class="btn btn-outline-secondary">
                                        Agregar
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>    
                    @foreach($productos as $producto)      
                          <tr>
                            <td>{{ $producto->idProducto}}</td>
                            <td>{{ $producto->getCategoria->catNombre}}</td>
                            <td>{{ $producto->getModelo->modNombre}}</td>
                            <td>{{ $producto->getMadera->madNombre}}</td>
                            <td>{{ $producto->prdStock}}</td>
                            <td>${{ $producto->prdPrecio}}</td>
                            <td>
                                <a href="/modificarProducto/{{ $producto->idProducto }}" class="btn btn-outline-secondary">
                                    Modificar
                                </a>
                            </td>
                            <td>
                                <a href="/eliminarProducto/{{ $producto->idProducto }}" class="btn btn-outline-secondary">
                                    Eliminar
                                </a>
                            </td>
                          </tr>
                    @endforeach
                        </tbody>
                    </table>
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
