@extends('layouts/front')
@section('content')
<h1> hola mundo </h1>
<h2> hola mundo </h2>
<h3> hola mundo </h3>
<h4> hola mundo </h4>
<h5> hola mundo </h5>
<h6> hola mundo </h6>
<p>Ejemplo de parrafo</p>
<hr>
<h2>prueba subtitulo</h2>
<p>contenido subtitulo para validar el contenido <span style="color:rgb(4, 0, 255)"> html</span> en mi proyecto 
    <br>ya que no se como funciona aun </br>  </p>
<!-- prueba comentario-->

<a target="_blank" href="https://www.google.com.co"> Ir a google.com</a>
<br />
<form action="/formulario">

    <label for="nombre"> nombre </label>
    <input id="nombre" name="Nombre" placeholder="Nombre" type="text" />
    <br>
    <label for="apellido"> apellido </label>
    <input id="apellido" name="Apellido" placeholder="Apellido" type="text" />
    <br>
    <label for="Comentario"> Comentario </label>
    <textarea rows="10" cols="50" id="Comentario" placeholder="Ingrese Comentario" name="Comentario" > </textarea>
    <br>
    <input type="submit">

</form>

<ul>

    <li>elemento 1</li>
    <li>elemento 2</li>
    <li>elemento 3</li>

</ul>

<ol>

    <li>elemento 1</li>
    <li>elemento 2</li>
    <li>elemento 3</li>

</ol>

