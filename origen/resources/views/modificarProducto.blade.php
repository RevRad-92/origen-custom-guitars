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
                    
                    <form action="/modificarProductos" method="post" class="form-control">
                    @csrf
                    @method('put')
                        Categoría: 
                            <br> 
                            <select name="idCategoria" class="form-control desplegar">
                            <option value="">-- Seleccionar categoría --</option>
                            <option value="0">Ingresar nueva categoría</option>
                    @foreach ($categorias as $categoria)        
                            <option {{ ( old('idCategoria', $producto->idCategoria) == $categoria->idCategoria ) ? 'selected':'' }} value="{{$categoria->idCategoria}}">{{ $categoria->catNombre}}</option>
                    @endforeach
                        </select>



                        {{-- PARA MODELO --}}
                        <div class="nuevoModelo" style="display: none">
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
                        </script>

                        <br>
                        <button class="btn btn-dark mb-3">Modificar Producto</button>
                        <a href="/adminProductos" class="btn btn-outline-secondary mb-3">Volver al panel de Productos</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
