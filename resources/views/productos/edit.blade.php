@extends('layouts/app')
@section('content')
@vite('resources/css/app.css')
<div class="container">

    @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <div >
            <h1 class="display-4"> Crear producto del inventario</h1>
        </div>            
                            <form action="{{route('actualizarproducto',$producto->id)}}"  method="post">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" name="name"  id="name" required value={{$producto->name}}>
                                </div>
                                  
                                <div class="mb-3">
                                    <label for="desciption" class="form-label">Descipcion</label>
                                    <input type="text" name="desciption"  id="desciption" value={{$producto->desciption}}>
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Precio</label>
                                    <input type="text" step="0.01" min="0" name="price" id="price" class="onlynum"  value={{$producto->price}} required>
                                </div>

                                <div class="mb-3">
                                    <label for="stock" class="form-label">Cantidad</label>
                                    <input type="text" step="0.01" min="0" name="stock" id="stock" class="onlynum"  value={{$producto->stock}} required>
                                </div>

                                <button class="btn btn-primary">Actualizar</button>
                                <a href={{route('indexproducto')}} class="btn btn-info">Cancelar</a>
                            </form>
                   

                            </div>


                            <script>
                                function validateonlynum(input) {
                                 input.value = input.value.replace(/[^0-9\.]/g, ''); // Permite solo números y el punto decimal
                             } 
                             
                             const numericInputs = document.querySelectorAll('.onlynum');
             numericInputs.forEach(input => {
                 input.addEventListener('input', () => validateonlynum(input));
             });
         </script>
 @endsection
                       
                       

  