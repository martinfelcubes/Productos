<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductoController extends Controller
{

    private $productRepository;
    
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

  /**
     * Muestra una lista de todos los productos.
     *
     * Este método recupera todos los productos de la base de datos
     * utilizando el repositorio de productos y los pasa a la vista
     * 'Productos.index' para su presentación.
     *
     * @return \Illuminate\View\View
     * @author Martin Cubillos
     */

    public function index()
    {
        $Productos = $this->productRepository->all();
        return view("Productos.index", compact('Productos'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     *
     * Este método retorna la vista 'Productos.create' donde el usuario
     * puede ingresar los detalles del nuevo producto.
     *
     * @return \Illuminate\View\View
     *@author Martin Cubillos
     */
        public function create()
    {
        return view("Productos.create");
    }



    /**
     * Almacena un nuevo producto en la base de datos.
     *
     * Este método valida los datos proporcionados en la solicitud,
     * crea un nuevo producto y lo guarda en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * *@author Martin Cubillos
     */
    public function store(Request $request)
    {

        request()->validate([
            'name'=>'required|string|max:255',
            'price'=>'required',
            'stock'=>'required',
        ]);

        $producto = Product::create($request->all());
        $this->productRepository->save($producto);
        return to_route("indexproducto");
    }

  /**
     * Muestra los detalles de un producto específico.
     *
     * Este método verifica si el ID del producto está presente en la
     * solicitud, busca el producto en la base de datos y retorna la
     * vista 'Productos.show' con los detalles del producto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     * @author Martin Cubillos
     */
    public function show(Request $request)
{
    if ($request->id != null) {
        $producto = $this->productRepository->findby($request->id);

        if ($producto) {
            return view("Productos.show", compact("producto"));
        } else {
            return redirect()->back()->with("error", "Producto no encontrado");
        }
    } else {
        return redirect()->back()->with("error", "Id no proporcionado");
    }
}

  /**
     * Muestra el formulario para editar un producto existente.
     *
     * Este método busca el producto por su ID y retorna la vista
     * 'Productos.edit' con los detalles del producto para su edición.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     * @author Martin Cubillos
     */

  
    public function edit(string $id)
    {
        $producto = Product::find($id);

        return view("Productos.edit", compact("producto"));
    }

    /**
     * Actualiza los detalles de un producto existente.
     *
     * Este método valida los datos proporcionados en la solicitud,
     * actualiza el producto correspondiente en la base de datos y
     * redirige a la lista de productos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id Elemento a editar de la tabla productos
     * @return \Illuminate\Http\RedirectResponse
     * @author Martin Cubillos
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'name'=>'required|string|max:255',
            'price'=>'required',
            'stock'=>'required',
        ]);

        $producto = Product::find($id);
        $producto->fill($request->all());
        $producto->save();
        return to_route("indexproducto");
    }

  /**
     * Elimina un producto de la base de datos.
     *
     * Este método busca el producto por su ID, lo elimina de la base
     * de datos y redirige a la lista de productos.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     * @author Martin Cubillos
     */
    
    public function destroy(string $id)
    {

        $producto = Product::find($id);
        $producto = $this->productRepository->delete($producto);
            
        return to_route("indexproducto");
    }
}
