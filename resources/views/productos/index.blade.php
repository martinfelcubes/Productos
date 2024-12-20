@extends('layouts/app')
@section('content')
<div class="container">
            <h1 class="display-4"> Productos del inventario</h1>

            @if(session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
        @endif

            <form action="{{ route('mostrarproducto') }}" method="get">
                @csrf
                <div class="form-row">
                    <div class="col-ms-4">
                        <input type="text" class="onlynum" name="id">
                    </div>
                    <div class="col-auto">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                </div>
            </form>

                            <div>
                                <a class="btn btn-success" href="{{route('crearproducto')}}">Nuevo producto</a>
                           </div>
                            <br>
                            <div class="position-static">
                                <table class="table table-hover responsive table-bordered text-center">
                                    <thead style="background-color:#fc9d30">
                                        <th style="color:#fff;">id</th>
                                        <th style="color:#fff;">name</th>
                                        <th style="color:#fff;">desciption</th>
                                        <th style="color:#fff;">price</th>
                                        <th style="color:#fff;">stock</th>
                                        
                                            <th style="color:#fff;">acciones</th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($Productos as $Producto)
                                            <tr>
                                                <td>{{ $Producto->id }}</td>
                                                <td>{{ $Producto->name }}</td>
                                                <td>{{ $Producto->desciption }}</td>
                                                <td>{{ $Producto->price }}</td>
                                                <td>{{ $Producto->stock }}</td>
                                                
                                               <td> 
                                                <a class="btn btn-info" onclick="return confirm('¿Está seguro que desea eliminar este registro?')"  href="{{route('editarproducto', $Producto->id)}}">Editar</a>
                                                
                                                <form action="{{route('eliminarproducto',$Producto->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')


                                                    <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('¿Está seguro que desea eliminar este registro?')">Borrar
                                                   </button>
                                                </form>
                                                   
                                    </td> 



                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <script>
                                function validateonlynum(input) {
                                 input.value = input.value.replace(/[^0-9]/g, ''); // Permite solo números y el punto decimal
                             } 
                             
                             const numericInputs = document.querySelectorAll('.onlynum');
             numericInputs.forEach(input => {
                 input.addEventListener('input', () => validateonlynum(input));
             });
         </script>
                       @endsection
                          
                    
  