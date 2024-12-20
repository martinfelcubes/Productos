@extends('layouts/app')
@section('content')
@vite('resources/css/app.css')
<div class="container">
    <div >
            <h1 class="display-4"> vista de producto del inventario</h1>
        </div>            
                           

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" name="name"  id="name" readonly required value={{$producto->name}}>
                                </div>
                                  
                                <div class="mb-3">
                                    <label for="desciption" class="form-label">Descipcion</label>
                                    <input type="text" name="desciption"  id="desciption" readonly value={{$producto->desciption}}>
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Precio</label>
                                    <input type="text" step="0.01" min="0" name="price" id="price" class="onlynum" readonly value={{$producto->price}} required>
                                </div>

                                <div class="mb-3">
                                    <label for="stock" class="form-label">Cantidad</label>
                                    <input type="text" step="0.01" min="0" name="stock" id="stock" class="onlynum" readonly value={{$producto->stock}} required>
                                </div>

                                <a href={{route('indexproducto')}} class="btn btn-info">Volver</a>
                       
                   

                            </div>


                            
 @endsection
                       
                       

  