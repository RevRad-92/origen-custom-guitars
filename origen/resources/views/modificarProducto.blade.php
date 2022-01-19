<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modificar producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4"> 
                    {{-- class="p-6 bg-white border-b border-gray-200" --}}
                    
                    <form action="/modificarProducto" method="post" class="form-control">
                    @csrf
                    @method('put')
                        Categoría: 
                            <br> 
                            <select name="idCategoria" class="form-control desplegar">
                            <option value="">-- Seleccionar categoría --</option>
                    @foreach ($categorias as $categoria)        
                            <option {{ ( old('idCategoria', $producto->idCategoria) == $categoria->idCategoria ) ? 'selected':'' }} value="{{$categoria->idCategoria}}">{{ $categoria->catNombre}}</option>
                    @endforeach
                        </select>

                        Modelo: 
                            <br> 
                            <select name="idModelo" class="form-control desplegarModelo">
                            <option value="">-- Seleccionar modelo --</option>
                    @foreach ($modelos as $modelo)        
                            <option {{ ( old('idModelo', $producto->idModelo) == $modelo->idModelo ) ? 'selected':'' }} value="{{$modelo->idModelo}}">{{ $modelo->modNombre}}</option>
                    @endforeach
                        </select>
                        
                        Madera: 
                            <br> 
                            <select name="idMadera" class="form-control desplegarMadera">
                            <option value="">-- Seleccionar madera --</option>
                    @foreach ($maderas as $madera)        
                            <option {{ ( old('idMadera', $producto->idMadera) == $madera->idMadera ) ? 'selected':'' }} value="{{$madera->idMadera}}">{{ $madera->madNombre}}</option>
                    @endforeach
                            </select>
                            
                        Stock: 
                            <br>
                            <input type="number" name="prdStock" value="{{ old('prdStock', $producto->prdStock) }}" class="form-control">
                            
                        Precio:
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="number" name="prdPrecio"
                                    value="{{ old('prdPrecio', $producto->prdPrecio) }}"
                                    class="form-control">
                            </div>
                        Descripción:
                            <textarea name="prdDetalles" class="form-control">{{ $producto->prdDetalles }}</textarea>

                            <input type="hidden" name="idProducto" value="{{ $producto->idProducto }}">
                        
                        {{-- MODIFICAR IMAGEN
                            Imagen: 
                            <img src="" alt="">                           --}}
                        




                        {{-- PARA MODELO --}}
                        {{-- <div class="nuevoModelo" style="display: none">
                            ...
                            <input type="text" name="prdCustomMod">
                        </div>
                        
                        

                        <script>
                            const select = document.querySelector('.desplegar');
                            
                            
                            select.addEventListener('change', (e) => {
                                const div = document.querySelector('.nuevoModelo');
                            
                                if (e.target.value == "0") {
                                div.style.display = "block";
                                }
                            }) 
                        </script> --}}

                        <br>
                        <button class="btn btn-dark mb-3">Modificar Producto</button>
                        <a href="/adminProductos" class="btn btn-outline-secondary mb-3">Volver al panel de Productos</a>
                    </form>

                    @include('layouts.msgErrorValidate')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
