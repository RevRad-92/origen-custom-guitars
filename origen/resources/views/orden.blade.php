<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Orden de compra #{{ $orden }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Modelo</th>
                                <th>Material</th>
                                <th>Estado</th>

                            </tr>
                        </thead>
                        <tbody>    
                    @foreach($detalles as $detalle)   
                    
                          <tr>
                            <td>{{ $detalle->getProducto->getCategoria->catNombre }}</td>
                            <td>{{ $detalle->getProducto->getModelo->modNombre }}</td>
                            <td>{{ $detalle->getProducto->getMadera->madNombre }}</td>
                            <td>
                            <form action="/orden/{{ $detalle->idOrden}}" method="post" class="form-control">
                                @csrf
                                <select name="idEstado" class="form-control desplegar">
                        @foreach ($estados as $estado)  
                                    <option {{ $estado->estNombre == $detalle->getEstado->estNombre ? 'selected' : '' }}
                                        value="{{ $estado->idEstado == $detalle->getEstado->idEstado ? $detalle->getEstado->idEstado : $estado->idEstado }}">
                                        {{ $estado->estNombre == $detalle->getEstado->estNombre ? $detalle->getEstado->estNombre : $estado->estNombre }}
                                    </option>
                        
                            {{-- {{ $detalle->getEstado->estNombre }} --}}
                        @endforeach
                                    
                            
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-dark mb-3">Confirmar estado</button>
                            </form>
                            </td>
                            
                            {{-- <td> 
                                <a href="/modificarCliente/{{ $cliente->idCliente }}" class="btn btn-outline-secondary">
                                    Modificar
                                </a>
                            </td>
                            <td>
                                <a href="/eliminarOrden/{{ $orden->idOrden }}" class="btn btn-outline-secondary">
                                    Eliminar
                                </a>
                            </td> --}}
                          </tr>
                    @endforeach
                        </tbody> 
                    </table>
                    {{ $detalles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
