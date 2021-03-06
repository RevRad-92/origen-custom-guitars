<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de administración de Ventas
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
                                <th>Orden #</th>
                                <th>Cliente</th>
                                <th>Forma Pago</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Comentarios</th>
                                <th colspan="2">
                                    <a href="/generarOrden" class="btn btn-outline-secondary">
                                        Generar nueva Orden
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>    
                    @foreach($ordenes as $orden)      
                    
                        <tr>
                            <td>{{ $orden->idOrden}}</td>
                            <td>{{ $orden->getCliente->cliNombre . ' ' . $orden->getCliente->cliApellido }}</td>
                            <td>{{ $orden->getFormaPago->formaPago}}</td>
                            <td>{{ $orden->getEstado->estNombre}}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($orden->ordFecha)) }}</td>  
                            <td>{{ $orden->ordComentarios}}</td>
                            <td>
                                <a href="/eliminarOrden/{{ $orden->idOrden }}" class="btn btn-outline-secondary">
                                    Eliminar
                                </a>
                            </td>
                            <td>
                                <a href="/orden/{{ $orden->idOrden }}" class="btn btn-outline-secondary">
                                    Ver
                                </a>
                            </td>
                        </tr>
                        
                    @endforeach
                        </tbody>
                    </table>
                    {{ $ordenes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
